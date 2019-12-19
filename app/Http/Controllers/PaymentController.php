<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Veritrans\Veritrans;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:payments-list|payments-create|payments-edit|payments-delete', ['only' => ['index','store']]);
        $this->middleware('permission:payments-create', ['only' => ['create','store']]);
        $this->middleware('permission:payments-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:payments-delete', ['only' => ['destroy']]);
    }

    public function token() 
    {
        error_log('masuk ke snap token adri ajax');
        $midtrans = new Midtrans;
        $transaction_details = array(
            'order_id'          => uniqid(),
            'gross_amount'  => 200000
        );
        // Populate items
        $items = [
            array(
                'id'                => 'item1',
                'price'         => 100000,
                'quantity'  => 1,
                'name'          => 'Adidas f50'
            ),
            array(
                'id'                => 'item2',
                'price'         => 50000,
                'quantity'  => 2,
                'name'          => 'Nike N90'
            )
        ];
        // Populate customer's billing address
        $billing_address = array(
            'first_name'        => "Andri",
            'last_name'         => "Setiawan",
            'address'           => "Karet Belakang 15A, Setiabudi.",
            'city'                  => "Jakarta",
            'postal_code'   => "51161",
            'phone'                 => "081322311801",
            'country_code'  => 'IDN'
            );
        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => "John",
            'last_name'     => "Watson",
            'address'       => "Bakerstreet 221B.",
            'city'              => "Jakarta",
            'postal_code' => "51162",
            'phone'             => "081322311801",
            'country_code'=> 'IDN'
            );
        // Populate customer's Info
        $customer_details = array(
            'first_name'            => "Andri",
            'last_name'             => "Setiawan",
            'email'                     => "andrisetiawan@asdasd.com",
            'phone'                     => "081322311801",
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );
        // Data yang akan dikirim untuk request redirect_url.
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'           => $items,
            'customer_details'   => $customer_details
        );
    
        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //return redirect($vtweb_url);
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }

    public function showConfirmationPaymentForm()
    {
        $banks = \App\Banks::where('bank_status', 'Valid')->pluck('bank_name', 'id');
        return view('payment.confirmation_payment', compact('banks'));
    }

    public function confirmationPayment(Request $request)
    {
        $this->validate($request,[
            'invoice' => 'required|min:5|max:6|string',
            'pengirim' => 'required|string',
            'bank' => 'required',
            'jumlah_transfer' => 'required|numeric',
            'tanggal_transfer' => 'required',
            'bukti_transfer' => 'required|mimes:jpg,png,jpeg|max:1000'
        ]);

        // Cek Invoice di Table Order
        $invoice = $request->invoice;
        $order = \App\Order::where('invoice', $invoice)->where('order_status', 'Pending')->first();

        if(empty($order)){

            return redirect()->back()->with('error', 'Invoice yang Anda masukan tidak terdaftar di database kami atau invoice Anda sudah expired.');
        
        } else {

            $payment = new \App\Payment;
            $payment->payment_invoice = $request->invoice;
            $payment->payment_pengirim = $request->pengirim;
            $payment->payment_to_bank = $request->bank;
            $payment->payment_total_transfer = $request->jumlah_transfer;
            $payment->payment_tanggal_transfer = $request->tanggal_transfer;

            if(!empty($request->bukti_transfer)){
                $image = $request->bukti_transfer
                    ->store('payment-confirmations', 'public');
                $payment->payment_bukti_transfer = $image;
            }
            
            $simpan = $payment->save();

            if($simpan){
                return redirect()->back()->with('success', 'Send Payment Confirmation Successfully. Please Wait 2 x 24 Hour Start From Now.');
            }
        }
    }

    public function paymentDetail($id)
    {
        $data['detail_order'] = \App\Order::with(['user', 'product', 'bank'])->where('user_id', $id)->first();
        return view('payment.payment_detail', $data);
    }
    
    public function index()
    {
        return view('payment.index');
    }
    
    public function confirmation()
    {
    	$user = Auth::user()->id;
        $data['pc'] = \App\PaymentConfirmation::all();
        return view('payments.confirmation', $data);
    }

    public function renewal()
    {
    	$user = Auth::user()->id;
        return view('payments.renewal');
    }
}
