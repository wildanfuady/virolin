<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \App\User::get();
        $subscribers = \App\Subscribers::with(['user'])->get();
        return view('subscribers.index', compact('subscribers','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \App\User::get();
        $subscribers = \App\Subscribers::with(['user'])->get();
        return view('subscribers.create', compact('subscribers','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'subscriber_name' => 'required|min:5|max:50|string',
            'subscriber_email' => 'required|email',
            'subscriber_nohp' => 'required|numeric',
            'subscriber_alamat' => 'required',
            'subscriber_status' => 'required|string',
            'user_id' => 'required',
            'lp_id' => 'required'
        ]);

        $subscribers = new \App\Subscribers;
        $subscribers->subscriber_name = $request->get('subscriber_name');
        $subscribers->subscriber_email = $request->get('subscriber_email');
        $subscribers->subscriber_nohp = $request->get('subscriber_nohp');
        $subscribers->subscriber_alamat = $request->get('subscriber_alamat');
        $subscribers->subscriber_verifikasi = Carbon::now();
        $subscribers->subscriber_status = $request->get('subscriber_status');
        $subscribers->user_id = $request->get('user_id');
        $subscribers->lp_id = $request->get('lp_id');
        $subscribers->save();

        return redirect('subscribers')->with('success','Created Subscriber Successfully');
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
        $subscribers = \App\Subscribers::find($id);
        $subscribers->subscriber_name = $request->get('subscriber_name');
        $subscribers->subscriber_email = $request->get('subscriber_email');
        $subscribers->subscriber_nohp = $request->get('subscriber_nohp');
        $subscribers->subscriber_alamat = $request->get('subscriber_alamat');
        $subscribers->subscriber_verifikasi = Carbon::now();
        $subscribers->subscriber_status = $request->get('subscriber_status');
        $subscribers->user_id = $request->get('user_id');
        $subscribers->lp_id = $request->get('lp_id');
        $subscribers->save();

        return redirect('subscribers')->with('success','Edited Promo Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscribers = \App\Subscribers::find($id);
        $subscribers->delete();
        return redirect('user')->with('success','Deleted Promo Successfully');    
    }
}
