<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\KirimEmail;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function index(){
		$nama = "Contoh Nama";
		$website = "Contoh Website";
		Mail::to("narulhidayah9923@gmail.com")->send(new KirimEmail($nama, $website));
 
		return "Email telah dikirim";
 
	}
}
