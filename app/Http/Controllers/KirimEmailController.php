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
		$email = "ilmucoding.com@gmail.com";
		$kirim = Mail::to($email)->send(new KirimEmail($nama, $website));
 
		if($kirim){
			return "Email telah dikirim";
		}
 
	}
}
