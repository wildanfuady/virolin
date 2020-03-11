<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPromoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index(Request $request)
    {
        $now = date('Y-m-d');
        $paginate= 3;
        $data['promo'] = Promo::where('promo_status', 'Active')->where('promo_start', '<=', $now)->where('promo_end', '>=', $now)->paginate($paginate);
        return view('promo.user.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);
    }

    public function fetch_promo()
    {
        $now = date('Y-m-d');
        $data['data'] = Promo::where('promo_status', 'Active')->where('promo_start', '<=', $now)->where('promo_end', '>=', $now)->limit(5)->get();
        return response()->json($data);
    }

    public function cek_promo(Request $request, $kode_kupon)
    {
        $kode_kupon = strtoupper($kode_kupon);
        $kode_produk = $request->query('kode_produk');
        
        $tanggal_sekarang = date('Y-m-d');
        // cek kode kupon
        $promo = \App\Promo::where('promo_status', 'Active')->where('promo_code', $kode_kupon)->where('promo_start', '<=', $tanggal_sekarang)->where('promo_end', '>=', $tanggal_sekarang)->first();

        if(!empty($promo) && !empty($kode_produk)){

            $percent = $promo->promo_percent;

            $product = \App\Products::find($kode_produk);
            $harga_produk = $product->product_price;

            $order = \App\Order::where('product_id', $kode_produk)->where('user_id', Auth::user()->id)->first();
            $kode_unik = $order->kode_unik;

            $diskon = intval($percent * ($harga_produk + $kode_unik) / 100);
            $total = ($harga_produk + $kode_unik) - $diskon;
            $data = [
                'success' => true,
                'message' => 'Berhasil menggunakan promo',
                'nilai_kupon' => $total,
                'diskon' => $diskon
            ];

            // set session
            $request->session()->put('kode_promo', $promo->promo_id);

        } else {
            
            $data = [
                'success' => false,
                'message' => 'Kode promo tidak ditemukan atau sudah expired',
                'nilai_kupon' => 0,
                'diskon' => 0
            ];
        }

        return response()->json($data);
    }

    public function show($id)
    {
        $now = date('Y-m-d');
        $data['detail_promo'] = Promo::where('promo_status', 'Active')->where('promo_start', '<=', $now)->where('promo_end', '>=', $now)->where('promo_id', '<>', $id)->limit(5)->get();
        $data['promo'] = Promo::find($id);
        if(empty($data['promo'])){
            return redirect(url('promo'));
        }
        return view('promo.user.show', $data);
    }
}
