<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = "promo";
    protected $primaryKey = "promo_id";

    public static function totalPromo() {
        $now = date('Y-m-d');
        return Promo::where('promo_start', '<=', $now)->where('promo_end', '>=', $now)->count();
    }
}
