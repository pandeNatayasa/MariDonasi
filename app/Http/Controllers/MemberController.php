<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use App\campaign_user;
use App\dompetKebaikan;
use App\galang_dana;
use App\galang_dana_organisasi_forUser;
use App\galang_barang_user_for_organisasi;
use App\galang_barang;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth::user()->id;
        $jumlahCampaignDimulai = DB::table('campaign_users')->where('id_user','=',$idUser)->where('judul','!=','0')->count();

        if($jumlahCampaignDimulai == 0 ){
            $jumlahCampaignDimulai = 0;
        }

        $jumlahDonasiDisalurkanUser = DB::table('galang_danas')
                    ->join('campaign_users', 'galang_danas.id_campaign_user', '=', 'campaign_users.id')
                    ->join('users', 'campaign_users.id_user', '=', 'users.id')
                    ->where('users.id','=',$idUser)
                    ->sum('nominal');

        $jumlahDonasiDisalurkanOrganisasi = DB::table('galang_dana_user_for_organisasis')
                    ->join('campaign_users', 'galang_dana_user_for_organisasis.id_campaign_user', '=', 'campaign_users.id')
                    ->join('users', 'campaign_users.id_user', '=', 'users.id')
                    ->where('users.id','=',$idUser)
                    ->sum('nominal');

        $jumlahDonasiDisalurkan = $jumlahDonasiDisalurkanUser + $jumlahDonasiDisalurkanOrganisasi;

        $jumlahDonasiDanaSayaToOrganisasi =DB::table('galang_dana_organisasi_for_users')
                    ->where('id_user','=',$idUser)
                    ->count('id');
        $jumlahDonasiDanaSaya =DB::table('galang_danas')
                    ->where('id_user','=',$idUser)
                    ->count('id');
        $jumlahDonasiBarangSayaToOrganisasi =DB::table('galang_barang_organisasi_for_users')
                    ->where('id_user','=',$idUser)
                    ->count('id');
        $jumlahDonasiBarangSaya =DB::table('galang_barangs')
                    ->where('id_user','=',$idUser)
                    ->count('id');
        $jumlahDonasiSaya = $jumlahDonasiDanaSaya + $jumlahDonasiDanaSayaToOrganisasi + $jumlahDonasiBarangSaya+$jumlahDonasiBarangSayaToOrganisasi;

        $dataTambahDeposit = dompetKebaikan::all()->where('id_user','=',$idUser);

        return view('viewProfileUser.profilUserOverview',compact('jumlahCampaignDimulai','dataTambahDeposit','jumlahDonasiDisalurkan','jumlahDonasiSaya'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idUser = Auth::user()->id;
        $dataDonasi = galang_dana::all()->where('id_user','=',$idUser);
        $dataDonasiOrganisasi = galang_dana_organisasi_forUser::all()->where('id_user','=',$idUser);
        return view('viewProfileUser.profilDonasi',compact('dataDonasi','dataDonasiOrganisasi'));
    }

    public function showDonasiBarang()
    {
        $idUser = Auth::user()->id;
        $dataBarang = galang_barang::all()->where('id_user','=',$idUser);
        $dataBarangOrganisasiToUser = galang_barang_user_for_organisasi::all()->where('id_user','=',$idUser);

        return view('viewProfileUser.profilDonasiBarang',compact('dataBarang','dataBarangOrganisasiToUser'));
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('viewProfileUser.editProfilFull');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompleteAcount(Request $request)
    {
        $idUser = Auth::user()->id;
        
        if ($request->hasFile('profilPic')) {
            $fileProfilPic=$request->file('profilPic');
            $filename1 = "profillePic_" . $idUser . '.' . $fileProfilPic->getClientOriginalExtension();
            $fileProfilPic->move('img/profil_pic',$filename1);
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
        //
        $idUser = Auth::user()->id;
        $user1 = user::find($idUser);
        $user1->no_telp=$request->noTelpUser;
        $user1->lokasi=$request->lokasiUser;
        $user1->bio=$request->bioUser;
        $user1->profil_pic='img/profil_pic/'.$filename1;
        $user1->ktp_pic='img/ktp_pic/'.$filename2;
        $user1->verif_pic='img/verif_pic/'.$filename3;
        $user1->save();

        $art = Auth::user()->id;
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
    public function store(Request $request)
    {
        $idUser = Auth::user()->id;

        if ($request->hasFile('profilPic')) {
            $fileProfilPic=$request->file('profilPic');
            $filename1 = "profillePic_" . $idUser . '.' . $fileProfilPic->getClientOriginalExtension();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('viewProfileUser.editProfil');
    }

    public function edit2()
    {
        return view('viewProfileUser.akunSaya');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
