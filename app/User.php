<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Rinvex\Subscriptions\Traits\HasSubscriptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Notifications\CustomVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasSubscriptions;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    
    protected $fillable = [
        'name', 'email', 'password', 'product_id', 'email_verified_at','status','level','masa_aktif'
    ];

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function subscribers()
    {
        return $this->hasMany('App\Subscribers');
    }

    public function product()
    {
        return $this->belongsTo('App\Products','product_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function isPremiumUser() {
        if(!empty($this->subscription('bulanan')) && $this->subscription('bulanan')->active()) {
            return true;
        }
    
        if(!empty($this->subscription('tahunan')) && $this->subscription('tahunan')->active()) {
            return true;
        }
    
        return false;
    }
    
    public function stopSubscription($immediate) {

        if(!empty($this->subscription('bulanan'))){
            $this->subscription('bulanan')->cancel($immediate);
        }
    
        if(!empty($this->subscription('tahunan'))){
            $this->subscription('tahunan')->cancel($immediate);
        }
    }

    public function sendEmailVerificationNotification()
    {
        if(Auth::user()['id'] != null){
            $this->notify(new \App\Notifications\CustomVerifyEmail);
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function setSuccess(User $user)
    {
        // set Status User Menjadi Valid
        $this->attributes['status'] = 'valid';
        self::save();
        
        // create data ModelHasRole
        $modelHasRole = DB::table('model_has_roles')
                        ->insert([
                            'role_id'    => 2,
                            'model_type' => '\App\User',
                            'model_id'   => $user->id
                        ]);
    }
}
