<?php

namespace App\Http\Controllers;

use App\campaign_organisasi;
use Illuminate\Http\Request;
use Auth;
use App\organisasis;
use App\campaign_user_barang;
use App\campign_organisasi_barang;
use DB;
use App\campaign_user;

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
            return view('formCampaignOrganisasi',compact('dataBarang'));
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
        
        //
        $dateNow = date('Y-m-d');
        $id_organisasi = Auth::guard('organitation')->user()->id;
        $newCampaign = new campaign_organisasi();
        $newCampaign->id_organisasi = $id_organisasi;
        $newCampaign->judul=$request->campaignName;
        $newCampaign->pic_cover_campaign = '/img/cover_campaign/'.$fileCoverPic->getClientOriginalName();
        $newCampaign->cerita_singkat=$request->deskripsiSingkat;
        $newCampaign->cerita_lengkap=$request->deskripsiLengkap;
        $newCampaign->target_donasi=$request->targetDonasi;
        $newCampaign->tgl_awal = $dateNow;
        $newCampaign->deadline=$request->deadlineCampaign;
        $newCampaign->kategori=$request->kategoriCampaign;
        $newCampaign->lokasi_penerima=$request->lokasi;
        $newCampaign->dana_sementara='0';
        $newCampaign->dana_bersih='0';
        $newCampaign->sisa_dana='0';
        $newCampaign->pic_verif = '/img/image_verif_campaign/'.$filePicVerif->getClientOriginalName();
        $newCampaign->status='non-verified';
        $newCampaign->save();

        // $id_campaign_user_max = DB::table('campaign_users')->max('id');
        
        // DB::table('campaign_user_barangs')->where("id_campaign_user",1)->update(['id_campaign_user'=>$id_campaign_user_max]);

        $id_campaign_organisasi_max = DB::table('campaign_organisasis')->max('id');

        $id_campaign_organisasi_min = DB::table('campaign_organisasis')->where('id_organisasi','=',$id_organisasi)->min('id');
        
        
        DB::table('campign_organisasi_barangs')->where("id_campaign_organisasi",$id_campaign_organisasi_min)->update(['id_campaign_organisasi'=>$id_campaign_organisasi_max]);
        
        return view('intermesoOrganisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\campaign_organisasi  $campaign_organisasi
     * @return \Illuminate\Http\Response
     */
    public function show($id_campaign)
    {
        
            $dataCampaign = campaign_organisasi::find($id_campaign);
            $jumlahDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign)->count();
            $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
            return view('detailCampaignOrganisasi',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang'));
        
        
    }

    public function showDetailOrganisasi($id_campaign)
    {
        // if($type=='user'){
        //     $dataCampaign = campaign_user::find($id_campaign);
        //     $jumlahDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign)->count();
        //     $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
        //     return view('detailCampaignUserForOrganisasi',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang'));
        // }elseif ($type=='organisasi') {
            $dataCampaign = campaign_organisasi::find($id_campaign);
            $jumlahDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign)->count();
            $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
            return view('detailCampaignUserForOrganisasi',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang'));
        // }else{
        //     return "aa";
        // }
        
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
        
    }
}
