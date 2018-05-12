<?php

namespace App\Http\Controllers;

use App\campaign_user;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class campaignSaya extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::user()->id;
        $dataCampaignSaya = campaign_user::all()->where('id_user','=',$idUser);
        return view('viewProfileUser.profilCampaignSaya',compact('dataCampaignSaya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function show(campaign_user $campaign_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign_user $campaign_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaign_user $campaign_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign_user $campaign_user)
    {
        //
    }
}
