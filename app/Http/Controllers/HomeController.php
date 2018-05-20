<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campaign_user;
use App\campaign_organisasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
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
        return view('home',compact('dataDonasi','dataDonasiOrganisasi'));
    }

}
