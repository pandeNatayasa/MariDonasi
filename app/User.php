<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','no_telp',
            'lokasi',
            'bio',
            'profil_pic',
            'ktp_pic',
            'verif_pic',
            'wallet' ,
            'camp_earn',
            'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function campaign_user(){
        return $this->hashMany('App\campaign_user');
    }

    public function dompetKebaikan(){
        return $this->hashMany('App\dompetKebaikan');
    }

    public function galang_dana(){
        return $this->hashMany('App\galang_dana');
    }

    public function pencairan_dana_user(){
        return $this->hashMany('App\pencairan_dana_user');
    }

    public function galang_barang(){
        return $this->hashMany('App\galang_barang');
    }

    public function galang_barang_organisasi_forUser(){
        return $this->hashMany('App\galang_barang_organisasi_forUser');
    }
}
