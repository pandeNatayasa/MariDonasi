<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\User;
use Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asli');
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
        // $email = $request->form_email;
        // $pass = $request->form_password;

        // if($email=='nata@gmail.com' && $pass=='12345'){
        //     return view('index');
        // }else{
        //     return view('login');
        // }

        // $data=new tb_nota();
        // $data->id_pembeli = $request->namaPembeli;
        // $data->id_kasir = $request->namaKasir;
        // $data->tanggal = $tanggal1;
        // $data->total_harga=$harga;
        // $data->save();
        // ->update(['delayed' => 1])
        // $dataNota= tb_nota::find($id);
        // $dataNota->total_harga=$request->totalharga;
        // $dataNota->save();

        $users = User::find($id);
        <?php
        if(Input::hasFile('foto')) {
                $file = $request->file('foto');
                $fotoName = 'usr' . $users->id . '.' .
                $file->getClientOriginalExtension();
                Storage::put('profile/'.$fotoName,  File::get($file));
                $img = Image::make(storage_path('app/profile/' . $fotoName));
                $img->resize(256, null, function ($constraint) {
                  $constraint->aspectRatio();
                });
                $img->save();
                $users->foto = $fotoName;
              }
        $users->save();
        //
        $idUser = Auth::user()->id;
        $user1 = user::find($idUser);
        $user1->no_telp=$request->noTelpUser;
        $user1->lokasi=$request->lokasiUser;
        $user1->bio=$request->bioUser;
        $user1->save();

        return view('formCampaign');
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
