<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pencairan_dana_user extends Model
{
    public function campaign_user(){
    	return $this->belongsTo('App\campaign_user','id_campaign_user');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_user');
    }

    public function rek_user(){
    	return $this->belongsTo('App\rek_user','id_rek');
    }
}
