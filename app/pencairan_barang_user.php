<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pencairan_barang_user extends Model
{
    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }
    
    public function campaign_user_barang(){
    	return $this->belongsTo('App\campaign_user_barang','id_campaign_user_barang');
    }
}
