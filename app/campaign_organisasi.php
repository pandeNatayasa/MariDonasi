<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_organisasi extends Model
{
    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
}
