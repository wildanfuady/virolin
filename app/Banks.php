<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = "banks";
    
    protected $fillable = [
        'bank_name', 'bank_status'
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
