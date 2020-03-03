<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Landingpage;
use App\Campaign;
use App\ListSubscriber;
use App\Form;
use App\Autoresponder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Input;
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

    public function campaign($slug)
    {
        $campaign = Campaign::join('templates', 'campaigns.campaign_template', '=', 'templates.template_id')
                    ->where('campaign_slug', $slug)->first();

        if(!empty($campaign)){
            $campaign->campaign_form_view += 1;
            $campaign->save(); 
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

        $campaign = Campaign::where('campaign_slug', $slug)->first();

        if(!empty($campaign)){
            $id = $campaign->campaign_id;
            $user = $campaign->user_id;
            $text = $campaign->campaign_confirm;
            $title_confirm = $campaign->campaign_subject_confirm_email;
            $group = $campaign->campaign_group;
        }

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
            // Update campaign
            $campaign = Campaign::where('campaign_id', 12)->first();
            $campaign->campaign_share = $campaign->campaign_share + 3;
            $update = $campaign->save();

            $kirim = Mail::to($email)->send(new ConfirmEmail($fullname, $email, $token, $title, $text, $slug));

            return redirect(url($slug.'/confirm'));
            
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
