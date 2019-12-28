<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index');
    }

    public function order()
    {
        $user_id = Auth::user()->id;
        $data['order'] = \App\Order::with(['product'])->where('user_id', $user_id)->first();
        return view('report.order', $data);
    }

    public function penjualan()
    {
        return view('report.penjualan');
    }

    public function promo()
    {
        return view('report.promo');
    }

    public function trafik()
    {
        return view('report.trafik');
    }

    public function share()
    {
        return view('report.share');
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
        $users_aktif = \App\User::where('status','valid')->where('level','<>','admin')->where('masa_aktif','>=',$time_now)->count();
        $users_kadaluarsa = \App\User::where('masa_aktif','<=',$time_now)->where('level','<>','admin')->where('status','valid')->count();
        $users_nonaktif = \App\User::where('status','<>','valid')->where('level','<>','admin')->count();

        // Chart user with db        
        // $data['users_db_count'] = \App\User::select(DB::raw('count(*) as jumlah_db'))->join('')->groupBy('subscriber.user_id')->get();
        $users_db_count = DB::table('subscribers')->select(DB::raw('count(subscribers.id) as total, user_id'))->groupBy('subscribers.user_id')->get();

        // Chart product users 
        $users_product = \App\Products::get();
        $users_product_count = DB::table('users')->select(DB::raw('count(users.product_id) as total,users.product_id'))->groupBy('users.product_id')->join('products','products.product_id','=','users.product_id')->where('level','<>','admin')->get();

        return view('report.user', compact('db_users','total_users','users_aktif','users_kadaluarsa','users_nonaktif','users_db_count','users_product','users_product_count','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
