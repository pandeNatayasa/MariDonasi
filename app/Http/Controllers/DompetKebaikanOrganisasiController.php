<?php

namespace App\Http\Controllers;

use App\dompet_kebaikan_organisasi;
use Illuminate\Http\Request;
use Auth;
use App\campaign_organisasi;
use DB;
use App\campign_organisasi_barang;
use App\pencairan_dana_organisasi;
use App\rek_organisasi;
use App\pencairan_barang_organisasi;

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
    public function storePencairan(Request $request)
    {
        $id_campaign=$request->id_campaign;
        $sisaDana = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
        $dana_dicairkan = $request->jumlah_pencairan_dana;

        if($sisaDana >= $dana_dicairkan){
            $idOrganisasi = Auth::guard('organitation')->user()->id;
            $dataRek = new rek_organisasi();
            $dataRek->id_organisasi=$idOrganisasi;
            $dataRek->no_rek=$request->no_rek;
            $dataRek->nama=$request->nama_pemilik_rek;
            $dataRek->status='verified';
            $dataRek->save();

            $id_rek_max = DB::table('rek_organisasis')->where('id_organisasi','=',$idOrganisasi)->max('id');
            
            $data = new pencairan_dana_organisasi();
            $data->id_organisasi=$idOrganisasi;
            $data->id_campaign_organisasi=$request->id_campaign;
            $data->id_rek_organisasi=$id_rek_max;
            $data->nominal = $request->jumlah_pencairan_dana;
            $data->status='onGoing';
            $data->save();

            $dataCampaign = campaign_organisasi::find($id_campaign);
            $jumlahDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign)->count();
            $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
            $dataPencairan = pencairan_dana_organisasi::all()->where('id_campaign_organisasi','=',$id_campaign);
            $sisaDana = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
            return view('detailCampaignOrganisasiSaya',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana'));

        }elseif ($sisaDana < $dana_dicairkan) {
            $dataCampaign = campaign_organisasi::find($id_campaign);
            $jumlahDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign)->count();
            $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
            $dataPencairan = pencairan_dana_organisasi::all()->where('id_campaign_organisasi','=',$id_campaign);
            $sisaDana = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
            return view('detailCampaignOrganisasiSaya',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana'))->with('error', 'Maaf Jumlah Sisa Dana lebih kecil dari dana yang ingin dicairkan');
        }
        return "aa";


        
    }

    public function storePencairanBarang(Request $request)
    {
        $idUser = Auth::guard('organitation')->user()->id;
        $id_campaign=$request->id_campaign;
        $nama_barang = $request->nama_barang;

        $idUserBarang = DB::table('campign_organisasi_barangs')
                    ->where('nama_barang','=',$nama_barang)
                    ->sum('id');

        $data = new pencairan_barang_organisasi();
        $data->id_organisasi=$idUser;
        $data->id_campaign_organisasi_barang=$idUserBarang;
        $data->alamat=$request->alamat;
        $data->jumlah = $request->jumlah_pencairan_barang;
        $data->status='onGoing';
        $data->save();

        $dataCampaign = campaign_organisasi::find($id_campaign);
        $jumlahDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign)->count();
        $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
        $dataPencairan = pencairan_dana_organisasi::all()->where('id_campaign_organisasi','=',$id_campaign);
        $sisaDana = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
        
        $id_campaign_user_barang= DB::table('campign_organisasi_barangs')
                    ->where('id', '=', $id_campaign)
                    ->sum('id');

        $id_pencairan_user_barang = DB::table('pencairan_barang_organisasis')
                    ->where('id', '=', $id_campaign_user_barang)
                    ->sum('id');

        $dataPencairanBarang = DB::table('pencairan_barang_organisasis')
                            ->join('campign_organisasi_barangs','pencairan_barang_organisasis.id_campaign_organisasi_barang','=','campign_organisasi_barangs.id')
                            ->where('id_campaign_organisasi','=',$id_pencairan_user_barang)
                            ->get();

        // return Redirect::to('/dompet-kebaikan-user/{{$id_campaign}}')->with(compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
        return view('detailCampaignOrganisasiSaya', compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
    }

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
    public function show($id_campaign)
    {
        $dataCampaign = campaign_organisasi::find($id_campaign);
        $jumlahDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign)->count();
        $dataDonasiBarang = campign_organisasi_barang::all()->where('id_campaign_organisasi','=',$id_campaign);
        $dataPencairan = pencairan_dana_organisasi::all()->where('id_campaign_organisasi','=',$id_campaign);
        $sisaDana = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');

        $id_campaign_user_barang= DB::table('campaign_user_barangs')
                    ->where('id', '=', $id_campaign)
                    ->sum('id');

        $id_pencairan_user_barang = DB::table('pencairan_barang_users')
                    ->where('id', '=', $id_campaign_user_barang)
                    ->sum('id');

        $dataPencairanBarang = DB::table('pencairan_barang_organisasis')
                            ->join('campign_organisasi_barangs','pencairan_barang_organisasis.id_campaign_organisasi_barang','=','campign_organisasi_barangs.id')
                            ->where('id_campaign_organisasi','=',$id_pencairan_user_barang)
                            ->get();

        return view('detailCampaignOrganisasiSaya',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
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
