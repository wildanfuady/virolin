<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
        // $this->middleware('admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $data['total_subscribers'] = \App\Subscribers::where('user_id', $user_id)
            ->count();
        
        $data['product'] = \App\User::join('subscribers', 'subscribers.user_id', '=', 'users.id')
            ->join('products', 'products.product_id', '=', 'users.product_id')
            ->where('user_id', $user_id)->first();

        $data['total_landingpage'] = \App\Landingpage::where('user_id', $user_id)->count();

        $data['activity_log'] = \App\Subscribers::where('user_id', $user_id)->get();
        // var_dump($data['activity_log']);die();
        
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $this->dashboard();
        } else {
            return view('dashboard.home', $data);
        }
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $time_now = Carbon::now();
        
        $data['product'] = \App\User::join('subscribers', 'subscribers.user_id', '=', 'users.id')
            ->join('products', 'products.product_id', '=', 'users.product_id')
            ->where('user_id', $user_id)->first();

        $data['total_landingpage'] = \App\Landingpage::get()->count();
        $data['activity_log'] = \App\Subscribers::where('user_id', $user_id)->get();

        // Chart jumlah users
        $data['total_users'] = \App\User::where('level','<>','admin')->count();
        // Chart user aktif, kadaluarsa, non aktif
        $data['users_aktif'] = \App\User::where('status','valid')->count();
        $data['users_kadaluarsa'] = \App\User::where('masa_aktif','<=',$time_now);
        var_dump($data['users_kadaluarsa']);die();
        return view('dashboard.dashboard', $data);
    }
}
