<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPromoController extends Controller
{
    public function index()
    {
        return view('user_promo.index');
    }
}
