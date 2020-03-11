<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','store']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $keyword = $request->query('invoice');
        $paginate = 10;
        $where = [];

        if(!empty($keyword)) {
            $where[] = ['invoice', 'LIKE', "%{$keyword}%"];
        }

        $sql = "orders.id as order_id, orders.*, products.product_id as product_id, products.*, users.id as user_id, users.*";

        if(empty($keyword) && empty($product)) {
            $orders = \App\Order::join('products', 'orders.product_id', '=', 'products.product_id')
                ->join('banks', 'orders.order_payment', '=', 'banks.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->selectRaw($sql)
                ->paginate($paginate);
        }
        else {
            $orders = \App\Order::join('products', 'orders.product_id', '=', 'products.product_id')
                ->join('banks', 'orders.order_payment', '=', 'banks.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->selectRaw($sql)
                ->where($where)
                ->paginate($paginate);
        }
        return view('orders.index', compact('orders', 'keyword'));
    }

    public function warning()
    {
        return view('orders.warning');
    }

    public function show($id)
    {
        $orders = \App\Order::join('products', 'orders.product_id', '=', 'products.product_id')
            ->join('banks', 'orders.order_payment', '=', 'banks.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('orders.id', $id)
            ->first();
        return view('orders.show', compact('orders'));
    }

    public function edit($id)
    {
        $sql = "orders.id as order_id, orders.*, products.product_id as product_id, products.*, users.id as user_id, users.*";
        $orders = \App\Order::join('products', 'orders.product_id', '=', 'products.product_id')
            ->join('banks', 'orders.order_payment', '=', 'banks.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('orders.id', $id)
            ->selectRaw($sql)
            ->first();
        return view('orders.edit', compact('orders'));
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'order_status' => 'required'
        ];

        $messages = [
            'order_status.required' => 'Status tidak boleh kosong'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } 

        $status = $request->status;

        $order = \App\Order::find($id);

        $user   = \App\User::findOrFail($order->user_id);

        if($request->input('order_status') == "Success"){
            
            $user->setSuccess($user);
            $order->setSuccess($order);

            return redirect(url('orders'))->with('info', 'Berhasil mengubah data order.');

        } else {

            $order->setExpired();

        }
        
        
    
    }

    public function destroy($id)
    {
        $order = \App\Order::find($id);
        $hapus = $order->delete();
        if($hapus){
            return redirect(url('orders'))->with('warning', 'Berhasil menghapus data order.');
        }
    }
}
