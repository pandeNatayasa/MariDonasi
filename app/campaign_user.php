<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class campaign_user extends Model
{
    public function User(){
    	return $this->belongsTo('App\User','id_user');
    }
    // public function tb_kategori(){
    // 	return $this->belongsTo('App\tb_kategori','id_kategori');
    // }

    // public function tb_nota_barang(){
    // 	return $this->hashMany('App\tb_detail_nota');
    // }
}
