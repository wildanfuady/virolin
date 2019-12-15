<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Order;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Products;
use App\Banks;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $products = DB::table('products')->get();
        $banks = DB::table('banks')->get();
        return view('auth.register',['products' => $products, 'banks' => $banks]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'product_id' => ['required','string'],
            'bank_id' => ['required','string'],
            'invoice' => ['required','string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // var_dump($data);die();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'product_id' => $data['product_id']
        ]);

        $user->userData = Order::create([
            'product_id' => $data['product_id'],
            'order_end' => Carbon::now()->add(2, 'day'),
            'order_status' => 'Pending',
            'order_payment' => $data['bank_id'],
            'user_id' => $user->id,
            'invoice' => $data['invoice'],
        ]);
        
        return $user;
    }

}
