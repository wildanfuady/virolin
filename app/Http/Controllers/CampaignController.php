<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landingpage;
use App\Campaign;
use App\ListSubscriber;
use App\Form;
use App\Autoresponder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;

class CampaignController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:landingpage-list|landingpage-create|landingpage-edit|landingpage-delete', ['only' => ['index','store']]);
        $this->middleware('permission:landingpage-create', ['only' => ['create','store']]);
        $this->middleware('permission:landingpage-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:landingpage-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $paginate = 10;
        $user_id = Auth::user()->id;
        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['campaign_name', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['campaign_slug', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['campaign'] = Campaign::where('user_id', $user_id)
                ->paginate($paginate);
        } else {
            $data['campaign'] = Campaign::where('user_id', $user_id)
            ->where($where)
            ->orWhere($orwhere)
            ->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        
        return view('campaign.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['list_sub'] = ListSubscriber::where('list_sub_status', 'Active')->pluck('list_sub_name', 'list_sub_id');
        return view('campaign.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->campaign_name;
        $telp = $request->campaign_form_telp;

        if(empty($telp)){
            $telp = "Tidak";
        }

        $address = $request->campaign_form_address;

        if(empty($address)){
            $address = "Tidak";
        }

        $lp_template = $request->campaign_lp_template;
        $lp_form_thank = $request->campaign_form_thank;
        $lp_confirm_email = $request->campaign_confirm;
        $lp_text_share = nl2br($request->campaign_text_share);

        $slug = strtolower($name);
        $slug = str_replace(" ", "-", $slug);

        $campaign = new Campaign();

        $campaign->campaign_name            = $name; 
        $campaign->campaign_slug            = $slug; 
        $campaign->campaign_form_hp         = $telp; 
        $campaign->campaign_form_address    = $address; 
        $campaign->campaign_template        =  $lp_template; 
        $campaign->campaign_form_thank      =  $lp_form_thank;
        $campaign->campaign_confirm         =  $lp_confirm_email;
        $campaign->campaign_text_share      =  $lp_text_share;
        $campaign->user_id                  = Auth::user()->id; 
        $campaign->campaign_form_view       = 0; 
        $simpan = $campaign->save();

        if($simpan){
            return redirect()->route('campaign.index')->with('success', 'Created Campaign Successfully');
        }
        
    }

    public function detail_campaign($slug)
    {
        $campaign = Campaign::where('campaign_slug', $slug)->first();

        if(empty($campaign)){
            // not found
            echo "Tak ada data";
        }

        return view('campaign.detail', compact('campaign'));
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
        $campaign = Campaign::find($id);
        return view('campaign.edit', compact('campaign'));
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
        $name = $request->campaign_lp_name;
        $telp = $request->campaign_form_telp;

        if(empty($telp)){
            $telp = "Tidak";
        }
        
        $address = $request->campaign_form_address;

        if(empty($address)){
            $address = "Tidak";
        }

        $lp_template = $request->campaign_lp_template;
        $lp_form_thank = $request->campaign_form_thank;
        $lp_confirm_email = $request->campaign_confirm;
        $lp_text_share = $request->campaign_text_share;

        $slug = strtolower($name);
        $slug = str_replace(" ", "-", $slug);

        $campaign = Campaign::find($id);

        $campaign->campaign_name            = $name; 
        $campaign->campaign_slug            = $slug; 
        $campaign->campaign_form_hp         = $telp; 
        $campaign->campaign_form_address    = $address; 
        $campaign->campaign_template        = $lp_template; 
        $campaign->campaign_form_thank      = $lp_form_thank;
        $campaign->campaign_confirm         = $lp_confirm_email;
        $campaign->campaign_text_share      = $lp_text_share;
        $campaign->user_id                  = Auth::user()->id; 
        $campaign->campaign_form_view       = 0; 
        $update = $campaign->save();

        if($update){
            return redirect()->route('campaign.index')->with('info', 'Updated Campaign Successfully');
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
        //
    }

    public function custom()
    {
        return view('campaign/create/index');
    }

    public function share()
    {
        // $id = 12;
        $campaign = Campaign::where('campaign_id', 12)->first();
        if(!empty($campaign)){
            $campaign->campaign_form_view += 1;
            $campaign->save(); 
        }
        return view('campaign/share');
    }

    public function send(Request $request)
    {
        $rules = [
            'fullname' => 'required|string|regex:/^[a-zA-Z]+$/u|max:35',
            'email' => 'required|email'
        ];

        $messages = [
            'fullname.required' => 'Nama Lengkap wajib diisi',
            'fullname.string' => 'Nama Lengkap hanya boleh berupa huruf dan angka',
            'fullname.regex' => 'Nama Lengkap hanya boleh berupa huruf dan angka',
            'fullname.max' => 'Nama Lengkap maksimal 35 karakter termasuk spasi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang Anda masukan tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect(url('ecourse/failed'))->withErrors($validator)->withInput($request->all());
        }

        $fullname = $request->fullname;
        $email = $request->email;

        $sub = new \App\Subscribers;

        $sub->subscriber_name = $fullname;
        $sub->subscriber_email = $email;
        $sub->subscriber_nohp = "Tidak";
        $sub->subscriber_alamat = "Tidak";
        $sub->subscriber_verifikasi = "Tidak";
        $sub->user_id = 24;
        $sub->lp_id = 12;
        $sub->list_sub_id = 5;
        $simpan = $sub->save();

        if($simpan){
            return redirect(url('ecourse/thanks'));
        }

    }

    public function failed()
    {
        return view('campaign.failed');
    }

    public function thanks()
    {
        return view('campaign.thanks');
    }
}
