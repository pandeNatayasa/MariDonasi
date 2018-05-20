<?php

namespace App\Http\Controllers;

use App\galang_barang_organisasi;
use Illuminate\Http\Request;
use App\campign_organisasi_barang;

class GalangBarangOrganisasiController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galang_barang_organisasi  $galang_barang_organisasi
     * @return \Illuminate\Http\Response
     */
    public function show($id_campaign)
    {
        $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
        return view('payment_barang_organisasi',compact('id_campaign','dataDonasiBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galang_barang_organisasi  $galang_barang_organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(galang_barang_organisasi $galang_barang_organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galang_barang_organisasi  $galang_barang_organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, galang_barang_organisasi $galang_barang_organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galang_barang_organisasi  $galang_barang_organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(galang_barang_organisasi $galang_barang_organisasi)
    {
        //
    }
}
