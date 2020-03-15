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
        $this->middleware('permission:bank-list|bank-create|bank-edit|bank-delete', ['only' => ['index','store']]);
        $this->middleware('permission:bank-create', ['only' => ['create','store']]);
        $this->middleware('permission:bank-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bank-delete', ['only' => ['destroy']]);
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
        $rules = [
            'bank_name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'bank_code' => 'required|numeric',
            'bank_nasabah' => 'required|regex:/^[a-zA-Z ]+$/u',
            'bank_number' => 'required|numeric',
            'bank_status' => 'required',
            'bank_image' => 'required|max:1000|dimensions:max_width=200,max_height=200'
        ];

        $messages = [
            'bank_name.required' => 'Nama Bank wajib diisi',
            'bank_name.regex' => 'Nama Bank hanya boleh diisi dengan huruf dan spasi',
            'bank_code.required' => 'Kode Bank wajib diisi',
            'bank_code.numeric' => 'Kode Bank hanya boleh diisi dengan angka',
            'bank_nasabah.required' => 'Nama Nasabah wajib diisi',
            'bank_nasabah.regex' => 'Nama Nasabah hanya boleh diisi dengan huruf dan angka',
            'bank_number.required' => 'No Rekening Bank wajib diisi',
            'bank_number.numeric' => 'No Rekening Bank hanya boleh diisi dengan angka',
            'bank_status.required' => 'Status wajib diisi',
            'bank_image.required' => 'Logo Bank wajib diisi',
            'bank_image.max' => 'Logo Bank maksimal 1 mb',
            'bank_image.dimensions' => 'Logo Bank maksimal lebar 200px dan tinggi 200px'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

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
            return redirect(route('bank.index'))->with('success', 'Created Bank Successfully');
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
        $rules = [
            'bank_name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'bank_code' => 'required|numeric',
            'bank_nasabah' => 'required|regex:/^[a-zA-Z ]+$/u',
            'bank_number' => 'required|numeric',
            'bank_status' => 'required',
            'bank_image' => 'max:1000|dimensions:max_width=200,max_height=200'
        ];

        $messages = [
            'bank_name.required' => 'Nama Bank wajib diisi',
            'bank_name.regex' => 'Nama Bank hanya boleh diisi dengan huruf dan spasi',
            'bank_code.required' => 'Kode Bank wajib diisi',
            'bank_code.numeric' => 'Kode Bank hanya boleh diisi dengan angka',
            'bank_nasabah.required' => 'Nama Nasabah wajib diisi',
            'bank_nasabah.regex' => 'Nama Nasabah hanya boleh diisi dengan huruf dan angka',
            'bank_number.required' => 'No Rekening Bank wajib diisi',
            'bank_number.numeric' => 'No Rekening Bank hanya boleh diisi dengan angka',
            'bank_status.required' => 'Status wajib diisi',
            'bank_image.max' => 'Logo Bank maksimal 1 mb',
            'bank_image.dimensions' => 'Logo Bank maksimal lebar 200px dan tinggi 200px'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

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
            return redirect(route('bank.index'))->with('info', 'Updated Bank Successfully');
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
            return redirect()->route('bank.index')->with('warning', 'Deleted Bank Successfully');
        }
    }
}
