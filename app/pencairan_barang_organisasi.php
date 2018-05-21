<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pencairan_barang_organisasi extends Model
{
    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
    
    public function campign_organisasi_barang(){
    	return $this->belongsTo('App\campign_organisasi_barang','id_campaign_organisasi_barang');
    }
}
