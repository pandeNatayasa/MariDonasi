<?php

namespace App\Http\Controllers;

use App\dompet_kebaikan_organisasi;
use Illuminate\Http\Request;
use Auth;

class DompetKebaikanOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewProfileOrganisasi.dompetKebaikan');
    }

    public function showFormPencairan()
    {
        return view('viewProfileOrganisasi.dompetKebaikanPencairan');
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
        $idOrganisasi = Auth::guard('organitation')->user()->id;
        $data = new dompet_kebaikan_organisasi();
        $data->id_organisasi=$idOrganisasi;
        $data->nominal = $request->jumlahPenambahanDeposit;
        $data->pic_bukti_transfer= '0';
        $data->status='non_verified';
        $data->save();

        return redirect('profille-organisasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dompet_kebaikan_organisasi  $dompet_kebaikan_organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(dompet_kebaikan_organisasi $dompet_kebaikan_organisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dompet_kebaikan_organisasi  $dompet_kebaikan_organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(dompet_kebaikan_organisasi $dompet_kebaikan_organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dompet_kebaikan_organisasi  $dompet_kebaikan_organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if ($request->hasFile('picBuktiTransfer')) {
            $filePicVerif=$request->file('picBuktiTransfer');
            $filename3 = "pic_bukti_transfer" . $id . '.' . $filePicVerif->getClientOriginalExtension();
            $filePicVerif->move('img/pic_bukti_transfer',$filename3);
        }else{
            return 'no selected image Bukti Transfer ';
        }

        $data = dompet_kebaikan_organisasi::find($id);
        $data->pic_bukti_transfer = 'img/pic_bukti_transfer/'.$filename3;
        $data->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dompet_kebaikan_organisasi  $dompet_kebaikan_organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(dompet_kebaikan_organisasi $dompet_kebaikan_organisasi)
    {
        //
    }
}
