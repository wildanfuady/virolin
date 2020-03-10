<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Promo;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PromoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
        $this->middleware('permission:promo-list|promo-create|promo-edit|promo-delete', ['only' => ['index','store']]);
        $this->middleware('permission:promo-create', ['only' => ['create','store']]);
        $this->middleware('permission:promo-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:promo-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $keyword = $request->query('keyword');
        $paginate = 10;
        $where = [];

        if(!empty($keyword)) {
            $where[] = ['promo_title', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $data['list_promo'] = \App\Promo::paginate($paginate);
        }
        else {
            $data['list_promo'] = \App\Promo::where($where)->paginate($paginate);
        }
        $data['keyword'] = $keyword;
        return view('promo.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promo.create');
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
            'promo_title' => 'required',
            'promo_status' => 'required',
            'promo_start' => 'required',
            'promo_end' => 'required',
            'promo_content' => 'required',
            'promo_code' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'promo_percent' => 'required|numeric',
            'promo_image' => 'required|max:1000'
        ];

        $messages = [
            'promo_title.required' => 'Judul Promo wajib diisi',
            'promo_status.required' => 'Status wajib diisi',
            'promo_start.required' => 'Tanggal Mulai Promo wajib diisi',
            'promo_end.required' => 'Tanggal Akhir Promo wajib diisi',
            'promo_content.required' => 'Konten Promo wajib diisi',
            'promo_code.required' => 'Kode Promo wajib diisi',
            'promo_code.regex' => 'Kode Promo hanya boleh diisi dengan angka, huruf dan spasi',
            'promo_percent.required' => 'Nilai % Promo wajib diisi',
            'promo_percent.numeric' => 'Nilai % Promo hanya boleh diisi dengan angka',
            'promo_image.required' => 'Gambar wajib diisi',
            'promo_image.max' => 'Kapasitas Gambar maksimal 1 mb'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $judul = $request->input('promo_title');
        $lower = strtolower($judul);
        $slug = str_replace(" ", "-", $lower);

        $image = $request->file('promo_image')->store('promo', 'public');

        $promo = new Promo;
                
        $promo->promo_title = $request->input('promo_title');
        $promo->promo_slug = $slug;
        $promo->promo_status = $request->input('promo_status');
        $promo->promo_start = $request->input('promo_start');
        $promo->promo_end = $request->input('promo_end');
        $promo->promo_code = $request->input('promo_code');
        $promo->promo_percent = $request->input('promo_percent');
        $promo->promo_image = $image;
        $promo->promo_content = $request->input('promo_content');
        $insert = $promo->save();

        if($insert){
            return redirect(url('promos'))->with('success', 'Created Promo Successfully');
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
        $data['promo'] = Promo::find($id);
        return view('promo.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['promo'] = Promo::find($id);
        return view('promo.edit', $data);
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
            'promo_title' => 'required',
            'promo_status' => 'required',
            'promo_start' => 'required',
            'promo_end' => 'required',
            'promo_content' => 'required',
            'promo_code' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'promo_percent' => 'required|numeric',
            'promo_image' => 'max:1000'
        ];

        $messages = [
            'promo_title.required' => 'Judul Promo wajib diisi',
            'promo_status.required' => 'Status wajib diisi',
            'promo_start.required' => 'Tanggal Mulai Promo wajib diisi',
            'promo_end.required' => 'Tanggal Akhir Promo wajib diisi',
            'promo_content.required' => 'Konten Promo wajib diisi',
            'promo_code.required' => 'Kode Promo wajib diisi',
            'promo_code.regex' => 'Kode Promo hanya boleh diisi dengan angka, huruf dan spasi',
            'promo_percent.required' => 'Nilai % Promo wajib diisi',
            'promo_percent.numeric' => 'Nilai % Promo hanya boleh diisi dengan angka',
            'promo_image.max' => 'Kapasitas Gambar maksimal 1 mb'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        } 

        $judul = $request->input('promo_title');
        $lower = strtolower($judul);
        $slug = str_replace(" ", "-", $lower);

        $promo = Promo::find($id);

        if($request->file('promo_image') != null)
        {
            $image = $request->file('promo_image')
                ->store('promo', 'public');
            $promo->promo_image = $image;
        }

        $promo->promo_title = $request->input('promo_title');
        $promo->promo_slug = $slug;
        $promo->promo_status = $request->input('promo_status');
        $promo->promo_start = $request->input('promo_start');
        $promo->promo_end = $request->input('promo_end');
        $promo->promo_code = $request->input('promo_code');
        $promo->promo_percent = $request->input('promo_percent');
        $promo->promo_content = nl2br($request->input('promo_content'));
        $update = $promo->save();

        if($update){
            return redirect(url('promos'))->with('info', 'Updated Promo Successfully');
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
        $promo = Promo::find($id);
        $hapus = $promo->delete();
        if($hapus){
            return redirect()->route('promos.index')->with('warning', 'Deleted Promo Successfully');
        }
    }
}
