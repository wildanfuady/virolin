<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landingpage;
use App\ListSubscriber;
use App\Form;
use App\Autoresponder;
use Illuminate\Support\Facades\Auth;
use Session;

class LandingpageController extends Controller
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
            $where[] = ['lp_name', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['lp_slug', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['lp'] = Landingpage::where('user_id', $user_id)
                ->paginate($paginate);
        } else {
            $data['lp'] = Landingpage::where('user_id', $user_id)
            ->where($where)
            ->orWhere($orwhere)
            ->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        
        return view('landingpage.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data['list_sub'] = ListSubscriber::where('list_sub_status', 'Active')->pluck('list_sub_name', 'list_sub_id');
        $data['form'] = Form::where('form_status', 'Active')->pluck('form_title', 'form_id');
        $data['auto'] = Autoresponder::where('auto_status', 'Active')->pluck('auto_title', 'auto_id');
        return view('landingpage.create', $data);
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
            'lp_title' => 'required',
            'lp_slug' => 'required',
            'lp_status' => 'required',
            'list_sub_id' => 'required',
            'form_id' => 'required',
            'auto_id' => 'required',
            'lp_header_layout' => 'required',
            'lp_header_title' => 'required',
            'lp_header_content' => 'required',
        ]);

        $createID = Landingpage::latest('lp_id')->first();
        if(!empty($createID)){
            $id = $createID->lp_id + 1;
        } else {
            $id = 1;
        }
        $user_id = Auth::user()->id;
        $landingpage = new Landingpage;
        $landingpage->lp_id = $id;
        $landingpage->lp_name = $request->lp_title;
        $landingpage->lp_slug = $request->lp_slug;
        $landingpage->lp_status = $request->lp_status;
        $landingpage->user_id = $user_id;
        $landingpage->list_sub_id = $request->list_sub_id;
        $landingpage->form_id = $request->form_id;
        $landingpage->autoresponder_id = $request->auto_id;
        $landingpage->status_all = "Draf";
        // Step 2
        $landingpage->lp_header_layout = $request->lp_header_layout;
        $landingpage->lp_header_title = $request->lp_header_title;
        $landingpage->lp_header_content = $request->lp_header_content;
        $simpan = $landingpage->save();

        if($simpan){
            return redirect()->route('landingpages.index')->with('success', 'Created Landingpage Successfully');
        }
    }

    public function edit($id)
    {
        $data['list_sub'] = ListSubscriber::where('list_sub_status', 'Active')->pluck('list_sub_name', 'list_sub_id');
        $data['form'] = Form::where('form_status', 'Active')->pluck('form_title', 'form_id');
        $data['auto'] = Autoresponder::where('auto_status', 'Active')->pluck('auto_title', 'auto_id');
        $data['lp'] = Landingpage::find($id);
        return view('landingpage.edit-step-1', $data);
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
