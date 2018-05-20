<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campaign_user;
use App\campaign_organisasi;

class HomeControllerOrganisasi extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:organitation');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateNow = date('Y-m-d');
        $dataDonasi = campaign_user::all()->where('status','=','verified')->where('deadline','>',$dateNow);

        $dataDonasiOrganisasi = campaign_organisasi::all()->where('status','=','verified')->where('deadline','>',$dateNow);
        
        return view('homeOrganisasi',compact('dataDonasi','dataDonasiOrganisasi'));
    }

}
