<?php

namespace App;

use App\User;
use App\Products;
use App\Banks;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";
    
    protected $fillable = [
        'product_id', 'order_date', 'order_end', 'order_status', 'order_payment', 'user_id','invoice'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Products','product_id');
    }

    public function bank()
    {
        return $this->belongsTo('App\Banks','order_payment');
    }
}
