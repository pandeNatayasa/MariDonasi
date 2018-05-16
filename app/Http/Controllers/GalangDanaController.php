<?php

namespace App\Http\Controllers;

use App\galang_dana;
use Illuminate\Http\Request;
use App\campaign_user;
use Auth;
use App\User;

class GalangDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $dateNow = date('Y-m-d');
        $dataDonasi = campaign_user::all()->where('status','=','verified')->where('deadline','>',$dateNow);
         return view('home',compact('dataDonasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metodePembayaran = $request->metodePembayaran;
        $nominal = $request->targetDonasi2;
        $wallet = Auth::user()->wallet;
        $idUser = Auth::user()->id;

        if($metodePembayaran=='wallet'){
            if($wallet > $nominal){
                $sisa_wallet = $wallet - $nominal;
                $data = User::find($idUser);
                $data->wallet=$sisa_wallet;
                $data->save();

                $data = new galang_dana();
                $data->id_user = $idUser;
                $data->id_campaign_user= $request->id_campaign;
                $data->nominal = $nominal;
                $data->bukti_transfer= '0';
                $data->status='onGoing';
                $data->save();
                return view('intermeso_donasi');
            }else{
                return view('intermeso_donasi_wallet');
            }
        }elseif ($metodePembayaran == 'transfer') {

            $data = new galang_dana();
            $data->id_user = $idUser;
            $data->id_campaign_user= $request->id_campaign;
            $data->nominal = $nominal;
            $data->bukti_transfer= '0';
            $data->status='onGoing';
            $data->save();

            return view('intermeso_donasi');
        }else{
            return $metodePembayaran;
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('payment',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function edit(galang_dana $galang_dana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('picBuktiTransfer')) {
            $filePicVerif=$request->file('picBuktiTransfer');
            $filename3 = "pic_bukti_transfer" . $id . '.' . $filePicVerif->getClientOriginalExtension();
            $filePicVerif->move('img/pic_bukti_transfer_donasi',$filename3);
        }else{
            return 'no selected image Bukti Transfer ';
        }

        $data = galang_dana::find($id);
        $data->bukti_transfer = '/img/pic_bukti_transfer_donasi/'.$filename3;
        $data->status='paidOff';
        $data->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\galang_dana  $galang_dana
     * @return \Illuminate\Http\Response
     */
    public function destroy(galang_dana $galang_dana)
    {
        //
    }
}
