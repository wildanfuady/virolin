<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Veritrans\Veritrans;
use DB;
use Carbon\Carbon;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:payment-list|payment-create|payment-edit|payment-delete', ['only' => ['index','store', 'countPayment']]);
        $this->middleware('permission:payment-create', ['only' => ['create','store']]);
        $this->middleware('permission:payment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
        $this->middleware('permission:new_user-payment-confirmation', ['only' => ['showConfirmationPaymentForm', 'confirmationPayment']]);
        $this->middleware('permission:new_user-payment-detail', ['only' => ['paymentDetail']]);
    }

    public function showConfirmationPaymentForm()
    {
        $cekOrder = \App\Order::where('user_id', Auth::user()->id)->first();
        if($cekOrder->order_status == "Success")
        {
            return redirect()->route('finish');
        } 
        else
        {
            $data['detail_order'] = \App\Order::join('products', 'products.product_id', '=', 'orders.product_id')
            ->join('banks', 'banks.id', '=', 'orders.order_payment')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.user_id', Auth::user()->id)->first();

            if(!empty($data['detail_order'])){

                $select = "id, bank_name, bank_number, bank_nasabah";
                $data['banks'] = \App\Banks::where('bank_status', 'Valid')->selectRaw($select)->get();
            
                return view('payment.confirmation_payment', $data);
            }
            
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

        $rules = [
            'invoice' => 'required|min:5|numeric',
            'pengirim' => 'required|regex:/^[a-zA-Z ]+$/u|min:3',
            'bank' => 'required',
            'jumlah_transfer' => 'required|numeric',
            'tanggal_transfer' => 'required',
            'bukti_transfer' => 'mimes:jpg,png,jpeg|max:1000'
        ];

        $messages = [
            'invoice.required'          => 'Invoice wajib diisi',
            'invoice.min'               => 'Invoice minimal 5 angka',
            'invoice.numeric'           => 'Invoice hanya boleh diisi dengan angka',
            'pengirim.required'         => 'Nama pengirim wajib diisi',
            'pengirim.regex'            => 'Nama pengirim hanya boleh diisi dengan huruf dan spasi',
            'pengirim.min'              => 'Nama pengirim minimal 3 karakter',
            'bank.required'             => 'Bank tujuan wajib diisi',
            'jumlah_transfer.required'  => 'Jumlah transfer wajib diisi',
            'bukti_transfer.required'   => 'Bukti transfer wajib diisi',
            'bukti_transfer.mimes'      => 'Bukti transfer yang diizinkan harus bertipe jpg, jpeg atau png',
            'bukti_transfer.max'        => 'Bukti transfer yang diizinkan maksimal 1 mb',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // Cek Invoice di Table Order
        $invoice = $request->invoice;
        $order = \App\Order::where('invoice', $invoice)->where('order_status', 'Pending')->first();

        if(empty($order)){

            return redirect()->back()->withErrors(['Invoice yang Anda masukan tidak terdaftar di database kami atau invoice Anda sudah expired'])->withInput($request->all());
        
        } else {
            $user_id = Auth::user()->id;

            $payment = new \App\Payment;
            $payment->payment_invoice = $request->invoice;
            $payment->payment_pengirim = $request->pengirim;
            $payment->payment_to_bank = $request->bank;
            $payment->payment_total_transfer = $request->jumlah_transfer;
            $payment->payment_tanggal_transfer = date('Y-m-d H:i:s', strtotime($request->tanggal_transfer));
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
        $data['detail_order'] = \App\Order::join('products', 'products.product_id', '=', 'orders.product_id')
            ->join('banks', 'banks.id', '=', 'orders.order_payment')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.user_id', $id)->first();
        if(!empty($data['detail_order'])){
            return view('payment.payment_detail', $data);
        } else {
            return redirect(url('home'));
        }
    }

    public function countPayment()
    {
        $payment = \App\Payment::where('payment_status', 'Pending')->count();
        $data = $payment;
        echo json_encode($data);
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
            $data['payments'] = \App\Payment::where('payment_status', 'Pending')->orderBy('created_at', 'desc')->paginate($paginate);
        }
        else {
            $data['payments'] = \App\Payment::where('payment_status', 'Pending')->orderBy('created_at', 'desc')->where($where)->orWhere($orwhere)->paginate($paginate);
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

        $status = $request->status;
        
        $payment = \App\Payment::where('payment_id', $id)->first();

        if(!empty($payment)){
            if($status == "Success"){
                // cari model_id
                $role = DB::table('model_has_roles')->where('model_id', $payment->user_id)->first();
                if(!empty($role)){
                    DB::table('model_has_roles')->where('model_id', $payment->user_id)->update(['role_id' => 3]);
                } else {
                    DB::table('model_has_roles')->insert(['role_id' => 3, 'model_type' => 'App\User', 'model_id'=> $payment->user_id]);
                }
                $order = \App\Order::with(['product'])->where('orders.user_id', $payment->user_id)->first();
                $product_id = $order->product_id;
                $product_type = $order->product->product_type;

                if($product_type == "bulanan"){

                    $expired = Carbon::now()->addDays(30);

                } else if($product_type == "tiga_bulan"){

                    $expired = Carbon::now()->addDays(90);

                } else if($product_type == "enam_bulan"){

                    $expired = Carbon::now()->addDays(180);

                } else if($product_type == "tahunan"){

                    $expired = Carbon::now()->addDays(365);

                } else {

                    $expired = Carbon::now();

                }
                DB::table('users')->where('id', $payment->user_id)->update(['status' => 'valid']);
                DB::table('orders')->where('user_id', $payment->user_id)->update(['order_date' => Carbon::now(), 'order_expired' => $expired, 'order_status' => 'Success']);
            }
            $payment->payment_status = $request->status;
            $ubah = $payment->save();

            if($ubah){
                return redirect()->route('payment.index')->with('info', 'Updated Payment Successfully.');
            }
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
