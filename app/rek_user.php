<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rek_user extends Model
{
    public function pencairan_dana_user(){
        return $this->hashMany('App\pencairan_dana_user');
    }
}
