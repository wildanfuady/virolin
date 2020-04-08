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
            $users = \App\Order::join('products', 'products.product_id', '=', 'orders.product_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.level','<>','admin')->paginate($paginate);
        }
        else {
            $users = \App\User::join('products', 'products.product_id', '=', 'orders.product_id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->where('users.level','admin')->where($where)->orWhere($orwhere)->paginate($paginate);
        }

        // var_dump($users);

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
            'status' => 'required',
            'product_id' => 'required',
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

        $status = $request->status;

        $user                       = new User;

        if($status == "Pending"){
            $user->status               = 'invalid';
        } else if($status == "Success"){
            $user->status               = 'valid';
            $user->email_verified_at    = Carbon::now();
        } else {
            $user->status               = 'invalid';
            $user->email_verified_at    = Carbon::now();
        }

        $user->name                 = $request->name;
        $user->email                = $request->email;
        $user->password             = Hash::make($request->password);
        $user->level                = 'user';
        $user->save();

        $user->assignRole($request->input('roles'));

        // get product
        $product = \App\Products::where('product_id', $request->get('product_id'))->first();
        if(!empty($product)){
            $type = $product->product_type;
            if($type == "bulanan"){
                $end = Carbon::now()->addDays(30);
            } else if($type == "tahunan"){
                $end =  Carbon::now()->addDays(365);
            } else if($type == "tiga_bulan"){
                $end = Carbon::now()->addDays(90);
            } else if($type == "enam_bulan"){
                $end = Carbon::now()->addDays(180);
            } else {
                $end = Carbon::now()->addDays(1);
            }
        }
        // orders
        $invoice                    = rand(00000, 99999);
        $order_date                 = Carbon::now();
        $order_end                  = Carbon::now()->addDays(7);
        $kode_unik                  = rand(000, 999);

        $order                      = new \App\Order;
    
        $order->product_id          = $product->product_id;
        $order->invoice             = $invoice;
        $order->order_date          = $order_date;

        if($status == "Pending"){
            $order->order_end           = $order_end;
        } else if($status == "Success"){
            $order->order_end           = $end;
        } else {
            $order->order_end           = Carbon::now();
        }

        $order->order_status        = $status;
        $order->user_id             = $user->id;
        $order->order_payment       = 1;
        $order->kode_unik           = $kode_unik;
        $order->save();

        return redirect('user')->with('success','Created User Successfully');
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
        $user->save();

        if(!empty($request->input('roles'))){
            $user->assignRole($request->input('roles'));
        }

        return redirect()->route('user.index')->with('info','Updated Promo Successfully');
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
        return redirect()->route('user.index')->with('warning','Deleted Promo Successfully');
    }
}
