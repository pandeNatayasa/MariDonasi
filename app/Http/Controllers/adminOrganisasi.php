<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\organisasi;
use App\campaign_organisasi;
use DB;
use Redirect;
use App\campaign_user;

class adminOrganisasi extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Menghitung jumlah campaign, user, transfer, dan pencairan terbaru
        $jumlahNewOrganisasi = DB::table('organisasis')->where('status','=','non-verified')->count();
        $jumlahNewCampaignOrganisasi = DB::table('campaign_organisasis')->where('status','=','non-verified')->count();

        if($jumlahNewOrganisasi == 0 ){
            $jumlahNewOrganisasi = 0;
        }
        if($jumlahNewCampaignOrganisasi == 0 ){
            $jumlahNewCampaignOrganisasi = 0;
        }

        return view('viewAdmin.dashboard_group',compact('jumlahNewOrganisasi','jumlahNewCampaignOrganisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showDaftarOrganisasi(){
        $daftarOrganisasi = organisasi::all()->where('status','=','verified');
        return view('viewAdmin.daftarOrganisasi',compact('daftarOrganisasi'));
    }

    public function showDaftarCampaign()
    {
        $dataCampaignOrganisasi = campaign_organisasi::all()->where('status','=','verified');
        return view('viewAdmin.daftarCampaignOrganisasi',compact('dataCampaignOrganisasi'));
    }

    public function showDaftarNewCampaign(){
        $dataNewCampaignOrganisasi = campaign_organisasi::all()->where('status','=','non-verified');
        return view('viewAdmin.daftarNewCampaignOrganisasi',compact('dataNewCampaignOrganisasi'));
    }

    public function showDaftarNewTransfer(){
        return view('viewAdmin.daftarNewTransferOrganisasi');
    }

    public function showDaftarNewPencairan(){
        return view('viewAdmin.daftarNewPencairan');
    }

    public function showDaftarNewOrganisasi(){
        $dataOrganisasi = organisasi::all()->where('status','=','non-verified');
        return view('viewAdmin.daftarNewOrganisasi',compact('dataOrganisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
