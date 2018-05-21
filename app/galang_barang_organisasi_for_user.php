<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_barang_organisasi_for_user extends Model
{
    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }
    
    public function campaign_organisasi(){
    	return $this->belongsTo('App\campaign_organisasi','id_campaign_organisasi');
    }
}
