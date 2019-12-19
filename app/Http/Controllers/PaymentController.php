<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
