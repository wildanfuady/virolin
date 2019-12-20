<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $primaryKey = "payment_id";

    public function bank()
    {
        return $this->belongsTo('App\Banks', 'payment_to_bank');
    }
}
