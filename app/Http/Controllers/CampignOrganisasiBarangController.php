<?php

namespace App\Http\Controllers;

use App\campign_organisasi_barang;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\campaign_organisasi;
use App\campaign_user;
use App\campaign_user_barang;

class CampignOrganisasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function loadComment(){
        $idOrganisasi = Auth::guard('organitation')->user()->id;

        $id_campaign_organisasi_min = DB::table('campaign_organisasis')->where('id_organisasi','=',$idOrganisasi)->min('id');
        
        $dataBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign_organisasi_min);
        
        // return view('formCampaign',compact('id_campaign_user_max','dataBarang'));
        return view('layouts.tableTambahBarang', compact('dataBarang'));
    }

    public function create()
    {
        $art = Auth::guard('organitation')->user()->id;
        $data = DB::table('organisasis')
        ->where('organisasis.id','LIKE','%'.$art.'%')
        ->select('status')
        ->get();

        if($data[0]->status =="non-verified"){
            return view('formUpdateUser');
        }elseif ($data[0]->status=="verified") {

            $idUser = Auth::guard('organitation')->user()->id;
            // $id_campaign_user_max = $request->id_campaign_user_max;
            $id_campaign_user_min = DB::table('campaign_organisasis')->where('id_organisasi','=',$idUser)->min('id');
            
            // $id_campaign_user_max = DB::table('campaign_users')->max('id');
            $dataBarang = DB::table('campign_organisasi_barangs')->where('id_campaign_organisasi','=',$id_campaign_user_min)->delete();

            return view('formCampaignOrganisasi',compact('id_campaign_user_min'));
        }else{
            return "not found".$data;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $idOrganisasi = Auth::guard('organitation')->user()->id;

        $id_campaign_organisasi_min = DB::table('campaign_organisasis')->where('id_organisasi','=',$idOrganisasi)->min('id');

        $data = new campign_organisasi_barang();
        $data->id_campaign_organisasi=$id_campaign_organisasi_min;
        $data->nama_barang = $request->nama_barang;
        $data->target_jumlah= $request->target_jumlah;
        $data->jumlah_sementara='0';
        $data->jumlah_sisa='0';
        $data->satuan=$request->satuan;
        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\campign_organisasi_barang  $campign_organisasi_barang
     * @return \Illuminate\Http\Response
     */
    public function show($id_campaign)
    {
        
            $dataCampaign = campaign_user::find($id_campaign);
            $jumlahDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign)->count();
            $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
            return view('detailCampaignUserForOrganisasi',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campign_organisasi_barang  $campign_organisasi_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(campign_organisasi_barang $campign_organisasi_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\campign_organisasi_barang  $campign_organisasi_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campign_organisasi_barang $campign_organisasi_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\campign_organisasi_barang  $campign_organisasi_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(campign_organisasi_barang $campign_organisasi_barang)
    {
        //
    }
}
