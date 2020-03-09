<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 10;

        $keyword = $request->query('keyword');

        $where = [];
        $orwhere = [];

        if(!empty($keyword)) {
            $where[] = ['name', 'LIKE', "%{$keyword}%"];
            $orwhere[] = ['email', 'LIKE', "%{$keyword}%"];
        }

        if(empty($keyword)) {
            $users = \App\User::with(['product'])->where('level','<>','admin')->paginate($paginate);
        }
        else {
            $users = \App\User::with(['product'])->where('level','<>','admin')->where($where)->orWhere($orwhere)->paginate($paginate);
        }

        $date_expired = Carbon::now()->add(10, 'days');
        $date_now = Carbon::now();
        $produk = \App\Products::get();

        return view('users.index', compact('users','date_expired','date_now','produk', 'keyword'))->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = \App\Products::get();
        $roles = Role::pluck('name','name')->all();
        return view('users.create', compact('produk', 'roles'));
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
            'name' => 'required|min:5|max:50|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|email',
            'product_id' => 'required',
            'status' => 'required',
            'password' => 'required|string|min:8|max:80'
        ];

        $messages = [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.min' => 'Nama Lengkap minimal 5 karakter',
            'name.max' => 'Nama Lengkap wajib maksimal 50 karakter',
            'name.regex' => 'Nama Lengkap hanya boleh diisi dengan huruf dan spasi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang Anda masukan tidak valid',
            'product_id.required' => 'Produk wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password wajib maksimal 50 karakter',
            'status.required' => 'Status wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['level'] = 'user';

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

        return redirect('users')->with('success','Created User Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('users.id', $id)->first();
        $products = \App\Products::pluck('product_name', 'product_id');
        $roles = Role::pluck('name','name')->all();
        return view('users.show', compact('products', 'roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $products = \App\Products::pluck('product_name', 'product_id');
        $roles = Role::pluck('name','name')->all();
        return view('users.edit', compact('products', 'roles', 'user'));
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
            'name' => 'required|min:5|max:50|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|email',
            'product_id' => 'required',
            'status' => 'required'
        ];

        $messages = [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.min' => 'Nama Lengkap minimal 5 karakter',
            'name.max' => 'Nama Lengkap wajib maksimal 50 karakter',
            'name.regex' => 'Nama Lengkap hanya boleh diisi dengan huruf dan spasi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang Anda masukan tidak valid',
            'product_id.required' => 'Produk wajib diisi',
            'status.required' => 'Status wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $user = \App\User::find($id);

        if(!empty($request->get('password'))){
            $user->password = Hash::make($request->get('password'));
        }

        if($request->get('status') == "valid"){
            $user->setSuccess($user);
        }
        // dd($request->input('roles'));
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->product_id = $request->get('product_id');
        $user->save();

        if(!empty($request->input('roles'))){
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('users.index')->with('info','Updated Promo Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = \App\User::find($id);
        $users->delete();
        return redirect()->route('users.index')->with('warning','Deleted Promo Successfully');
    }
}
