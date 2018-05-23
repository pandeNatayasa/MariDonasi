<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campaign_user;
use App\campaign_organisasi;
use DB;

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

        $jumlahCampaignUserTerdanai = DB::table('campaign_users')
                                    ->where('status','=','verified')
                                    ->count('id');
        $jumlahCampaignOrganisasiTerdanai = DB::table('campaign_organisasis')
                                    ->where('status','=','verified')
                                    ->count('id');
        $jumlahCampaignTerdanai= $jumlahCampaignUserTerdanai + $jumlahCampaignOrganisasiTerdanai;

        $jumlahUserTerdanai = DB::table('campaign_users')
                                    ->where('status','=','verified')
                                    ->sum('dana_sementara');
        $jumlahOrganisasiTerdanai = DB::table('campaign_organisasis')
                                    ->where('status','=','verified')
                                    ->sum('dana_sementara');
        $jumlahDanaTerkumpul= $jumlahUserTerdanai + $jumlahOrganisasiTerdanai;

        $jumlahUser = DB::table('users')
                    ->count('id');
        $jumlahOrganisasi = DB::table('organisasis')
                            ->count('id');
        $jumlahPartisipan= $jumlahUser + $jumlahOrganisasi;
        return view('home',compact('dataDonasi','dataDonasiOrganisasi','jumlahCampaignTerdanai','jumlahDanaTerkumpul','jumlahPartisipan'));
    }

    public function showFAQ()
    {
        return view('FAQ');
    }

    public function showAboutUs()
    {
        return view('AboutUs');
    }

}
