<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_dana_organisasi extends Model
{
    public function campaign_organisasi(){
    	return $this->belongsTo('App\campaign_organisasi','id_campaign_organisasi');
    }

    public function User(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
}
