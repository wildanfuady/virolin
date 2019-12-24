<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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

    public function user()
    {
        $time_now = Carbon::now();
        // Chart jumlah users
        $data['total_users'] = \App\User::where('level','<>','admin')->count();
        // Chart user aktif, kadaluarsa, non aktif
        $data['users_aktif'] = \App\User::where('status','valid')->where('level','<>','admin')->count();
        $data['users_kadaluarsa'] = \App\User::where('masa_aktif','<=',$time_now)->where('level','<>','admin')->count();
        $data['users_nonaktif'] = \App\User::where('status','<>','valid')->where('level','<>','admin')->count();

        return view('report.user', $data);
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
