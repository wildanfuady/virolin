<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $product = $request->query('product');
        $keyword = $request->query('keyword');
        $paginate = 10;
        $where = [];

        if(!empty($keyword)) {
            $where[] = ['order_invoice', 'LIKE', "%{$keyword}%"];
        }

        if(!empty($product)) {
            $where[] = ['product_id', $product];
        }

        $sql = "orders.id as order_id, orders.*, products.id as product_id, products.*, users.id as user_id, users.*";

        if(empty($keyword) && empty($product)) {
            $orders = \App\Order::join('products', 'orders.product_id', '=', 'products.id')
                ->join('banks', 'orders.order_payment', '=', 'banks.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->selectRaw($sql)
                ->paginate($paginate);
        }
        else {
            $orders = \App\Order::join('products', 'orders.product_id', '=', 'products.id')
                ->join('banks', 'orders.order_payment', '=', 'banks.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->selectRaw($sql)
                ->where($where)
                ->paginate($paginate);
        }
        return view('orders.index', compact('orders', 'keyword', 'product'));
    }

    public function warning()
    {
        $user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {

            return view('orders.warning');
        }
    }

    public function show($id)
    {
        $user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {

        	$orders = \App\Order::join('products', 'orders.product_id', '=', 'products.id')
                ->join('banks', 'orders.order_payment', '=', 'banks.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
        		->where('orders.id', $id)
        		->first();
            return view('orders.show', compact('orders'));
        }
    }

    public function edit($id)
    {
        $user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {
            $sql = "orders.id as order_id, orders.*, products.id as product_id, products.*, users.id as user_id, users.*";
        	$orders = \App\Order::join('products', 'orders.product_id', '=', 'products.id')
                ->join('banks', 'orders.order_payment', '=', 'banks.id')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->where('orders.id', $id)
                ->selectRaw($sql)
                ->first();
            return view('orders.edit', compact('orders'));
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {

            $rules = [
                'order_status' => 'required'
            ];

            $messages = [
                'order_status.required' => 'Status tidak boleh kosong'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if($validator->fails()){
                return redirect(url('order/edit/'.$id))
                        ->withErrors($validator)
                        ->withInput($request->all());
            } else {

                $order = \App\Order::find($id);
                $order->order_status = $request->input('order_status');
                $update = $order->save();

                if($update){
                    return redirect(url('orders'))->with('info', 'Berhasil mengubah data order.');
                }
            }
        }
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {

            $order = \App\Order::find($id);
            $hapus = $order->delete();
            if($hapus){
                return redirect(url('orders'))->with('warning', 'Berhasil menghapus data order.');
            }
        }
    }
}
