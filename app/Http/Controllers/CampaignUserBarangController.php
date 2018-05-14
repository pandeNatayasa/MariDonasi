<?php

namespace App\Http\Controllers;

use App\campaign_user_barang;
use Illuminate\Http\Request;
use Validator;
use Response;
use View;
use App\campaign_user;
use Auth;
use Illuminate\Support\Facades\DB;

class CampaignUserBarangController extends Controller
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

    public function loadComment(){
        $idUser = Auth::user()->id;

        $id_campaign_user_min = DB::table('campaign_users')->where('id_user','=',$idUser)->min('id');
        
        $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign_user_min);
        
        // return view('formCampaign',compact('id_campaign_user_max','dataBarang'));
        return view('layouts.tableTambahBarang', compact('dataBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $art = Auth::user()->id;
        $data = DB::table('users')
        ->where('users.id','LIKE','%'.$art.'%')
        ->select('status')
        ->get();
        // select('select status from users where users.id = ?', $artikel); {{ $collection[0]->title }}
        if($data[0]->status =="non-verified"){
            return view('formUpdateUser');
        }elseif ($data[0]->status=="verified") {

            //membuat campaign kosong untuk mendapatkan id campaign yang akan digunakan di tabel campaign barang
            // $dateNow = date('Y-m-d');
            $idUser = Auth::user()->id;
            // $newCampaign = new campaign_user();
            // $newCampaign->id_user = $idUser;
            // $newCampaign->judul='0';
            // $newCampaign->pic_cover_campaign = '0';
            // $newCampaign->cerita_singkat='0';
            // $newCampaign->cerita_lengkap='0';
            // $newCampaign->target_donasi='0';
            // $newCampaign->tgl_awal = $dateNow;
            // $newCampaign->deadline=$dateNow;
            // $newCampaign->kategori='0';
            // $newCampaign->lokasi_penerima='0';
            // $newCampaign->dana_sementara='0';
            // $newCampaign->dana_bersih='0';
            // $newCampaign->sisa_dana='0';
            // $newCampaign->pic_verif = '0';
            // $newCampaign->status='non-verified';
            // $newCampaign->save();

            // $id_campaign_user_max = $request->id_campaign_user_max;
            $id_campaign_user_min = DB::table('campaign_users')->where('id_user','=',$idUser)->min('id');
            
            // $id_campaign_user_max = DB::table('campaign_users')->max('id');
            $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign_user_min);
            
            return view('formCampaign',compact('id_campaign_user_min','dataBarang'));
        }else{
            return "not found".$data;
        }
    }

    public function storeCampaign(Request $request)
    {
        $art = Auth::user()->id;
        $data = DB::table('users')
        ->where('users.id','LIKE','%'.$art.'%')
        ->select('status')
        ->get();
        // select('select status from users where users.id = ?', $artikel); {{ $collection[0]->title }}
        if($data[0]->status =="non-verified"){
            return view('formUpdateUser');
        }elseif ($data[0]->status=="verified") {

            $id_campaign_user_max = $request->id_campaign_user_max;
            
            // $id_campaign_user_max = DB::table('campaign_users')->max('id');
            $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign_user_max);
            
            return view('formCampaign',compact('id_campaign_user_max','dataBarang'));
        }else{
            return "not found".$data;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editBarang(Request $request)
    {
        $id = $request->id_donasi_barang;
        
        $id_campaign_user_min = DB::table('campaign_users')->where('id_user','=',$idUser)->min('id');

        $data = campaign_user_barang::find($id);
        $data->id_campaign_user=$id_campaign_user_min;
        $data->nama_barang = $request->nama_barang;
        $data->target_jumlah= $request->target_jumlah;
        $data->jumlah_sementara='0';
        $data->jumlah_sisa='0';
        $data->satuan=$request->satuan;
        $data->save();
    }

    public function store(Request $request)
    {
        $idUser = Auth::user()->id;

        $id_campaign_user_min = DB::table('campaign_users')->where('id_user','=',$idUser)->min('id');

        $data = new campaign_user_barang();
        $data->id_campaign_user=$id_campaign_user_min;
        $data->nama_barang = $request->nama_barang;
        $data->target_jumlah= $request->target_jumlah;
        $data->jumlah_sementara='0';
        $data->jumlah_sisa='0';
        $data->satuan=$request->satuan;
        $data->save();

        // $idUser = Auth::user()->id;
        // $id_campaign_user_max = DB::table('campaign_users')->where('id_user','=',$idUser)->min('id');
        
        // $id_campaign_user_max = DB::table('campaign_users')->max('id');
        // $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign_user_max);
        // ;
        // return view('tableTambahBarang',compact('dataBarang'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\campaign_user_barang  $campaign_user_barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = campaign_user_barang::find($id);

        return view('formCampaign', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campaign_user_barang  $campaign_user_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign_user_barang $campaign_user_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\campaign_user_barang  $campaign_user_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validator = Validator::make(Input::all(), $this->rules);
        // if ($validator->fails()) {
        //     return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        // } else {
            $post = campaign_user_barang::find($id);
            $post->nama_barang = $request->namaBarangEdit;
            $post->target_jumlah = $request->jumlahBarangEdit;
            $post->satuan = $request->satuanEdit;
            $post->save();
            return response()->json($post);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\campaign_user_barang  $campaign_user_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign_user_barang $campaign_user_barang)
    {
        //
    }
}
