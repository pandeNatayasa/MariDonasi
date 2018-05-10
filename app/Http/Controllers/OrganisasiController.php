<?php

namespace App\Http\Controllers;

use App\organisasi;
use Illuminate\Http\Request;
use Auth;
use App\organisasis;
use DB;
use App\campaign_organisasi;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idOrganisasi = Auth::guard('organitation')->user()->id;
        $jumlahCampaignDimulai = DB::table('campaign_organisasis')->where('id_organisasi','=',$idOrganisasi)->count();

        if($jumlahCampaignDimulai == 0 ){
            $jumlahCampaignDimulai = 0;
        }
        return view('viewProfileOrganisasi.profilOrganisasiOverview',compact('jumlahCampaignDimulai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewProfileOrganisasi.profilDonasi');
    }

    public function showCampaignOrganisasi()
    {
        $dataCampaignSaya = campaign_organisasi::all();
        return view('viewProfileOrganisasi.profilCampaignSaya',compact('dataCampaignSaya'));
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

        if ($request->hasFile('profilPic')) {
            $fileProfilPic=$request->file('profilPic');
            $filename1 = "profillePic_" . $idOrganisasi . '.' . $fileProfilPic->getClientOriginalExtension();
            $fileProfilPic->move('img/profil_pic', $filename1);
        }else{
            return 'no selected image Profil Picture';
        }

        if ($request->hasFile('ktpPic')) {
            $fileKtpPic=$request->file('ktpPic');
            $filename2 = "ktpPic_" . $idUser . '.' . $fileKtpPic->getClientOriginalExtension();
            $fileKtpPic->move('img/ktp_pic',$filename2);
        }else{
            return 'no selected image KTP Picture';
        }

        if ($request->hasFile('verifPic')) {
            $fileVerifPic=$request->file('verifPic');
            $filename3 = "verifPic_" . $idUser . '.' . $fileVerifPic->getClientOriginalExtension();
            $fileVerifPic->move('img/verif_pic',$filename3);
        }else{
            return 'no selected image Verif Picture';
        }
        //$user1->name = $request->nama;
        //$user1->email = $request->email;
        
        $idUser = Auth::user()->id;
        $user1 = user::find($idUser);
        
        $user1->no_telp=$request->noTelpUser;
        $user1->lokasi=$request->lokasiUser;
        $user1->bio=$request->bioUser;
        $user1->profil_pic='img/profil_pic/'.$filename1;
        $user1->ktp_pic='img/ktp_pic/'.$filename2;
        $user1->verif_pic='img/verif_pic/'.$filename3;
        $user1->save();

        $idUser = Auth::user()->id;
        $jumlahCampaignDimulai = DB::table('campaign_users')->where('id_user','=',$idUser)->count();

        if($jumlahCampaignDimulai == 0 ){
            $jumlahCampaignDimulai = 0;
        }
        return view('viewProfileUser.profilUserOverview',compact('jumlahCampaignDimulai'));
    }
    public function storeCompleteAcount(Request $request)
    {
        $idOrganisasi = Auth::guard('organitation')->user()->id;
        
        if ($request->hasFile('profilPic')) {
            $fileProfilPic=$request->file('profilPic');
            $filename1 = "profillePic_" . $idOrganisasi . '.' . $fileProfilPic->getClientOriginalExtension();
            $fileProfilPic->move('img/pic',$filename1);
        }else{
            return 'no selected image Profil Picture';
        }

        // if ($request->hasFile('ktpPic')) {
        //     $fileKtpPic=$request->file('ktpPic');
        //     $filename2 = "ktpPic_" . $idUser . '.' . $fileKtpPic->getClientOriginalExtension();
        //     $fileKtpPic->move('img/ktp_pic',$filename2);
        // }else{
        //     return 'no selected image KTP Picture';
        // }

        if ($request->hasFile('verifPic')) {
            $fileVerifPic=$request->file('verifPic');
            $filename3 = "verifPic_" . $idOrganisasi . '.' . $fileVerifPic->getClientOriginalExtension();
            $fileVerifPic->move('img/pic_surat',$filename3);
        }else{
            return 'no selected image Verif Picture';
        }
        //
        $idOrganisasi = Auth::guard('organitation')->user()->id;
        $user1 = organisasi::find($idOrganisasi);
        $user1->no_telp=$request->noTelpUser;
        $user1->lokasi=$request->lokasiUser;
        $user1->bio=$request->bioUser;
        $user1->pic='img/pic/'.$filename1;
        $user1->pic_surat='img/pic_surat/'.$filename3;
        $user1->berlaku_hingga=$request->berlakuHingga;
        $user1->save();

        $art = Auth::guard('organitation')->user()->id;
        $artikels = DB::table('users')
        ->where('users.id','LIKE','%'.$art.'%')
        ->select('status')
        ->get();
        // select('select status from users where users.id = ?', $artikel); {{ $collection[0]->title }}
        if($artikels[0]->status =="non-verified"){
            return view('intermeso');
        }elseif ($artikels[0]->status=="verified") {
            return view('formCampaign');
        }else{
            return "not found".$artikels;
        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(organisasi $organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(organisasi $organisasi)
    {
        //
    }

    public function edit2()
    {
        return view('viewProfileOrganisasi.akunSaya');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, organisasi $organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(organisasi $organisasi)
    {
        //
    }
}
