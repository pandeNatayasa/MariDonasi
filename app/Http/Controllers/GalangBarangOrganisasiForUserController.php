<?php

namespace App\Http\Controllers;

use App\galang_barang_organisasi_for_user;
use Illuminate\Http\Request;
use App\campign_organisasi_barang;
use Auth;

class GalangBarangOrganisasiForUserController extends Controller
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
        $idUser = Auth::user()->id;

                $data = new galang_barang_organisasi_for_user();
                $data->id_user = $idUser;
                $data->id_campaign_organisasi= $request->id_campaign;
                $data->barang = $request->nama_barang;
                $data->jumlah= $request->tambahDonasiBarang;
                $data->status='onGoing';
                $data->save();

            return view('intermeso_donasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galang_barang_organisasi_for_user  $galang_barang_organisasi_for_user
     * @return \Illuminate\Http\Response
     */
    public function show($id_campaign)
    {
        $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
        return view('payment_barang_user_to_organisasi',compact('id_campaign','dataDonasiBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galang_barang_organisasi_for_user  $galang_barang_organisasi_for_user
     * @return \Illuminate\Http\Response
     */
    public function edit(galang_barang_organisasi_for_user $galang_barang_organisasi_for_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galang_barang_organisasi_for_user  $galang_barang_organisasi_for_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galang_barang_organisasi_for_user $galang_barang_organisasi_for_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galang_barang_organisasi_for_user  $galang_barang_organisasi_for_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(galang_barang_organisasi_for_user $galang_barang_organisasi_for_user)
    {
        //
    }
}
