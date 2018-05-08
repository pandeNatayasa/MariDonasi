<?php

namespace App\Http\Controllers;

use App\campaign_organisasi;
use Illuminate\Http\Request;
use Auth;
use App\organisasis;
use DB;

class CampaignOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tutorial_galang_dana_organisasi');
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
        // select('select status from users where users.id = ?', $artikel); {{ $collection[0]->title }}
        if($data[0]->status =="non-verified"){
            return view('formUpdateOrganisasi');
        }elseif ($data[0]->status=="verified") {
            $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=','1');
            return view('formCampaign',compact('dataBarang'));
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
     * @param  \App\campaign_organisasi  $campaign_organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(campaign_organisasi $campaign_organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campaign_organisasi  $campaign_organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign_organisasi $campaign_organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\campaign_organisasi  $campaign_organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaign_organisasi $campaign_organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\campaign_organisasi  $campaign_organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign_organisasi $campaign_organisasi)
    {
        //
    }
}
