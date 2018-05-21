<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_barang_user_for_organisasi extends Model
{
    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
    
    public function campaign_user(){
    	return $this->belongsTo('App\campaign_user','id_campaign_user');
    }
}
