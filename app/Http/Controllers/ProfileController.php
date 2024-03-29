<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $this->middleware('permission:profile-list|profile-edit', ['only' => ['index','password']]);
        $this->middleware('permission:profile-list', ['only' => ['index','password']]);
        $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:profile-edit-password', ['only' => ['password','password_update']]);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        // Butuh modifikasi
        $data['account'] = \App\User::find($user_id);
        $data['order'] = \App\Order::where('user_id', $user_id)->first();
        $data['subscriber'] = \App\Subscribers::where('user_id', $user_id)->first();
        $data['total_db'] = \App\Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->count();

        return view('profile.index', $data);
    }

    public function password(){
        return view('profile.password');
    }

    public function password_update(Request $request){
        $rules = [
            'password_new' => 'required|string|min:8|max:50',
            'password_re' => 'required|string|min:8|max:50'
        ];

        $messages = [
            'password_new.required' => 'Password wajib diisi',
            'password_new.min' => 'Password minimal 8 karakter',
            'password_new.max' => 'Password wajib maksimal 50 karakter',
            'password_re.required' => 'Password wajib diisi',
            'password_re.min' => 'Password minimal 8 karakter',
            'password_re.max' => 'Password wajib maksimal 50 karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        if($request->password_new != $request->password_re){
            return redirect()->back()->withErrors(['Password Baru dan Konfirmasi harus sesuai'])->withInput($request->all());
        }

        $password =  Hash::make($request->password_new);

        $user_id = Auth::user()->id;
        $user = \App\User::find($user_id);

        $user->password = $password;

        $user->save();

        return redirect()->route('profil.index')->with('info','Updated Password Successfully');
    }

    public function edit(){
        $user_id = Auth::user()->id;
        $data['user'] = \App\User::find($user_id);
        // return $data;
        return view('profile.edit', $data);
    }

    public function update(Request $request){
        $rules = [
            'name' => 'required|min:5|max:50|regex:/^[a-zA-Z ]+$/u',
            'email' => 'required|email',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'max:1000'
        ];

        $messages = [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.min' => 'Nama Lengkap minimal 5 karakter',
            'name.max' => 'Nama Lengkap wajib maksimal 50 karakter',
            'name.regex' => 'Nama Lengkap hanya boleh diisi dengan huruf dan spasi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email yang Anda masukan tidak valid',
            'gender.required' => 'Jenis Kelamin wajib diisi',
            'phone.required' => 'Nomor telepon wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'image.max' => 'File gambar maksimal 1 mb',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $id = Auth::user()->id;
        $user = \App\User::find($id);

        if(!empty($request->file('image'))){
            $image = $request->file('image')->store('user', 'public');
            $user->image = $image;
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->gender = $request->get('gender');
        $user->phone = $request->get('phone');
        $user->address = $request->get('address');

        $user->save();

        return redirect()->route('profil.index')->with('info','Updated Profil Successfully');
    }
}
