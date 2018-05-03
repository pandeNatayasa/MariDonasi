<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Redirect;
use App\campaign_user;

class admin extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menghitung jumlah campaign, user, transfer, dan pencairan terbaru
        $jumlahNewUser = DB::table('users')->where('status','=','non-verified')->count();
        $jumlahNewCampaignUser = DB::table('campaign_users')->where('status','=','non-verified')->count();


        if($jumlahNewUser == 0 ){
            $jumlahNewUser = 0;
        }
        if($jumlahNewCampaignUser == 0 ){
            $jumlahNewCampaignUser = 0;
        }

        return view('index',compact('jumlahNewUser','jumlahNewCampaignUser'));
    }

    public function showDaftarCampaign()
    {
        $dataCampaignUser = campaign_user::all()->where('status','=','verified');
        return view('daftarCampaign',compact('dataCampaignUser'));
    }

    public function showDaftarAdmin()
    {
        return view('daftarAdmin');
    }

    public function showDaftarUser(){
        $daftarUser = User::all()->where('status','=','verified');
        return view('daftarUser',compact('daftarUser'));
    }

    public function showDaftarNewUser(){
        $dataUser = User::all()->where('status','=','non-verified');
        return view('daftarNewUser',compact('dataUser'));
    }

    public function showDaftarNewCampaign(){
        $dataNewCampaignUser = campaign_user::all()->where('status','=','non-verified');
        return view('daftarNewCampaign',compact('dataNewCampaignUser'));
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

    public function validasi_campaign($id)
    {
        $data = campaign_user::find($id);
        $data->status = 'verified';
        $data->save();

        $dataNewCampaignUser = campaign_user::all()->where('status','=','non-verified');

        return Redirect::to('/daftar-new-campaign')->with(compact('dataNewCampaignUser'));
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
