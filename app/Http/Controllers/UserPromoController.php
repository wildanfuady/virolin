<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;

class UserPromoController extends Controller
{
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
