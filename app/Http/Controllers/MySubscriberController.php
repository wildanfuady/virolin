<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Subscribers;

class MySubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:mysubscriber-list|mysubscriber-create|mysubscriber-edit|mysubscriber-delete', ['only' => ['index','store']]);
        $this->middleware('permission:mysubscriber-create', ['only' => ['create','store']]);
        $this->middleware('permission:mysubscriber-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:mysubscriber-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $paginate = 10;
        $keyword = $request->query('keyword');
        $where = [];

        if(!empty($keyword)) {
            $where[] = ['list_sub_name', 'LIKE', "%{$keyword}%"];
        }

        // Set User ID
        $user_id = Auth::user()->id;
        $where[] = ['user_id', '=', $user_id];

        if(empty($keyword)) {
            $data['mysubscribers'] = \App\ListSubscriber::where($where)->paginate($paginate);
        }
        else {
            $data['mysubscribers'] = \App\ListSubscriber::where($where)->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        return view('mysubscriber.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mysubscriber.create');
    }

    public function create_subscriber($id)
    {
        $data['id'] = $id;
        $data['lp'] = \App\Landingpage::where('lp_status', 'Active')->pluck('lp_name', 'lp_id');
        return view('mysubscriber.create_subscriber', $data);
    }

    public function store_subscriber(Request $request, $id)
    {
        $this->validate($request,[
            'sub_name' => 'required',
            'sub_email' => 'required|email',
            'sub_hp' => 'required|numeric',
            'sub_alamat' => 'required|string',
            'sub_status' => 'required|string',
            'sub_lp' => 'required|string',
        ]);

        $user_id = Auth::user()->id;
        $new_subscriber = new \App\Subscribers;
        $new_subscriber->subscriber_name = $request->sub_name;
        $new_subscriber->subscriber_email = $request->sub_email;
        $new_subscriber->subscriber_nohp = $request->sub_hp;
        $new_subscriber->subscriber_alamat = $request->sub_alamat;
        $new_subscriber->subscriber_status = $request->sub_status;
        $new_subscriber->user_id = $user_id;
        $new_subscriber->list_sub_id = $id;
        $new_subscriber->lp_id = $request->sub_lp;
        $new_subscriber->subscriber_verifikasi = 1;
        $simpan = $new_subscriber->save();

        if($simpan){
            return redirect('mysubscribers/'.$id)->with('success', 'Created New Subscriber Successfully');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'group_name' => 'required|min:5|max:50|string',
            'group_status' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $list = new \App\ListSubscriber;
        $list->list_sub_name = $request->group_name;
        $list->list_sub_status = $request->group_status;
        $list->user_id = $user_id;
        $simpan = $list->save();

        if($simpan){
            return redirect()->route('mysubscribers.index')->with('success', 'Created List Subscriber Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $paginate = 10;
        $data['detail_list_subscribers'] = Subscribers::join('landingpages', 'subscribers.lp_id', '=', 'landingpages.lp_id')
        ->where('subscribers.list_sub_id', $id)->where('subscribers.user_id', Auth::user()->id)->paginate($paginate);
        $data['id'] = $id;
        return view('mysubscriber.show', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = \App\ListSubscriber::where('list_sub_id',$id)->first();
        return view('mysubscriber.edit', compact('list'));
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
        $this->validate($request,[
            'group_name' => 'required|min:5|max:50|string',
            'group_status' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $list = \App\ListSubscriber::where('list_sub_id', $id)->first();
        $list->list_sub_name = $request->group_name;
        $list->list_sub_status = $request->group_status;
        $list->user_id = $user_id;
        $simpan = $list->save();

        if($simpan){
            return redirect()->route('mysubscribers.index')->with('info', 'Updated List Subscriber Successfully');
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
        $list = \App\ListSubscriber::find($id);
        $hapus = $list->delete();
        if($hapus){
            return redirect()->route('mysubscribers.index')->with('warning', 'Deleted List Subscriber Successfully');
        }
    }
}
