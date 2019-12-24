<?php

namespace App;

use App\User;
use App\Products;
use App\Banks;
use Illuminate\Database\Eloquent\Model;
use App\Mail\KirimEmailNotificationPayment;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    //
    protected $table = "orders";
    
    protected $fillable = [
        'product_id', 'order_date', 'order_end', 'order_status', 'order_payment', 'user_id','invoice','payment_type','transaction_id'
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

    public function setPending()
    {
        $this->attributes['order_status'] = 'Waiting for payment';
        self::save();
    }
 
    public function setSuccess()
    {
        $this->attributes['order_status'] = 'Success';
        self::save();
    }
 
    public function setFailed()
    {
        $this->attributes['order_status'] = 'Failed';
        self::save();
    }
 
    public function setExpired()
    {
        $this->attributes['order_status'] = 'Expired';
        self::save();
    }
}
