<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:form-list|form-create|form-edit|form-delete', ['only' => ['index','store']]);
        $this->middleware('permission:form-create', ['only' => ['create','store']]);
        $this->middleware('permission:form-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:form-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $paginate = 10;
        $user_id = Auth::user()->id;
        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['form_title', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['form_hp', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['form_address', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['form'] = Form::where('user_id', $user_id)
            ->paginate($paginate);
        } else {
            $data['form'] = Form::where('user_id', $user_id)
            ->where($where)
            ->orWhere($orwhere)
            ->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        
        return view('form.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
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
            'form_title' => 'required|min:5|max:50|string',
            'form_status' => 'required',
        ]);

        $user_id = Auth::user()->id;

        $form = new Form;
        $form->form_title = $request->form_title;
        $form->form_status = $request->form_status;
        $form->form_hp = $request->form_hp;
        $form->form_address = $request->form_address;
        $form->user_id = $user_id;
        $simpan = $form->save();

        if($simpan){
            return redirect()->route('forms.index')->with('success', 'Created Form Successfully');
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

        $data['form'] = Form::where('user_id', $user_id)->where('form_id', $id)->first();
        return view('form.show', $data);
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

        $data['form'] = Form::where('user_id', $user_id)->where('form_id', $id)->first();
        return view('form.edit', $data);
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
            'form_title' => 'required|min:5|max:50|string',
            'form_status' => 'required',
        ]);

        $form = Form::find($id);
        $form->form_title = $request->form_title;
        $form->form_status = $request->form_status;
        $form->form_hp = $request->form_hp;
        $form->form_address = $request->form_address;
        $ubah = $form->save();

        if($ubah){
            return redirect()->route('forms.index')->with('info', 'Updated Form Successfully');
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
        $form = Form::find($id);
        $hapus = $form->delete();
        if($hapus){
            return redirect()->route('forms.index')->with('warning', 'Deleted Form Successfully');
        }
    }
}
