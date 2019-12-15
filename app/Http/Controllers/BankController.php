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
        $rules = [
            'bank_name' => 'required|string',
            'bank_code' => 'required|numeric',
            'bank_status' => 'required',
            'bank_nasabah' => 'required',
            'bank_number' => 'required|numeric',
            'bank_image' => 'required|mimes:jpeg,jpg,png|max:1000'
        ];

        $message = [
            'bank_name.required' => 'Nama Bank wajib diisi!',
            'bank_name.string' => 'Nama Bank hanya bolek kombinasi huruf dan angka!',
            'bank_code.required' => 'Kode Bank wajib diisi!',
            'bank_code.numeric' => 'Kode Bank hanya boleh diisi angka!',
            'bank_nasabah.required' => 'Kode Produk wajib diisi!',
            'bank_status.required' => 'Status Produk wajib diisi!',
            'bank_number.required' => 'Kategori Produk wajib diisi!',
            'bank_number.numeric' => 'Kode Bank hanya boleh diisi angka!',
            'bank_image.required' => 'Logo Bank wajib diisi!',
            'bank_image.mimes' => 'Logo Bank hanya boleh berformat jpeg, jpg, dan png!',
            'bank_image.max' => 'Logo Bank maksimal 1 mb!'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect(route('banks.create'))
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {

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
            'bank_name' => 'required|string',
            'bank_code' => 'required|numeric',
            'bank_status' => 'required',
            'bank_nasabah' => 'required',
            'bank_number' => 'required|numeric',
            'bank_image' => 'mimes:jpeg.jpg,png|max:1000'
        ];

        $message = [
            'bank_name.required' => 'Nama Bank wajib diisi!',
            'bank_name.string' => 'Nama Bank hanya bolek kombinasi huruf dan angka!',
            'bank_code.required' => 'Kode Bank wajib diisi!',
            'bank_code.numeric' => 'Kode Bank hanya boleh diisi angka!',
            'bank_nasabah.required' => 'Nama Nasabah wajib diisi!',
            'bank_status.required' => 'Status Produk wajib diisi!',
            'bank_number.required' => 'Kode Bank Produk wajib diisi!',
            'bank_number.numeric' => 'Kode Bank hanya boleh diisi angka!',
            'bank_image.mimes' => 'Logo Bank hanya boleh berformat jpeg, jpg, dan png!',
            'bank_image.max' => 'Logo Bank maksimal 1 mb!'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect(route('banks.edit', $id))
                    ->withErrors($validator)
                    ->withInput($request->all());
        } else {

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
