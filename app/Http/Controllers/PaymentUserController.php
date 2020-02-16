<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Subscribers;

class PaymentUserController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $data['order'] = Order::with(['product'])->where('user_id', $user_id)->first();
        $data['total_db'] = Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->count();
        return view('payment.user.index', $data);
        // dd($data['order']);
    }
}
