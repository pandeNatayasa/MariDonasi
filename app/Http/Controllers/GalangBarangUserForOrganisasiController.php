<?php

namespace App\Http\Controllers;

use App\galang_barang_user_for_organisasi;
use Illuminate\Http\Request;
use App\campaign_user_barang;
use Auth;

class GalangBarangUserForOrganisasiController extends Controller
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
        $idUser = Auth::guard('organitation')->user()->id;

                $data = new galang_barang_user_for_organisasi();
                $data->id_organisasi = $idUser;
                $data->id_campaign_user= $request->id_campaign;
                $data->barang = $request->nama_barang;
                $data->jumlah= $request->tambahDonasiBarang;
                $data->status='onGoing';
                $data->save();

            return view('intermeso_donasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galang_barang_user_for_organisasi  $galang_barang_user_for_organisasi
     * @return \Illuminate\Http\Response
     */
    public function show($id_campaign)
    {
        $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
        return view('payment_barang_organisasi_to_user',compact('id_campaign','dataDonasiBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galang_barang_user_for_organisasi  $galang_barang_user_for_organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(galang_barang_user_for_organisasi $galang_barang_user_for_organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galang_barang_user_for_organisasi  $galang_barang_user_for_organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galang_barang_user_for_organisasi $galang_barang_user_for_organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galang_barang_user_for_organisasi  $galang_barang_user_for_organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(galang_barang_user_for_organisasi $galang_barang_user_for_organisasi)
    {
        //
    }
}
