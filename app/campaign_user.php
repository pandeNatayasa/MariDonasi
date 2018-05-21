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
    public function campaign_user_barang(){
        return $this->hashMany('App\campaign_user_barang');
    }

    public function galang_dana(){
        return $this->hashMany('App\galang_dana');
    }

    public function galang_dana_user_forOrganisasi(){
        return $this->hashMany('App\galang_dana_user_forOrganisasi');
    }

    public function pencairan_dana_user(){
        return $this->hashMany('App\pencairan_dana_user');
    }

    public function galang_barang(){
        return $this->hashMany('App\galang_barang');
    }

    public function galang_barang_user_forOrganisasi(){
        return $this->hashMany('App\galang_barang_user_forOrganisasi');
    }
}
