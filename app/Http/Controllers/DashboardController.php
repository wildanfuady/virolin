<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:dashboard-user', ['only' => ['index']]);
        $this->middleware('permission:dashboard-admin', ['only' => ['dashboard']]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;

        $data['product'] = \App\Order::join('products', 'products.product_id', '=', 'orders.product_id')
            ->where('orders.user_id', $user_id)->first();

        $data['total_subscribers'] = \App\Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->count();

        $tanggal = date('Y-m-d');
        // $saat_ini = date('Y-m-d H:i:s');
        $minggu_lalu = date('Y-m-d', strtotime('-1 week', strtotime($tanggal)));

        $data['total_subscriber_now'] = \App\Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->where('created_at' ,'>=', $tanggal)->count();
        
        $data['total_subscriber_in_week'] = \App\Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->where('created_at', '>=', $minggu_lalu)->count();

        $data['total_landingpage'] = \App\Campaign::where('user_id', $user_id)->count();

        // $query = "SUM(campaign_share) as total";
        // $total_shares = \App\Campaign::selectRaw($query)->where('user_id', $user_id)->first();
        // if(empty($total_shares)){
        //     $data['total_shares'] = 0;
        // } else {
        //     $data['total_shares'] = $total_shares;
        // }

        $query = "SUM(campaign_form_view) as total_visitor";
        $total_visitors = \App\Campaign::selectRaw($query)->where('user_id', $user_id)->first();

        if(empty($total_visitors)){
            $data['total_visitors'] = 0;
        } else {
            $data['total_visitors'] = $total_visitors;
        }

        $raw_log = "log_activities.created_at as log_created_at, log_activities.status, users.name";
        $data['activity_log'] = \App\LogActivity::join('users', 'log_activities.user_id', '=', 'users.id')
            ->where('log_activities.user_id', $user_id)
            ->selectRaw($raw_log)
            ->orderBy('log_activities.id', 'desc')
            ->limit(6)
            ->get();
        
        $raw_sub = "subscribers.subscriber_name as name, subscribers.subscriber_email as email, campaigns.campaign_name as lp_name, subscribers.created_at as sub_created_at";
        
        $data['leads'] = \App\Subscribers::join('campaigns', 'subscribers.campaign_id', '=', 'campaigns.campaign_id')
            ->where('subscribers.user_id', $user_id)
            ->selectRaw($raw_sub)
            ->orderBy('subscribers.id', 'desc')
            ->limit(5)
            ->get();
        
        $raw_order = "products.product_name, products.product_max_db";
        $data['order'] = \App\Order::join('products', 'orders.product_id', '=', 'products.product_id')
                        ->where('orders.user_id', $user_id)
                        ->selectRaw($raw_order)
                        ->first();
        $order = \App\Order::where('user_id', $user_id)->where('order_status', 'Success')->first();
        // dd($order->order_expired);
        $user = \App\User::find($user_id);
        if(!empty($order->order_expired)){
            // $expired = $order->order_expired;
            // $now = Carbon::now();
            if(Carbon::parse($order->order_expired) < Carbon::now()){
                // hapus permission
                DB::table('model_has_roles')->where('model_id', $user_id)->update(['role_id' => 2]);
                $order->setExpired($order);
                $user->setExpired($user);
                // return redirect('report');
            }
        }
        return view('dashboard_user', $data);
    }

    public function dashboard()
    {
        if (Auth::check() && Auth::user()->level == 'user') {
            return $this->dashboard();
        } else {

            $user_id = Auth::user()->id;
            $time_now = Carbon::now();
            
            $data['product'] = \App\Order::join('products', 'products.product_id', '=', 'orders.product_id')
                ->where('orders.user_id', $user_id)->first();

            $data['activity_log'] = \App\Subscribers::where('user_id', $user_id)->get();

            // chart jumlah total landing page
            $data['total_campaign'] = \App\Campaign::get()->count();
            // Chart jumlah users
            $data['total_users'] = \App\User::where('level','<>','admin')->count();
            // Chart user aktif, kadaluarsa, non aktif
            $data['users_aktif'] = \App\User::where('status','valid')->where('level','<>','admin')->count();
            $data['users_kadaluarsa'] = "";
            // $data['users_kadaluarsa'] = \App\User::where('masa_aktif','<=',$time_now)->where('level','<>','admin')->count();
            $data['users_nonaktif'] = \App\User::where('status','<>','valid')->where('level','<>','admin')->count();
            // Chart Payment & Leads
            $data['total_active'] = \App\Order::where('order_status','Active')->count();
            $data['total_pending'] = \App\Order::where('order_status','Pending')->count();
            $data['total_expired'] = \App\Order::where('order_status','Expired')->count();

            $data['total_confirm'] = \App\Payment::where('payment_status','Pending')->count();
    
            return view('dashboard_admin', $data);
        }
    }
}
