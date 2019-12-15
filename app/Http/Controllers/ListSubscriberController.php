<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListSubscriber;
use Illuminate\Support\Facades\Auth;

class ListSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data['list'] = ListSubscriber::where('user_id', $user_id)->get();
        return view('list_subscriber.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('list_subscriber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $list = new ListSubscriber;
        $list->list_sub_name = $request->group_name;
        $list->list_sub_status = $request->group_status;
        $list->user_id = $user_id;
        $simpan = $list->save();

        if($simpan){
            return redirect('list-subscriber')->with('success', 'Created List Subscriber Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;

        $data['list'] = ListSubscriber::where('user_id', $user_id)->where('list_sub_id', $id)->first();
        return view('list_subscriber.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;

        $data['list'] = ListSubscriber::where('user_id', $user_id)->where('list_sub_id', $id)->first();
        return view('list_subscriber.edit', $data);
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
        $list = ListSubscriber::find($id);
        $list->list_sub_name = $request->group_name;
        $list->list_sub_status = $request->group_status;
        $ubah = $list->save();

        if($ubah){
            return redirect('list-subscriber')->with('info', 'Updated List Subscriber Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = ListSubscriber::find($id);
        $hapus = $list->delete();
        if($hapus){
            return redirect('list-subscriber')->with('warning', 'Deleted List Subscriber Successfully');
        }
    }
}
