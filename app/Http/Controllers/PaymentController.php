<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Input;
use App\Veritrans\Veritrans;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index','store']]);
        $this->middleware('permission:payment-create', ['only' => ['create','store']]);
        $this->middleware('permission:payment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
    }

    public function showConfirmationPaymentForm()
    {
        $cekOrder = \App\Order::where('user_id',Auth::user()->id)->first();
        if($cekOrder->order_status == "Success" || $cekOrder->order_status == "Waiting for payment")
        {
            return redirect()->route('finish');
        } 
        else
        {
            $banks = \App\Banks::where('bank_status', 'Valid')->pluck('bank_name', 'id');
            return view('payment.confirmation_payment', compact('banks'));
        }
        
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
            $user_id = Auth::user()->id;

            $payment = new \App\Payment;
            $payment->payment_invoice = $request->invoice;
            $payment->payment_pengirim = $request->pengirim;
            $payment->payment_to_bank = $request->bank;
            $payment->payment_total_transfer = $request->jumlah_transfer;
            $payment->payment_tanggal_transfer = $request->tanggal_transfer;
            $payment->user_id = $user_id;
            $payment->payment_status = "Pending";

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

    public function countPayment()
    {
        // $id = Input::get("id");
        // $sql = "SUM(payment_status) as total";
        $payment = \App\Payment::where('payment_status', 'Pending')->count();
        // $total = 
        $data = $payment;
        echo json_encode($data);
        // echo "A";
    }
    
    public function index(Request $request)
    {
        $paginate = 10;
        $keyword = $request->query('keyword');
        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['payment_invoice', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['payment_pengirim', 'LIKE', "%{$keyword}%"];
        }
        if(empty($keyword)) {
            $data['payments'] = \App\Payment::orderBy('created_at', 'desc')->paginate($paginate);
        }
        else {
            $data['payments'] = \App\Payment::orderBy('created_at', 'desc')->where($where)->orWhere($orwhere)->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        return view('payment.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    public function show($id)
    {
        $data['payment'] = \App\Payment::with(['bank'])->where('payment_id', $id)->first();
        return view('payment.show', $data);
    }

    public function edit($id)
    {
        $data['payment'] = \App\Payment::with(['bank'])->where('payment_id', $id)->first();
        return view('payment.edit', $data);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'status' => 'required',
        ]);

        $payment = \App\Payment::where('payment_id', $id)->first();
        $payment->payment_status = $request->status;
        $ubah = $payment->save();

        if($ubah){
            return redirect()->route('payment.index')->with('info', 'Updated Payment Successfully.');
        }

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
