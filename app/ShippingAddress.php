<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public $fillable = [
        'order_id',
        'first_name',
        'address',
        'city',
        'postal_code',
        'phone'
    ];

    public function order() {
        return $this->belongsTo('App\Order');
    }
}
