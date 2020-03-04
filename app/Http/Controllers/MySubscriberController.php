<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Subscribers;
use App\Order;
use App\Campaign;
use App\Exports\SubscribersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

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
        $list = \App\ListSubscriber::find($id);

        if(empty($list)){
            return redirect(url('mysubscribers'))->with('warning', 'Halaman yang Anda cari tidak tersedia');
        } else {

            $user_id = Auth::user()->id;

            // cek jumlah database yang ia miliki
            $total_subscriber_user = Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->count();
            // tampilkan maksimal subscriber yang ia miliki
            $select = "products.product_max_db";
            $total_max_database_user = Order::join('products', 'orders.product_id', '=', 'products.product_id')
                                        ->where('orders.user_id', $user_id)
                                        ->selectRaw($select)
                                        ->first();

            if($total_subscriber_user >= $total_max_database_user->product_max_db){

                return redirect()->back()->with('warning', 'Maaf, Anda tidak dapat menambah subscriber baru. Jumlah database yang Anda miliki sudah sampai pada batas maksimal.');
            
            } else {

                $data['id'] = $id;
                $data['campaign'] = \App\Campaign::pluck('campaign_name', 'campaign_id');
                return view('mysubscriber.create_subscriber', $data);
            
            }
        }

    }

    public function store_subscriber(Request $request, $id)
    {
        $user_id = Auth::user()->id;

        // cek jumlah database yang ia miliki
        $total_subscriber_user = Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->count();
        // tampilkan maksimal subscriber yang ia miliki
        $select = "products.product_max_db";
        $total_max_database_user = Order::join('products', 'orders.product_id', '=', 'products.product_id')
                                    ->where('orders.user_id', $user_id)
                                    ->selectRaw($select)
                                    ->first();

        if($total_subscriber_user >= $total_max_database_user->product_max_db){

            return redirect(url('mysubscribers/'.$id))->with('warning', 'Maaf, Anda tidak dapat menambah subscriber baru. Jumlah database yang Anda miliki sudah sampai pada batas maksimal.');
        
        } else {

            $rules = [
                'sub_name' => 'required',
                'sub_email' => 'required|email',
                'sub_status' => 'required',
                'sub_lp' => 'required',
            ];

            $messages = [
                'sub_name.required' => 'Nama Subscriber wajib diisi',
                'sub_email.required' => 'Email wajib diisi',
                'sub_email.email' => 'Email yang Anda masukan tidak valid',
                'sub_status.required' => 'Status wajib diisi',
                'sub_lp.required' => 'Campaign wajib diisi',
                
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }

            if(empty($request->sub_hp)){
                $no_hp = "-";
            } else {
                $no_hp = $request->sub_hp;
            }

            if(empty($request->sub_alamat)){
                $alamat = "-";
            } else {
                $alamat = $request->sub_alamat;
            }

            $new_subscriber = new \App\Subscribers;

            $new_subscriber->subscriber_name = $request->sub_name;
            $new_subscriber->subscriber_email = $request->sub_email;
            $new_subscriber->subscriber_nohp = $no_hp;
            $new_subscriber->subscriber_alamat = $alamat;
            $new_subscriber->subscriber_status = $request->sub_status;
            $new_subscriber->user_id = $user_id;
            $new_subscriber->list_sub_id = $id;
            $new_subscriber->campaign_id = $request->sub_lp;
            $new_subscriber->subscriber_verifikasi = 1;
            $simpan = $new_subscriber->save();

            if($simpan){
                return redirect('mysubscribers/'.$id)->with('success', 'Created New Subscriber Successfully');
            }

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
        $keyword = $request->query('keyword');
        $where = [];
        $orwhere = [];

        $where[] = ['subscribers.list_sub_id', $id];
        $where[] = ['subscribers.user_id', Auth::user()->id];

        if(!empty($keyword)) {
            $where[] = ['subscriber_name', 'LIKE', "%{$keyword}%"];
            $where[] = ['subscriber_email', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['detail_list_subscribers'] = Subscribers::join('campaigns', 'subscribers.campaign_id', '=', 'campaigns.campaign_id')->where($where)->where('subscribers.subscriber_status', 'valid')->paginate($paginate);
        }
        else {
            $data['detail_list_subscribers'] = Subscribers::join('campaigns', 'subscribers.campaign_id', '=', 'campaigns.campaign_id')->where($where)->where('subscribers.subscriber_status', 'valid')->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        
        
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

        if(empty($list)){
            return redirect(url('mysubscribers'))->with('warning', 'Halaman yang Anda cari tidak tersedia');
        }

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

    public function destroy_subscriber($id)
    {
        $subscriber = \App\Subscribers::find($id);
        $hapus = $subscriber->delete();
        if($hapus){
            return redirect()->back()->with('warning', 'Deleted Subscriber Successfully');
        }
    }

    public function export($id) 
    {
        $date = date('d-m-Y H:i');
        return Excel::download(new SubscribersExport($id), $date.'-subscribers.csv', \Maatwebsite\Excel\Excel::CSV, [
            'Content-Type' => 'text/csv',
        ]);
        return back();

    }
}
