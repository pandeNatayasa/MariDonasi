<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dompet_kebaikan_organisasi extends Model
{
    public function organisasi(){
    	return $this->belongsTo('App\organisasi','id_organisasi');
    }
}
