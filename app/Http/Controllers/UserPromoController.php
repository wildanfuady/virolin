<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPromoController extends Controller
{
    public function index()
    {
        return view('user_promo.index');
    }

    public function fetch_promo()
    {
        $data['data'] = \App\Promo::where('promo_status', 'Active')->limit(5)->get();
        return response()->json($data);
    }
}
