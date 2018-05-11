<?php

namespace App\Http\Controllers;

use App\dompetKebaikan;
use Illuminate\Http\Request;
use Auth;

class DompetKebaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewProfileUser.dompetKebaikan');
    }

    public function showFormPencairan()
    {
        return view('viewProfileUser.dompetKebaikanPencairan');
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
        $data = new dompetKebaikan();
        $data->id_user=$idUser;
        $data->nominal = $request->jumlahPenambahanDeposit;
        $data->pic_bukti_transfer= '0';
        $data->status='non_verified';
        $data->save();

        return redirect('member');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dompetKebaikan  $dompetKebaikan
     * @return \Illuminate\Http\Response
     */
    public function show(dompetKebaikan $dompetKebaikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dompetKebaikan  $dompetKebaikan
     * @return \Illuminate\Http\Response
     */
    public function edit(dompetKebaikan $dompetKebaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dompetKebaikan  $dompetKebaikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $filePicVerif=$request->file('pic_bukti_transfer');
        // return $filePicVerif;
        if ($request->hasFile('picBuktiTransfer')) {
            //return 'aa';
            $filePicVerif=$request->file('picBuktiTransfer');
            $filename3 = "pic_bukti_transfer" . $id . '.' . $fileVerifPic->getClientOriginalExtension();
            $filePicVerif->move('img/pic_bukti_transfer',$filename3);
        }else{
            return 'no selected image Bukti Transfer ';
        }

        $data = dompetKebaikan::find($id);
        $data->pic_bukti_trasnfer = 'img/pic_bukti_transfer/'.$filename3;
        $data->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dompetKebaikan  $dompetKebaikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(dompetKebaikan $dompetKebaikan)
    {
        //
    }
}
