<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CekLog;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index');
    }
    
    public function confirmation()
    {
    	$user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {
        	$data['pc'] = \App\PaymentConfirmation::all();
            return view('payments.confirmation', $data);
        }
    }

    public function renewal()
    {
    	$user = Auth::user()->id;
        if(CekLog::getLogUser($user) == true){
            return redirect(url('c/home'));
        } else {

            return view('payments.renewal');
        }
    }
}
