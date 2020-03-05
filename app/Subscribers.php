<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    //
    protected $table = "subscribers";
    
    protected $fillable = [
        'subscriber_name', 'subscriber_email', 'subscriber_nohp', 'subscriber_alamat','subscriber_verifikasi', 'subscriber_status', 'user_id' ,'campaign_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
