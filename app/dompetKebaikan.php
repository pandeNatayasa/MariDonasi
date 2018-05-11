<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dompetKebaikan extends Model
{
    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }
}
