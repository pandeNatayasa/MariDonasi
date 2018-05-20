<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\organisasi;
use App\campaign_organisasi;
use DB;
use Redirect;
use App\campaign_user;
use App\galang_dana_organisasi;
use App\galang_dana_organisasi_forUser;
use App\pencairan_dana_organisasi;
use App\dompetKebaikan;
use App\dompet_kebaikan_organisasi;
use Auth;

class adminOrganisasi extends Controller
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
        $jumlahNewOrganisasi = DB::table('organisasis')->where('status','=','non-verified')->count();
        $jumlahNewCampaignOrganisasi = DB::table('campaign_organisasis')->where('status','=','non-verified')->where('judul','!=','0')->count();

        $jumlahNewTransferOrganisasi = DB::table('galang_dana_organisasis')->where('status','=','onGoing')->orWhere('status','=','paidOff')->count();
        $jumlahNewTransferUser = DB::table('galang_dana_organisasi_for_users')->where('status','=','onGoing')->orWhere('status','=','paidOff')->count();
        $jumlahNewTransfer = $jumlahNewTransferUser+$jumlahNewTransferOrganisasi;

        $jumlahNewPencairan = DB::table('pencairan_dana_organisasis')->where('status','=','onGoing')->count();

        if($jumlahNewOrganisasi == 0 ){
            $jumlahNewOrganisasi = 0;
        }
        if($jumlahNewCampaignOrganisasi == 0 ){
            $jumlahNewCampaignOrganisasi = 0;
        }

        return view('viewAdmin.dashboard_group',compact('jumlahNewOrganisasi','jumlahNewCampaignOrganisasi','jumlahNewTransfer','jumlahNewPencairan'));
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

    public function showDaftarOrganisasi(){
        $daftarOrganisasi = organisasi::all()->where('status','=','verified');
        return view('viewAdmin.daftarOrganisasi',compact('daftarOrganisasi'));
    }

    public function showDaftarCampaign()
    {
        $dataCampaignOrganisasi = campaign_organisasi::all()->where('status','=','verified')->where('judul','!=','0');
        return view('viewAdmin.daftarCampaignOrganisasi',compact('dataCampaignOrganisasi'));
    }

    public function showDaftarNewCampaign(){
        $dataNewCampaignOrganisasi = campaign_organisasi::all()->where('status','=','non-verified')->where('judul','!=','0');
        return view('viewAdmin.daftarNewCampaignOrganisasi',compact('dataNewCampaignOrganisasi'));
    }

    public function showDaftarNewTransfer(){
        $dataTransfer = galang_dana_organisasi::all()->where('status','!=','success');
        $dataTransferUser = galang_dana_organisasi_forUser::all()->where('status','!=','success');
        return view('viewAdmin.daftarNewTransferOrganisasi',compact('dataTransfer','dataTransferUser'));
    }

    public function showDaftarNewPencairan(){
        $dataNewPencairan = pencairan_dana_organisasi::all()->where('status','=','onGoing');
        return view('viewAdmin.daftarNewPencairanOrganisasi',compact('dataNewPencairan'));
    }

    public function showDaftarNewOrganisasi(){
        $dataOrganisasi = organisasi::all()->where('status','=','non-verified');
        return view('viewAdmin.daftarNewOrganisasi',compact('dataOrganisasi'));
    }

    public function showDepositUser(){
        $dataNewDepositUser = dompetKebaikan::all()->where('status','=','non_verified');
        $dataDepositUser = dompetKebaikan::all()->where('status','=','verified');
        return view('viewAdmin.depositUser',compact('dataNewDepositUser','dataDepositUser'));
        //return $dataNewDepositUser;
    }

    public function showDepositOrganisasi(){
        $dataNewDepositOrganisasi = dompet_kebaikan_organisasi::all()->where('status','=','non_verified');
        $dataDepositOrganisasi = dompet_kebaikan_organisasi::all()->where('status','=','verified');
        return view('viewAdmin.depositOrganisasi',compact('dataNewDepositOrganisasi','dataDepositOrganisasi'));
    }

    public function validasi_deposit_user($id)
    {

        $idOrganisasi= DB::table('dompet_kebaikans')
                    ->where('id','=',$id)
                    ->sum('id_user');

        $tambahan_dana = DB::table('dompet_kebaikans')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $sisa_dana_sebelumnya = DB::table('users')
                    ->where('id','=',$idUser)
                    ->sum('wallet');

        $sisa_dana_sekarang = $tambahan_dana + $sisa_dana_sebelumnya;

        $dataDana = User::find($idUser);
        $dataDana->wallet = $sisa_dana_sekarang;
        $dataDana->save();
        
        $data = dompetKebaikan::find($id);
        $data->status = 'verified';
        $data->save();

        $dataNewDepositUser = dompetKebaikan::all()->where('status','=','non_verified');
        $dataDepositUser = dompetKebaikan::all()->where('status','=','verified');
        // return view('viewAdmin.depositUser',);
        return Redirect::to('/daftar-deposit-user')->with(compact('dataNewDepositUser','dataDepositUser'));
    }

    public function validasi_deposit_organisasi($id)
    {

        $idOrganisasi= DB::table('dompet_kebaikan_organisasis')
                    ->where('id','=',$id)
                    ->sum('id_organisasi');

        $tambahan_dana = DB::table('dompet_kebaikan_organisasis')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $sisa_dana_sebelumnya = DB::table('organisasis')
                    ->where('id','=',$idOrganisasi)
                    ->sum('wallet');

        $sisa_dana_sekarang = $tambahan_dana + $sisa_dana_sebelumnya;

        $dataDana = organisasi::find($idOrganisasi);
        $dataDana->wallet = $sisa_dana_sekarang;
        $dataDana->save();
        
        $data = dompet_kebaikan_organisasi::find($id);
        $data->status = 'verified';
        $data->save();

        $dataNewDepositOrganisasi = dompet_kebaikan_organisasi::all()->where('status','=','non_verified');
        $dataDepositOrganisasi = dompet_kebaikan_organisasi::all()->where('status','=','verified');
        // return view('viewAdmin.depositUser',);
        return Redirect::to('/daftar-deposit-organisasi')->with(compact('dataNewDepositOrganisasi','dataDepositOrganisasi'));
    }

    public function validasi_campaign($id)
    {
        $data = campaign_organisasi::find($id);
        $data->status = 'verified';
        $data->save();

        $dataNewCampaignOrganisasi = campaign_organisasi::all()->where('status','=','non-verified');

        return Redirect::to('/daftar-new-campaign-organisasi')->with(compact('dataNewCampaignOrganisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dateNow = date('Y-m-d');
        // $idUser = Auth::user()->id;
        $newCampaign = new campaign_organisasi();
        $newCampaign->id_organisasi = $id;
        $newCampaign->judul='0';
        $newCampaign->pic_cover_campaign = '0';
        $newCampaign->cerita_singkat='0';
        $newCampaign->cerita_lengkap='0';
        $newCampaign->target_donasi='0';
        $newCampaign->tgl_awal = $dateNow;
        $newCampaign->deadline=$dateNow;
        $newCampaign->kategori='0';
        $newCampaign->lokasi_penerima='0';
        $newCampaign->dana_sementara='0';
        $newCampaign->dana_bersih='0';
        $newCampaign->sisa_dana='0';
        $newCampaign->pic_verif = '0';
        $newCampaign->status='non-verified';
        $newCampaign->save();

        $data = organisasi::find($id);
        $data->status = 'verified';
        $data->save();

        $dataOrganisasi = organisasi::all()->where('status','=','non-verified');
        // return redirect('daftarNewUser',compact('dataUser'));
        return Redirect::to('/daftar-new-organisasi')->with(compact('dataOrganisasi'));
    }

    public function validasi_pencairan_dana_organisasi($id)
    {
        $data = pencairan_dana_organisasi::find($id);
        $data->status = 'success';
        $data->save();

        $id_campaign_organisasi = DB::table('pencairan_dana_organisasis')
                    ->where('id', '=', $id)
                    ->sum('id_campaign_organisasi');

        $nominal = DB::table('pencairan_dana_organisasis')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $dana_campaign_sementara = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign_organisasi)
                    ->sum('sisa_dana');

        $sisa_dana_sekarang = $dana_campaign_sementara - $nominal;

        $dataDana = campaign_organisasi::find($id_campaign_organisasi);
        $dataDana->sisa_dana = $sisa_dana_sekarang;
        $dataDana->save();

        $dataNewPencairan = pencairan_dana_organisasi::all()->where('status','=','onGoing');
        return view('viewAdmin.daftarNewPencairanOrganisasi',compact('dataNewPencairan'));
    }

    public function delete_deposit_organisasi($id)
    {
        $data = dompet_kebaikan_organisasi::find($id);
        $data->delete();

        $dataNewDepositOrganisasi = dompet_kebaikan_organisasi::all()->where('status','=','non_verified');
        $dataDepositOrganisasi = dompet_kebaikan_organisasi::all()->where('status','=','verified');
        // return view('viewAdmin.depositUser',);
        return Redirect::to('/daftar-deposit-organisasi')->with(compact('dataNewDepositOrganisasi','dataDepositOrganisasi'));
    }

    public function delete_deposit_user($id)
    {
        $data = dompetKebaikan::find($id);
        $data->delete();

        $dataNewDepositOrganisasi = dompetKebaikan::all()->where('status','=','non_verified');
        $dataDepositOrganisasi = dompetKebaikan::all()->where('status','=','verified');
        // return view('viewAdmin.depositUser',);
        return Redirect::to('/daftar-deposit-user')->with(compact('dataNewDepositOrganisasi','dataDepositOrganisasi'));
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
    public function destroy($id_campaign_organisasi)
    {
        // return "aa";
        $data = DB::table('campign_organisasi_barangs')->where('id_campaign_organisasi','=',$id_campaign_organisasi)->delete();
        
        $dataCampaign = campaign_organisasi::find($id_campaign_organisasi);
        $dataCampaign->delete();

        $dataNewCampaignOrganisasi = campaign_organisasi::all()->where('status','=','non-verified');

        return Redirect::to('/daftar-new-campaign-organisasi')->with(compact('dataNewCampaignOrganisasi'));
    }
    public function destroyOrganisasi($id)
    {
        $data = organisasi::find($id);
        $data->delete();

        $dataOrganisasi = organisasi::all()->where('status','=','non-verified');
        return view('viewAdmin.daftarNewOrganisasi',compact('dataOrganisasi'));
    }
}
