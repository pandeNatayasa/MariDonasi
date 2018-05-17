<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pencairan_dana_organisasi extends Model
{
    public function campaign_organisasi(){
    	return $this->belongsTo('App\campaign_organisasi','id_campaign_organisasi');
    }

    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }

    public function rek_organisasi(){
    	return $this->belongsTo('App\rek_organisasi','id_rek_organisasi');
    }
}
