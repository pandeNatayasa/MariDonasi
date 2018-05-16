<?php

namespace App\Http\Controllers;

use App\campign_organisasi_barang;
use Illuminate\Http\Request;
use Auth;


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
            $dataBarang = DB::table('campaign_organisasi_barangs')->where('id_campaign_organisasis','=',$id_campaign_user_min)->delete();

            return view('formCampaign',compact('id_campaign_user_min'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\campign_organisasi_barang  $campign_organisasi_barang
     * @return \Illuminate\Http\Response
     */
    public function show(campign_organisasi_barang $campign_organisasi_barang)
    {
        //
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
