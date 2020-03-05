<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landingpage;
use App\Campaign;
use App\ListSubscriber;
use App\Subscribers;
use App\Order;
use App\Form;
use App\Autoresponder;
use App\TrafikCampaign;
use App\TrafikShare;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
use Carbon\Carbon;
use App\Mail\ConfirmEmail;
use App\Mail\ThankEmail;
use Illuminate\Support\Facades\Mail;

class CampaignShareController extends Controller
{
    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }

    public function custom()
    {
        return view('campaign/create/index');
    }

    public function campaign(Request $request, $slug)
    {
        $campaign = Campaign::join('templates', 'campaigns.campaign_template', '=', 'templates.template_id')
                    ->where('campaign_slug', $slug)->first();

        if(!empty($campaign)){
            // get data ip 
            $server = $_SERVER;

            $ip = $server['REMOTE_ADDR'];
            $tanggal = date('Y-m-d');
            $cek_trafik = \App\TrafikCampaign::where('trafik_ip', $ip)->where('created_at', Carbon::today())->first();

            if(empty($cek_trafik)){

                $medium = $request->query('utm_medium');
            
                // get data browser
                $browser =  $server['HTTP_USER_AGENT'];
                $chrome = '/Chrome/';
                $firefox = '/Firefox/';
                $ie = '/IE/';
                if(preg_match($chrome, $browser)){
                    $dataBrowser = 'Chrome/Opera';
                }elseif(preg_match($firefox, $browser)){
                    $dataBrowser = 'Firefox';
                }elseif(preg_match($ie, $browser)){
                    $dataBrowser = 'IE';
                }
                // get id_campaign
                $id_campaign = $campaign->campaign_id;
                // save trafik
                $trafik_campaign = new \App\TrafikCampaign;

                if(!empty($medium)) {
                    $trafik_campaign->trafik_medium = $medium;
                }

                $trafik_campaign->trafik_ip = $ip;
                $trafik_campaign->trafik_browser = $dataBrowser;
                $trafik_campaign->campaign_id = $id_campaign;
                $trafik_campaign = $trafik_campaign->save();

                $campaign->campaign_form_view += 1;
                $campaign->save();
            }

            return view('campaign.page', compact('campaign'));
        } else {
            return view('campaign/error_404');
        }

    }

    public function share($slug)
    {
        // $id = 12;
        $campaign = Campaign::where('campaign_slug', $slug)->first();

        if(!empty($campaign)){
            $campaign->campaign_form_view += 1;
            $campaign->save(); 
            return view('campaign/share', compact('campaign'));
        } else {
            return view('campaign/error_404');
        }
        
    }

    public function send(Request $request, $slug)
    {

        $campaign = Campaign::where('campaign_slug', $slug)->first();

        if(empty($campaign)){

            return redirect(url($slug.'/failed'))->with('warning', 'Maaf, Anda tidak dapat submit ke page ini. Hubungi pemilik campaign untuk info lebih lanjut.');
        
        } else {

            // dapatkan id user
            $user_id = $campaign->user_id;

            // cek jumlah database yang ia miliki
            $total_subscriber_user = Subscribers::where(['user_id' => $user_id, 'subscriber_status' => 'valid'])->count();
            // tampilkan maksimal subscriber yang ia miliki
            $select = "products.product_max_db";
            $total_max_database_user = Order::join('products', 'orders.product_id', '=', 'products.product_id')
                                        ->where('orders.user_id', $user_id)
                                        ->selectRaw($select)
                                        ->first();

            if($total_subscriber_user >= $total_max_database_user->product_max_db){

                return redirect(url($slug.'/failed'))->with('warning', 'Maaf, Anda tidak dapat subscribe ke page ini. Hubungi pemilik campaign untuk info lebih lanjut.');
            
            } else {


                $rules = [
                    'fullname' => 'required|string|regex:/^[a-zA-Z ]+$/u|max:35',
                    'email' => 'required|email'
                ];

                $messages = [
                    'fullname.required' => 'Nama Lengkap wajib diisi',
                    'fullname.string' => 'Nama Lengkap hanya boleh berupa huruf dan angka',
                    'fullname.regex' => 'Nama Lengkap hanya boleh berupa huruf dan angka',
                    'fullname.max' => 'Nama Lengkap maksimal 35 karakter termasuk spasi',
                    'email.required' => 'Email wajib diisi',
                    'email.email' => 'Email yang Anda masukan tidak valid',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                
                if($validator->fails()){
                    return redirect(url($slug.'/failed'))->withErrors($validator)->withInput($request->all());
                }

                $fullname = $request->fullname;
                $email = $request->email;
                $token = $this->getToken(30);

                $medium = $request->query('utm_medium');

                $id = $campaign->campaign_id;
                $user = $campaign->user_id;
                $text = $campaign->campaign_confirm;
                $title_confirm = $campaign->campaign_subject_confirm_email;
                $group = $campaign->campaign_group;

                $sub = new \App\Subscribers;

                $sub->subscriber_name = $fullname;
                $sub->subscriber_email = $email;
                $sub->subscriber_nohp = "Tidak";
                $sub->subscriber_alamat = "Tidak";
                $sub->subscriber_verifikasi = $token;
                $sub->subscriber_status = "invalid";
                $sub->user_id = $user;
                $sub->campaign_id = $id;
                $sub->list_sub_id = $group;
                $simpan = $sub->save();

                if($simpan){
                    // get data ip 
                    $server = $_SERVER;
                    // get data browser
                    $browser =  $server['HTTP_USER_AGENT'];
                    $chrome = '/Chrome/';
                    $firefox = '/Firefox/';
                    $ie = '/IE/';
                    if(preg_match($chrome, $browser)){
                        $dataBrowser = 'Chrome/Opera';
                    }elseif(preg_match($firefox, $browser)){
                        $dataBrowser = 'Firefox';
                    }elseif(preg_match($ie, $browser)){
                        $dataBrowser = 'IE';
                    }
                    // get id_campaign
                    $id_campaign = $campaign->campaign_id;
                    

                    $ip = $server['REMOTE_ADDR'];
                    for ($i=0; $i < 3; $i++) { 
                        // save trafik
                        $trafik_share = new \App\TrafikShare;

                        if(!empty($medium)) {
                            $trafik_campaign->trafik_medium = $medium;
                        }

                        $trafik_share->trafik_ip = $ip;
                        $trafik_share->trafik_browser = $dataBrowser;
                        $trafik_share->campaign_id = $id_campaign;
                        $trafik_share = $trafik_share->save();
                    }

                    // Update campaign
                    $campaign->campaign_share = $campaign->campaign_share + 3;
                    $update = $campaign->save();

                    $kirim = Mail::to($email)->send(new ConfirmEmail($fullname, $email, $token, $title_confirm, $text, $slug));

                    return redirect(url($slug.'/confirm'));
                    
                }
            }
        }
    }

    public function failed($slug)
    {
        $slug = $slug;
        return view('campaign.failed', compact('slug'));
    }

    public function notif_confirm()
    {
        return view('campaign.confirm');
    }

    public function confirm($slug, $token)
    {
        $verify = \App\Subscribers::where(['subscriber_verifikasi' => $token, 'subscriber_status' => 'invalid'])->first();

        if(empty($verify)){
            return redirect(url($slug.'/failed'));
        }

        $campaign = Campaign::where('campaign_slug', $slug)->first();

        if(!empty($campaign)){
            $title = $campaign->campaign_subject_thank_email;
            $thank = $campaign->campaign_form_thank;
        }

        $fullname = $verify->subscriber_name;
        $email = $verify->subscriber_email;

        $verify->subscriber_status = "valid";
        $update = $verify->save();

        $kirim = Mail::to($email)->send(new ThankEmail($fullname, $title, $email, $thank));
        
        return redirect(url($slug.'/thanks'));
        
    }

    public function thanks()
    {
        return view('campaign.thanks');
    }
}
