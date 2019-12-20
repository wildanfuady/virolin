<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $this->dashboard();
        } else {
            return view('dashboard.home', $data);
        }
    }

    public function dashboard()
    {
        return view('dashboard.dashboard');
    }
}
