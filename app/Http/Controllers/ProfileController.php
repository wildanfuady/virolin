<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        // Butuh modifikasi
        $data['account'] = \App\User::find($user_id);
        $data['order'] = \App\Order::where('user_id', $user_id)->first();
        $data['subscriber'] = \App\Subscribers::where('user_id', $user_id)->first();
        return view('profile.index', $data);
    }

    public function password(){
        return view('profile.password');
    }

    public function password_update(Request $request){
        $rules = [
            'password_new' => 'required|string|min:8|max:80',
            'password_re' => 'required|string|min:8|max:80'
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

        return redirect()->route('profil.index')->with('info','Ubah Password Success');
    }
}
