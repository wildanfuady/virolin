<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:dashboard-admin', ['only' => ['dashboard']]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        
        $data['product'] = \App\User::join('subscribers', 'subscribers.user_id', '=', 'users.id')
            ->join('products', 'products.product_id', '=', 'users.product_id')
            ->where('user_id', $user_id)->first();

        $data['total_subscribers'] = \App\Subscribers::where('user_id', $user_id)->count();
        $data['total_landingpage'] = \App\Landingpage::where('user_id', $user_id)->count();
        $raw_log = "log_activities.created_at as log_created_at, log_activities.status, users.name";
        $data['activity_log'] = \App\LogActivity::join('users', 'log_activities.user_id', '=', 'users.id')
            ->where('log_activities.user_id', $user_id)
            ->selectRaw($raw_log)
            ->orderBy('log_activities.id', 'desc')
            ->limit(6)
            ->get();
        
        $raw_sub = "subscribers.subscriber_name as name, subscribers.subscriber_email as email, landingpages.lp_name as lp_name, subscribers.created_at as sub_created_at";
        $data['leads'] = \App\Subscribers::join('landingpages', 'subscribers.lp_id', '=', 'landingpages.lp_id')
            ->where('subscribers.user_id', $user_id)
            ->selectRaw($raw_sub)
            ->orderBy('subscribers.id', 'desc')
            ->limit(5)
            ->get();

        if (Auth::check() && Auth::user()->level == 'admin') {
            return $this->dashboard();
        } else {
            return view('dashboard_user', $data);
        }
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $time_now = Carbon::now();
        
        $data['product'] = \App\User::join('subscribers', 'subscribers.user_id', '=', 'users.id')
            ->join('products', 'products.product_id', '=', 'users.product_id')
            ->where('user_id', $user_id)->first();

        $data['activity_log'] = \App\Subscribers::where('user_id', $user_id)->get();

        // chart jumlah total landing page
        $data['total_landingpage'] = \App\Landingpage::get()->count();
        // Chart jumlah users
        $data['total_users'] = \App\User::where('level','<>','admin')->count();
        // Chart user aktif, kadaluarsa, non aktif
        $data['users_aktif'] = \App\User::where('status','valid')->where('level','<>','admin')->count();
        $data['users_kadaluarsa'] = \App\User::where('masa_aktif','<=',$time_now)->where('level','<>','admin')->count();
        $data['users_nonaktif'] = \App\User::where('status','<>','valid')->where('level','<>','admin')->count();
        // Chart Payment & Leads
        $data['total_active'] = \App\Order::where('order_status','Active')->count();
        $data['total_pending'] = \App\Order::where('order_status','Pending')->count();
        $data['total_expired'] = \App\Order::where('order_status','Expired')->count();
        
        return view('dashboard_admin', $data);
    }
}
