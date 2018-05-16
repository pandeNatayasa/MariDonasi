<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galang_dana_user_forOrganisasi extends Model
{
    public function campaign_user(){
    	return $this->belongsTo('App\campaign_user','id_campaign_user');
    }

    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
}
