<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Banks;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RenewalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:renewal-user|renewal-create', ['only' => ['index','store']]);
        $this->middleware('permission:renewal-user', ['only' => ['index']]);
        $this->middleware('permission:renewal-create', ['only' => ['store']]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $data['order'] = Order::with(['user', 'product', 'bank'])->where('user_id', $user_id)->where('order_status', 'Expired')->orWhere('order_status', 'Waiting for payment')->first();
        $data['banks'] = Banks::where('bank_status', 'Valid')->pluck('bank_name', 'id');
        return view('payment.renewal', $data);
        // ->join('users', 'users.id', '=', 'orders.user_id')
        // ->join('products', 'products.product_id', '')
    }
}
