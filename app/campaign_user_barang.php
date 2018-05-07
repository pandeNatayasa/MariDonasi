<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_user_barang extends Model
{
    public function campaign_user(){
    	return $this->belongsTo('App\campaign_user','id_campaign_user');
    }
}
