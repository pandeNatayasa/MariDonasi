<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rek_organisasi extends Model
{
    public function pencairan_dana_organisasi(){
        return $this->hashMany('App\pencairan_dana_organisasi');
    }
}
