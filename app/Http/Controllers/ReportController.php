<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Order;
use App\Subscribers;
use App\Campaign;
use App\TrafikCampaign;
use App\TrafikShare;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:report-user|report-user-detail|report-list', ['only' => ['index','show']]);
        $this->middleware('permission:report-user', ['only' => ['index']]);
        $this->middleware('permission:report-user-detail', ['only' => ['show']]);
        $this->middleware('permission:report-list', ['only' => ['user']]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $year = date('Y');
        // Report Trafik
        $data['trafik'] = TrafikCampaign::select('trafik_browser', DB::raw('count(*) as total'))->groupBy('trafik_browser')->join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->get();
        $data['trafik_all'] = TrafikCampaign::first();
        $data['trafik_jan'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-01-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-02-01 00:00:00')->count();
        $data['trafik_feb'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-02-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-03-01 00:00:00')->count();
        $data['trafik_mar'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-03-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-04-01 00:00:00')->count();
        $data['trafik_apr'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-04-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-05-01 00:00:00')->count();
        $data['trafik_mei'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-05-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-06-01 00:00:00')->count();
        $data['trafik_jun'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-06-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-07-01 00:00:00')->count();
        $data['trafik_jul'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-07-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-08-01 00:00:00')->count();
        $data['trafik_agu'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-08-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-09-01 00:00:00')->count();
        $data['trafik_sep'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-09-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-10-01 00:00:00')->count();
        $data['trafik_okt'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-10-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-11-01 00:00:00')->count();
        $data['trafik_nov'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-11-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-12-01 00:00:00')->count();
        $data['trafik_des'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-12-01 00:00:00')->count();

        // Share
        $raw = "campaign_id, campaign_name, campaign_slug, campaign_share, campaign_form_view";
        $data['shares'] = Campaign::selectRaw($raw)->where('user_id', $user_id)->get();
        $data['share'] = TrafikShare::select('campaigns.campaign_name','campaigns.campaign_id', DB::raw('count(*) as total'))->groupBy('campaign_id')->join('campaigns','campaigns.campaign_id','=','trafik_share.campaign_id')->orderBy('campaigns.created_at','desc')->limit(7)->get();
        $data['visitor'] = TrafikCampaign::select('campaign_id', DB::raw('count(*) as total'))->groupBy('campaign_id')->get();

        return view('report.index', $data);
    }
    public function show($slug)
    {
        $user_id = Auth::user()->id;
        $year = date('Y');
        $campaign = Campaign::where('campaign_slug', $slug)->where('user_id', $user_id)->first();
        $campaign_id = $campaign->campaign_id;
        $data['campaign_trafik'] = TrafikCampaign::select('campaign_id','trafik_browser', DB::raw('count(*) as total'))->groupBy('campaign_id')->where('campaign_id', $campaign_id)->groupBy('trafik_browser')->get();
        $data['campaign_share'] = TrafikShare::select('campaign_id','trafik_browser', DB::raw('count(*) as total'))->groupBy('campaign_id')->where('campaign_id', $campaign_id)->groupBy('trafik_browser')->get();

        $data['trafik_jan'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-01-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-02-01 00:00:00')->count();
        $data['trafik_feb'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-02-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-03-01 00:00:00')->count();
        $data['trafik_mar'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-03-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-04-01 00:00:00')->count();
        $data['trafik_apr'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-04-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-05-01 00:00:00')->count();
        $data['trafik_mei'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-05-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-06-01 00:00:00')->count();
        $data['trafik_jun'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-06-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-07-01 00:00:00')->count();
        $data['trafik_jul'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-07-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-08-01 00:00:00')->count();
        $data['trafik_agu'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-08-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-09-01 00:00:00')->count();
        $data['trafik_sep'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-09-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-10-01 00:00:00')->count();
        $data['trafik_okt'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-10-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-11-01 00:00:00')->count();
        $data['trafik_nov'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-11-01 00:00:00')->where('trafik_campaign.created_at','<',$year.'-12-01 00:00:00')->count();
        $data['trafik_des'] = TrafikCampaign::join('campaigns','campaigns.campaign_id','=','trafik_campaign.campaign_id')->where('trafik_campaign.campaign_id', $campaign_id)->where('campaigns.user_id',$user_id)->where('trafik_campaign.created_at','>=',$year.'-12-01 00:00:00')->count();
        // return $data;
        if(empty($campaign)){
            return view('errors.404');
        }
        return view('report.report_detail', $data);
    }

    public function user(Request $request)
    {
        $paginate = 10;
        $keyword = $request->query('keyword');
        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['name', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['email', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $db_users = \App\User::with(['product'])->where('level','<>','admin')->where('status','valid')->paginate($paginate);
        }
        else {
            $db_users = \App\User::with(['product'])->where('level','<>','admin')->where('status','valid')->where($where)->orWhere($orwhere)->paginate($paginate);
        }
        
        $time_now = Carbon::now();
        // Chart jumlah users
        $total_users = \App\User::where('level','<>','admin')->count();

        // Chart user aktif, kadaluarsa, non aktif
        $users_aktif = \App\User::join('orders', 'users.id', '=', 'orders.user_id')->where('users.status','valid')->where('users.level','<>','admin')->where('orders.order_expired','>=',$time_now)->count();
        $users_kadaluarsa = \App\User::join('orders', 'users.id', '=', 'orders.user_id')->where('orders.order_expired','<=',$time_now)->where('users.level','<>','admin')->where('users.status','valid')->count();
        $users_nonaktif = \App\User::where('status','<>','valid')->where('level','<>','admin')->count();

        // Chart user with db        
        // $data['users_db_count'] = \App\User::select(DB::raw('count(*) as jumlah_db'))->join('')->groupBy('subscriber.user_id')->get();
        $users_db_count = DB::table('subscribers')->select(DB::raw('count(subscribers.id) as total, user_id'))->groupBy('subscribers.user_id')->get();

        // Chart product users 
        $users_product = \App\Products::get();
        $users_product_count = DB::table('users')->select(DB::raw('count(users.product_id) as total,users.product_id'))->groupBy('users.product_id')->join('products','products.product_id','=','users.product_id')->where('level','<>','admin')->get();

        return view('report.user', compact('db_users','total_users','users_aktif','users_kadaluarsa','users_nonaktif','users_db_count','users_product','users_product_count','keyword'));
    }
}
