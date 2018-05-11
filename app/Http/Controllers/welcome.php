<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campaign_user;

class welcome extends Controller
{
    public function index()
    {
    		$dateNow = date('Y-m-d');
        $dataDonasi = campaign_user::all()->where('status','=','verified')->where('deadline','>',$dateNow);
        return view('welcome',compact('dataDonasi'));
    }
}
