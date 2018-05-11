<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_dana extends Model
{
    public function campaign_user(){
    	return $this->belongsTo('App\campaign_user','id_campaign_user');
    }

    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }
}
