<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        // Butuh modifikasi
        $data['account'] = \App\User::find($user_id);
        $data['order'] = \App\Order::where('user_id', $user_id)->first();
        $data['subscriber'] = \App\Subscribers::where('user_id', $user_id)->first();
        return view('profile.index', $data);
    }
}
