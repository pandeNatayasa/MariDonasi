<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_barang_organisasi extends Model
{
    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
    
    public function campaign_organisasi(){
    	return $this->belongsTo('App\campaign_organisasi','id_campaign_organisasi');
    }
}
