<?php

namespace App\Http\Controllers;

use App\dompetKebaikan;
use Illuminate\Http\Request;
use Auth;
use App\campaign_user;
use App\campaign_user_barang;
use App\pencairan_dana_user;
use App\rek_user;
use DB;
use App\campaign_organisasi;
use App\pencairan_barang_user;
use Redirect;

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

    public function storePencairan(Request $request)
    {
        $idUser = Auth::user()->id;
        $dataRek = new rek_user();
        $dataRek->id_user=$idUser;
        $dataRek->no_rek=$request->no_rek;
        $dataRek->nama=$request->nama_pemilik_rek;
        $dataRek->status='verified';
        $dataRek->save();

        $id_rek_max = DB::table('rek_users')->where('id_user','=',$idUser)->max('id');
        $id_campaign=$request->id_campaign;
        $data = new pencairan_dana_user();
        $data->id_user=$idUser;
        $data->id_campaign_user=$request->id_campaign;
        $data->id_rek=$id_rek_max;
        $data->nominal = $request->jumlah_pencairan_dana;
        $data->status='onGoing';
        $data->save();

        $dataCampaign = campaign_user::find($id_campaign);
        $jumlahDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign)->count();
        $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
        $dataPencairan = pencairan_dana_user::all()->where('id_campaign_user','=',$id_campaign);
        $sisaDana = DB::table('campaign_users')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
        $id_campaign_user_barang= DB::table('campaign_user_barangs')
                    ->where('id', '=', $id_campaign)
                    ->sum('id');

        $id_pencairan_user_barang = DB::table('pencairan_barang_users')
                    ->where('id', '=', $id_campaign_user_barang)
                    ->sum('id');

        $dataPencairanBarang = DB::table('pencairan_barang_users')
                            ->join('campaign_user_barangs','pencairan_barang_users.id_campaign_user_barang','=','campaign_user_barangs.id')
                            ->where('id_campaign_user','=',$id_pencairan_user_barang)
                            ->get();

        return view('detailCampaignSaya',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
        // return $dataPencairan;
    }

    public function storePencairanBarang(Request $request)
    {
        $idUser = Auth::user()->id;
        $id_campaign=$request->id_campaign;
        $nama_barang = $request->nama_barang;

        $idUserBarang = DB::table('campaign_user_barangs')
                    ->where('nama_barang','=',$nama_barang)
                    ->sum('id');

        $data = new pencairan_barang_user();
        $data->id_user=$idUser;
        $data->id_campaign_user_barang=$idUserBarang;
        $data->alamat=$request->alamat;
        $data->jumlah = $request->jumlah_pencairan_barang;
        $data->status='onGoing';
        $data->save();

        $dataCampaign = campaign_user::find($id_campaign);
        $jumlahDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign)->count();
        $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
        $dataPencairan = pencairan_dana_user::all()->where('id_campaign_user','=',$id_campaign);
        $sisaDana = DB::table('campaign_users')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
        
        $id_campaign_user_barang= DB::table('campaign_user_barangs')
                    ->where('id', '=', $id_campaign)
                    ->sum('id');

        $id_pencairan_user_barang = DB::table('pencairan_barang_users')
                    ->where('id', '=', $id_campaign_user_barang)
                    ->sum('id');

        $dataPencairanBarang = DB::table('pencairan_barang_users')
                            ->join('campaign_user_barangs','pencairan_barang_users.id_campaign_user_barang','=','campaign_user_barangs.id')
                            ->where('id_campaign_user','=',$id_pencairan_user_barang)
                            ->get();

        // return Redirect::to('/dompet-kebaikan-user/{{$id_campaign}}')->with(compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
        return view('detailCampaignSaya', compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
    }

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
    public function show($id_campaign)
    {
        $dataCampaign = campaign_user::find($id_campaign);
        $jumlahDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign)->count();
        $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
        $dataPencairan = pencairan_dana_user::all()->where('id_campaign_user','=',$id_campaign);
        $sisaDana = DB::table('campaign_users')
                    ->where('id','=',$id_campaign)
                    ->sum('sisa_dana');
        
        $id_campaign_user_barang= DB::table('campaign_user_barangs')
                    ->where('id', '=', $id_campaign)
                    ->sum('id');

        $id_pencairan_user_barang = DB::table('pencairan_barang_users')
                    ->where('id', '=', $id_campaign_user_barang)
                    ->sum('id');

        $dataPencairanBarang = DB::table('pencairan_barang_users')
                            ->join('campaign_user_barangs','pencairan_barang_users.id_campaign_user_barang','=','campaign_user_barangs.id')
                            ->where('id_campaign_user','=',$id_pencairan_user_barang)
                            ->get();

        return view('detailCampaignSaya',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang','dataPencairan','id_campaign','sisaDana','dataPencairanBarang'));
        // return $dataPencairan;
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

        if ($request->hasFile('picBuktiTransfer')) {
            $filePicVerif=$request->file('picBuktiTransfer');
            $filename3 = "pic_bukti_transfer" . $id . '.' . $filePicVerif->getClientOriginalExtension();
            $filePicVerif->move('img/pic_bukti_transfer',$filename3);
        }else{
            return 'no selected image Bukti Transfer ';
        }

        $data = dompetKebaikan::find($id);
        $data->pic_bukti_transfer = 'img/pic_bukti_transfer/'.$filename3;
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
