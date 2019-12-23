<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Veritrans\Midtrans;
use App\Veritrans\Veritrans;

use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;

class SnapController extends Controller
{
    protected $request;
    public function __construct(Request $request)
    {   
        $this->request = $request;

        Midtrans::$serverKey = config('services.midtrans.serverKey');
        Midtrans::$isProduction = config('services.midtrans.isProduction');
        Veritrans::$serverKey = config('services.midtrans.serverKey');
        Veritrans::$isProduction = config('services.midtrans.isProduction');
        //Midtrans::$isSanitized = config('services.midtrans.isSanitized');
        //Midtrans::$is3ds = config('services.midtrans.is3ds');
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function snap()
    {
        return view('snap_checkout');
    }

    public function token() 
    {
        error_log(Veritrans::$isProduction);
        $midtrans = new Midtrans;

        $user_id = Auth::user()->id;

        $order = \App\Order::where('user_id', $user_id)->first();

        $total = $order->kode_unik + $order->product->product_price;
        error_log($total);

        $transaction_details = array(
            'order_id'      => $order->invoice,
            'gross_amount'  => $total
        );

        // Populate items
        $items = [
            array(
                'id'        => $order->product->product_id,
                'price'     => $total,
                'quantity'  => 1,
                'name'      => $order->product->product_name
            ),
        ];

        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => $order->user->name,
            'last_name'     => "",
            'address'       => "",
            'city'          => "",
            'postal_code'   => "",
            'phone'         => "",
            'country_code'  => 'IDN'
            );

        // Populate customer's shipping address
        $shipping_address = array(
            'first_name'    => $order->user->name,
            'last_name'     => "",
            'address'       => "",
            'city'          => "",
            'postal_code'   => "",
            'phone'         => "",
            'country_code'  => 'IDN'
            );

        // Populate customer's Info
        $customer_details = array(
            'first_name'      => $order->user->name,
            'last_name'       => "",
            'email'           => $order->user->email,
            'phone'           => "",
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
            );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'hour', 
            'duration'   => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        $shipping_address = \App\ShippingAddress::create([
            'order_id' => $order->id,
            'first_name' => $order->user->name
        ]);

        $billing_address = \App\BillingAddress::create([
            'order_id' => $order->id,
            'first_name' => $order->user->name
        ]);
    
        try
        {
            $snap_token = $midtrans->getSnapToken($transaction_data);
            //return redirect($vtweb_url);
            echo $snap_token;
        } 
        catch (Exception $e) 
        {   
            return $e->getMessage;
        }
    }

    public function finish()
    {
        return view('payment.finish');
    }

    public function unfinish(Request $request)
    {
        echo 'unfinish';
    }

    public function error(Request $request)
    {
        echo 'error';
    }

    public function notification(Request $request)
    {
       $notif = new Veritrans_Notification();
       \DB::transaction(function() use($notif) {
 
          $transaction      = $notif->transaction_status;
          $type             = $notif->payment_type;
          $orderId          = $notif->order_id;
          $fraud            = $notif->fraud_status;
          $data             = \App\Order::where('invoice',$orderId)->first();
          $user             = \App\User::findOrFail($data->user_id);

          if ($transaction == 'capture') 
          {
            if ($type == 'credit_card') 
            {
              if($fraud == 'challenge')
              {
                $data->setPending();
              }
              else 
              {
                $user->setSuccess($user);
                $data->setSuccess();
              }
            }
          } 
          elseif ($transaction == 'settlement') 
          {
                $user->setSuccess($user);
                $data->setSuccess();
          } 
          elseif($transaction == 'pending')
          {
                $data->setPending();
          } 
          elseif ($transaction == 'deny') 
          {
                $data->setFailed();
          } 
          elseif ($transaction == 'expire') 
          {
                $data->setExpired();
          } 
          elseif ($transaction == 'cancel') 
          {
                $data->setFailed();
          }
 
        });
 
        return;
    }

    // public function notification()
    // {
        // $midtrans = new Midtrans;
        // // echo 'test notification handler';
        // $json_result = file_get_contents('php://input');
        // $result = json_decode($json_result);

        // if($result){
        // $notif = $midtrans->status($result->order_id);
        // }

        // error_log(print_r($result,TRUE));

        /*
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
          // For credit card transaction, we need to check whether transaction is challenge by FDS or not
          if ($type == 'credit_card'){
            if($fraud == 'challenge'){
              // TODO set payment status in merchant's database to 'Challenge by FDS'
              // TODO merchant should decide whether this transaction is authorized or not in MAP
              echo "Transaction order_id: " . $order_id ." is challenged by FDS";
              } 
              else {
              // TODO set payment status in merchant's database to 'Success'
              echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
              }
            }
          }
        else if ($transaction == 'settlement'){
          // TODO set payment status in merchant's database to 'Settlement'
          echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
          } 
          else if($transaction == 'pending'){
          // TODO set payment status in merchant's database to 'Pending'
          echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
          } 
          else if ($transaction == 'deny') {
          // TODO set payment status in merchant's database to 'Denied'
          echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }*/
   
    // }
}    