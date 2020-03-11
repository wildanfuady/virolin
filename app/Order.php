<?php

namespace App;

use App\User;
use App\Products;
use App\Banks;
use DB;
use Carbon\Carbon;
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
 
    public function setSuccess(Order $order)
    {
        $product = DB::table('products')->where('product_id', $order->product_id)->first();
        $tipe = $product->product_type;

        if($tipe == "bulanan"){
            $expired = Carbon::now()->addDays(30);
        } else if($tipe == "tiga_bulanan"){
            $expired = Carbon::now()->addDays(90);
        } else if($tipe == "enam_bulanan"){
            $expired = Carbon::now()->addDays(180);
        } else if($tipe == "tahunan"){
            $expired = Carbon::now()->addDays(365);
        } else {
            $expired = Carbon::now();
        }
        $this->attributes['order_status'] = 'Success';
        $this->attributes['order_expired'] = $expired;
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
