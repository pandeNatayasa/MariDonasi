<?php

namespace App\Http\Controllers;

use App\campaign_user_barang;
use Illuminate\Http\Request;
use Validator;
use Response;
use View;

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
        $data = new campaign_user_barang();
        $data->id_campaign_user='1';
        $data->nama_barang = $request->namaBarang;
        $data->target_jumlah= $request->jumlahBarang;
        $data->jumlah_sementara='0';
        $data->jumlah_sisa='0';
        $data->satuan=$request->satuanBarang;
        $data->save();

        $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=','1');

        return view('formCampaign',compact('dataBarang'));
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
