<?php

namespace App\Http\Controllers;

use App\campaign_user;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CampaignUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tutorial_galang_dana');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $art = Auth::user()->id;
        $data = DB::table('users')
        ->where('users.id','LIKE','%'.$art.'%')
        ->select('status')
        ->get();
        // select('select status from users where users.id = ?', $artikel); {{ $collection[0]->title }}
        if($data[0]->status =="non-verified"){
            return view('formUpdateUser');
        }elseif ($data[0]->status=="verified") {
            return view('formCampaign');
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
        if ($request->hasFile('imageCover')) {
            $fileCoverPic=$request->file('imageCover');
            $fileCoverPic->move('img/cover_campaign',$fileCoverPic->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }
        if ($request->hasFile('pic_verif')) {
            $filePicVerif=$request->file('pic_verif');
            $filePicVerif->move('img/image_verif_campaign',$filePicVerif->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }
        $dateNow = date('Y-m-d');
        //
        $idUser = Auth::user()->id;
        $newCampaign = new campaign_user();
        $newCampaign->id_user = $idUser;
        $newCampaign->judul=$request->campaignName;
        $newCampaign->pic_cover_campaign = 'img/cover_campaign/'.$fileCoverPic->getClientOriginalName();
        $newCampaign->cerita_singkat=$request->deskripsiSingkat;
        $newCampaign->cerita_lengkap=$request->deskripsiLengkap;
        $newCampaign->target_donasi=$request->targetDonasi;
        $newCampaign->tgl_awal = $dateNow;
        $newCampaign->deadline=$request->deadlineCampaign;
        $newCampaign->kategori=$request->kategoriCampaign;
        $newCampaign->lokasi_penerima=$request->lokasi;
        $newCampaign->dana_sementara='0';
        $newCampaign->dana_bersih='0';
        $newCampaign->pic_verif = 'img/image_verif_campaign/'.$fileCoverPic->getClientOriginalName();
        $newCampaign->status='non-verified';
        $newCampaign->save();
        
        // $dataDonasi = campaign_user::all();
        // return view('home',compact('dataDonasi'));
        return view('intermeso');
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
