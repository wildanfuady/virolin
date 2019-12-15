<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CekLog;

class HomeController extends Controller
{
    
    public function index()
    {
        $user = Auth::user()->id;
        return CekLog::get($user);
        
        return view('home');
    }
}
