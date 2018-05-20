<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_barang extends Model
{
    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }
    
    public function campaign_user(){
    	return $this->belongsTo('App\campaign_user','id_campaign_user');
    }
}
