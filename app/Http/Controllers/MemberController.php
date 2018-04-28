<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profilUserOverview');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profilDonasi');
    }
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('editProfilFull');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCompleteAcount(Request $request)
    {
        if ($request->hasFile('profilPic')) {
            $fileProfilPic=$request->file('profilPic');
            $fileProfilPic->move('img/profil_pic',$fileProfilPic->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }

        if ($request->hasFile('ktpPic')) {
            $fileKtpPic=$request->file('ktpPic');
            $fileKtpPic->move('img/bio_user',$fileKtpPic->getClientOriginalName());
        }else{
            return 'no selected image KTP Picture';
        }

        if ($request->hasFile('verifPic')) {
            $fileVerifPic=$request->file('verifPic');
            $fileVerifPic->move('img/bio_user',$fileVerifPic->getClientOriginalName());
        }else{
            return 'no selected image Verif Picture';
        }
        //
        $idUser = Auth::user()->id;
        $user1 = user::find($idUser);
        $user1->no_telp=$request->noTelpUser;
        $user1->lokasi=$request->lokasiUser;
        $user1->bio=$request->bioUser;
        $user1->profil_pic='img/profil_pic/'.$fileProfilPic->getClientOriginalName();
        $user1->ktp_pic='img/ktp_pic/'.$fileKtpPic->getClientOriginalName();
        $user1->verif_pic='img/verif_pic/'.$fileVerifPic->getClientOriginalName();
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
        if ($request->hasFile('profilPic')) {
            $fileProfilPic=$request->file('profilPic');
            $fileProfilPic->move('img/profil_pic',$fileProfilPic->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }

        if ($request->hasFile('ktpPic')) {
            $fileKtpPic=$request->file('ktpPic');
            $fileKtpPic->move('img/bio_user',$fileKtpPic->getClientOriginalName());
        }else{
            return 'no selected image KTP Picture';
        }

        if ($request->hasFile('verifPic')) {
            $fileVerifPic=$request->file('verifPic');
            $fileVerifPic->move('img/bio_user',$fileVerifPic->getClientOriginalName());
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
        $user1->profil_pic='img/profil_pic/'.$fileProfilPic->getClientOriginalName();
        $user1->ktp_pic='img/ktp_pic/'.$fileKtpPic->getClientOriginalName();
        $user1->verif_pic='img/verif_pic/'.$fileVerifPic->getClientOriginalName();
        $user1->save();

        return view('profilUserOverview');
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
        return view('editProfil');
    }

    public function edit2()
    {
        return view('editProfil');
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
