<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('admin');
        $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store']]);
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:users-delete', ['only' => ['destroy']]);
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
        $this->validate($request,[
            'name' => 'required|min:5|max:50|string',
            'email' => 'required|email',
            'product_id' => 'required|numeric',
            'status' => 'required|string',
            'masa_aktif' => 'required',
            'password' => 'required|string',
            'roles' => 'required'
        ]);

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
        $user = User::find($id);
        $products = \App\Products::pluck('product_name', 'id');
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
        $user = \App\User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->product_id = $request->get('product_id');
        $user->save();
        if(!empty($request->input('roles'))){
            $user->assignRole($request->input('roles'));
        }
        return redirect()->route('users.index')->with('success','Updated Promo Successfully');
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
