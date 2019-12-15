<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
        $this->middleware('permission:banks-list|banks-create|banks-edit|banks-delete', ['only' => ['index','store']]);
        $this->middleware('permission:banks-create', ['only' => ['create','store']]);
        $this->middleware('permission:banks-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:banks-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $paginate = 10;
        $data['banks'] = \App\Banks::paginate($paginate);
        return view('bank.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
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
            'promo_title' => 'required|string',
            'promo_status' => 'required',
            'promo_start' => 'required',
            'promo_end' => 'required',
            'promo_content' => 'required'
        ]);

        $image = $request->file('bank_image')
                ->store('banks', 'public');

        $bank = new \App\Banks;
        $bank->bank_name = $request->input('bank_name');
        $bank->bank_code = $request->input('bank_code');
        $bank->bank_nasabah = $request->input('bank_nasabah');
        $bank->bank_number = $request->input('bank_number');
        $bank->bank_status = $request->input('bank_status');
        $bank->bank_image = $image;
        $simpan = $bank->save();

        if($simpan){
            return redirect(route('banks.index'))->with('success', 'Created Bank Successfully');
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
        $data['bank'] = \App\Banks::find($id);
        return view('bank.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['bank'] = \App\Banks::find($id);
        return view('bank.edit', $data);

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
            'promo_title' => 'required|string',
            'promo_status' => 'required',
            'promo_start' => 'required',
            'promo_end' => 'required',
            'promo_content' => 'required'
        ]);

        $bank = \App\Banks::find($id);

        if($request->file('bank_image') != null)
        {
            $image = $request->file('bank_image')
                ->store('banks', 'public');
            $bank->bank_image = $image;
        } 

        
        $bank->bank_name = $request->input('bank_name');
        $bank->bank_code = $request->input('bank_code');
        $bank->bank_nasabah = $request->input('bank_nasabah');
        $bank->bank_number = $request->input('bank_number');
        $bank->bank_status = $request->input('bank_status');
        $simpan = $bank->save();

        if($simpan){
            return redirect(route('banks.index'))->with('info', 'Updated Bank Successfully');
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
        $bank = \App\Banks::find($id);
        $hapus = $bank->delete();
        if($hapus){
            return redirect()->route('banks.index')->with('warning', 'Deleted Bank Successfully');
        }
    }
}
