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
        if ($request->hasFile('bioUser')) {
            $file=$request->file('bioUser');
            $file->move('img/bio_user',$file->getClientOriginalName());
        }else{
            return 'no selected image Bio User';
        }

        if ($request->hasFile('image')) {
            $fileBioUser=$request->file('image');
            $fileBioUser->move('img/profil_pic',$fileBioUser->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }

        //
        $idUser = Auth::user()->id;
        $user1 = user::find($idUser);
        $user1->no_telp=$request->noTelpUser;
        $user1->lokasi=$request->lokasiUser;
        $user1->bio='img/bio_user/'.$fileBioUser->getClientOriginalName();
        $user1->profil_pic='img/profil/'.$file->getClientOriginalName();
        $user1->save();

        $art = Auth::user()->id;
        $artikels = DB::table('users')
        ->where('users.id','LIKE','%'.$art.'%')
        ->select('status')
        ->get();
        // select('select status from users where users.id = ?', $artikel); {{ $collection[0]->title }}
        if($artikels[0]->status =="non-verified"){
            return view('formUpdateUser');
        }elseif ($artikels[0]->status=="verified") {
            return view('formCampaign');
        }else{
            return "not found".$artikels;
        }

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
    public function edit(Member $member)
    {
        //
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
