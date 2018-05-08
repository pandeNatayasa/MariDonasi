<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\OrganisasiResetPasswordNotification;

class organisasi extends Authenticatable
{
    use Notifiable;
   	protected $guard = 'organitation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','no_telp',
            'lokasi',
            'bio',
            'pic',
            'wallet' ,
            'status' ,
            'pic_surat' ,
            'berlaku_hingga' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new OrganisasiResetPasswordNotification($token));
    }

    public function campaign_organisasi(){
        return $this->hashMany('App\campaign_organisasi');
    }

}
