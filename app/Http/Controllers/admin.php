<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Redirect;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlahNewUser = DB::table('users')->where('status','=','non-verified')->count();
        if($jumlahNewUser != 0){
            return view('index',compact('jumlahNewUser'));
        }else {
            $jumlahNewUser = 0;
            return view('index',compact('jumlahNewUser'));
        }
    }

    public function showDaftarCampaign()
    {
        return view('daftarCampaign');
    }

    public function showDaftarAdmin()
    {
        return view('daftarAdmin');
    }

    public function showDaftarUser(){
        return view('daftarUser');
    }

    public function showDaftarNewUser(){
        $dataUser = User::all()->where('status','=','non-verified');
        return view('daftarNewUser',compact('dataUser'));
    }

    public function showDaftarNewCampaign(){
        return view('daftarNewCampaign');
    }

    public function showDaftarNewTransfer(){
        return view('daftarNewTransfer');
    }

    public function showDaftarNewPencairan(){
        return view('daftarNewPencairan');
    }

    public function showDaftarPengiriman(){
        return view('daftarPengiriman');
    }

    public function showDaftarPenerimaan(){
        return view('daftarPenerimaan');
    }

    public function showDaftarTransfer(){
        return view('daftarTransfer');
    }

    public function showDaftarPencairan(){
        return view('daftarPencairan');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $barang = tb_barang::find($id);
        // $barang->nama_barang = $request->namaBarang;
        // $barang->jumlah = $request->jumlahBarang;
        // $barang->harga = $request->harga;
        // $barang->id_satuan = $request->namaSatuan;
        // $barang->id_kategori = $request->namaKategori;
        // $barang->save();

        // return redirect('barang');

        $data = User::find($id);
        $data->status = 'verified';
        $data->save();

        $dataUser = User::all()->where('status','=','non-verified');
        // return redirect('daftarNewUser',compact('dataUser'));
        return Redirect::to('/daftar-new-user')->with(compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
