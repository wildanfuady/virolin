<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "products";
    protected $primaryKey = "product_id";
    
    protected $fillable = [
        'product_id','product_name', 'product_desc', 'product_max_db', 'product_status','product_price'
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }
    public function user()
    {
        return $this->hasMany('App\User');
    }
}
