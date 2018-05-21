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

    public function galang_dana_user_forOrganisasi(){
        return $this->hashMany('App\galang_dana_user_forOrganisasi');
    }

    public function pencairan_dana_organisasi(){
        return $this->hashMany('App\pencairan_dana_organisasi');
    }

    public function dompet_kebaikan_organisasi(){
        return $this->hashMany('App\dompet_kebaikan_organisasi');
    }

    public function galang_barang_organisasi(){
        return $this->hashMany('App\galang_barang_organisasi');
    }

    public function galang_barang_organisasi_forUser(){
        return $this->hashMany('App\galang_barang_organisasi_forUser');
    }
}
