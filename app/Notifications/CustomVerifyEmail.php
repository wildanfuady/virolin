<?php

namespace App\Notifications;

use App\User;
use App\Products;
use App\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use DB;

class CustomVerifyEmail extends Notification
{
    use Queueable,SerializesModels;
    public static $toMailCallback;
    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $product;
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);
        $user = Auth::user()['name'];
        $user_id = Auth::user()['id'];
        $product_id = Auth::user()['product_id'];
        $order = \App\Order::with(['user','product','bank'])->where('user_id', $user_id)->first();
        $product = \App\Products::where('product_id', $product_id)->first();

        // die($user);
        // $order = $product['order_id'];

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return (new MailMessage)
            ->subject(Lang::getFromJson('Selangkah Lagi, Ayo Aktivasi Akun Anda!'))
            ->greeting(Lang::getFromJson('Hallo '.$user))
            ->line(Lang::getFromJson('Terima kasih sudah mendaftar. Hanya tinggal dua langkah lagi untuk bisa menikmati fitur-fitur ShareWA.'))
            ->action(Lang::getFromJson('Aktivasi Sekarang'), $verificationUrl)
            ->line(Lang::getFromJson('Adapun rincian produk yang Anda pesan adalah sebagai berikut:'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->getKey()]
        );
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
