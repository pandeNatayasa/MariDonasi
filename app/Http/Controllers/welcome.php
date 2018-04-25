<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campaign_user;

class welcome extends Controller
{
    public function index()
    {
        $dataDonasi = campaign_user::all();
        return view('welcome',compact('dataDonasi'));
    }
}
