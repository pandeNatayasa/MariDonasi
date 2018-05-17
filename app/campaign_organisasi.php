<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_organisasi extends Model
{
    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }

    public function campign_organisasi_barang(){
        return $this->hashMany('App\campign_organisasi_barang');
    }

    public function galang_dana_organisasi(){
        return $this->hashMany('App\galang_dana_organisasi');
    }

    public function pencairan_dana_organisasi(){
        return $this->hashMany('App\pencairan_dana_organisasi');
    }
}
