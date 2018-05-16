<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campign_organisasi_barang extends Model
{
    public function campaign_organisasi(){
    	return $this->belongsTo('App\campaign_organisasi','id_campaign_organisasi');
    }
}
