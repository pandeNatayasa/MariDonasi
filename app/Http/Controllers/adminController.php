<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\organisasi;
use App\campaign_organisasi;
use DB;
use Redirect;
use App\campaign_user;
use App\admin;
use Auth;
use App\galang_dana;
use App\galang_dana_user_forOrganisasi;
use App\pencairan_dana_user;
use App\galang_dana_organisasi_forUser;
use App\galang_dana_organisasi;
use App\pencairan_dana_organisasi;
use App\galang_barang;
use App\galang_barang_organisasi;
use App\galang_barang_user_for_organisasi;
use App\galang_barang_organisasi_for_user;

class adminController extends Controller
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
        $jumlahNewCampaignUser = DB::table('campaign_users')->where('status','=','non-verified')->where('judul','!=','0')->count();
        $jumlahNewTransferUser = DB::table('galang_danas')->where('status','=','onGoing')->orWhere('status','=','paidOff')->count();
        $jumlahNewTransferOrganisasi = DB::table('galang_dana_user_for_organisasis')->where('status','=','onGoing')->orWhere('status','=','paidOff')->count();
        $jumlahNewTransfer = $jumlahNewTransferUser+$jumlahNewTransferOrganisasi;
                //$jumlahNewTransfer = galang_dana::all()->where('status','=','onGoing')->whereOr('status','=','paidOff')->count();//
        $jumlahNewPencairan = DB::table('pencairan_dana_users')->where('status','=','onGoing')->count();

        if($jumlahNewUser == 0 ){
            $jumlahNewUser = 0;
        }
        if($jumlahNewCampaignUser == 0 ){
            $jumlahNewCampaignUser = 0;
        }

        return view('viewAdmin.index',compact('jumlahNewUser','jumlahNewCampaignUser','jumlahNewTransfer','jumlahNewPencairan'));
    }

    public function showDaftarCampaign()
    {
        $dataCampaignUser = campaign_user::all()->where('status','=','verified');
        return view('viewAdmin.daftarCampaign',compact('dataCampaignUser'));
    }

    public function showDaftarAdmin()
    {
        $daftarAdmin = admin::all();
        return view('viewAdmin.daftarAdmin',compact('daftarAdmin'));
    }

    public function showDaftarUser(){
        $daftarUser = User::all()->where('status','=','verified');
        return view('viewAdmin.daftarUser',compact('daftarUser'));
    }

    public function showDaftarNewUser(){
        $dataUser = User::all()->where('status','=','non-verified');
        return view('viewAdmin.daftarNewUser',compact('dataUser'));
    }

    public function showDaftarNewCampaign(){
        $dataNewCampaignUser = campaign_user::all()->where('status','=','non-verified')->where('judul','!=','0');
        return view('viewAdmin.daftarNewCampaign',compact('dataNewCampaignUser'));
    }

    public function showDaftarNewTransfer(){
        $dataTransfer = galang_dana::all()->where('status','!=','success');
        $dataTransferOrganisasi = galang_dana_user_forOrganisasi::all()->where('status','!=','success');
        return view('viewAdmin.daftarNewTransfer',compact('dataTransfer','dataTransferOrganisasi'));
    }

    public function showDaftarNewPencairan(){
        $dataNewPencairan = pencairan_dana_user::all()->where('status','=','onGoing');
        return view('viewAdmin.daftarNewPencairan',compact('dataNewPencairan'));
    }

    public function showDaftarPengiriman(){

        return view('viewAdmin.daftarPengiriman');
    }

    public function showDaftarPenerimaan(){
        $dataNewBarang = galang_barang::all()->where('status','!=','success');
        $dataNewBarangOrganisasiToUser = galang_barang_user_for_organisasi::all()->where('status','!=','success');
        $dataNewBarangOrganisasi = galang_barang_organisasi::all()->where('status','!=','success');
        $dataNewBarangUserToOrganisasi = galang_barang_organisasi_for_user::all()->where('status','!=','success');

        $dataBarang = galang_barang::all()->where('status','=','success');
        $dataBarangOrganisasiToUser = galang_barang_user_for_organisasi::all()->where('status','=','success');
        $dataBarangOrganisasi = galang_barang_organisasi::all()->where('status','=','success');
        $dataBarangUserToOrganisasi = galang_barang_organisasi_for_user::all()->where('status','=','success');
        return view('viewAdmin.daftarPenerimaan',compact('dataNewBarang','dataNewBarangOrganisasi','dataNewBarangUserToOrganisasi','dataNewBarangOrganisasiToUser','dataBarang','dataBarangOrganisasi','dataBarangUserToOrganisasi','dataBarangOrganisasiToUser'));
    }

    public function showDaftarTransfer(){
        $dataTransfer = galang_dana::all()->where('status','=','success');
        $dataTransferOrganisasiToUser = galang_dana_user_forOrganisasi::all()->where('status','=','success');
        $dataTransferOrganisasi = galang_dana_organisasi::all()->where('status','=','success');
        $dataTransferUserToOrganisasi = galang_dana_organisasi_forUser::all()->where('status','=','success');
        return view('viewAdmin.daftarTransfer',compact('dataTransfer','dataTransferOrganisasi','dataTransferUserToOrganisasi','dataTransferOrganisasiToUser'));
    }

    public function showDaftarPencairan(){
        $dataPencairan = pencairan_dana_user::all()->where('status','=','success');
        // $dataPencairanOrganisasiToUser = galang_dana_user_forOrganisasi::all()->where('status','=','success');
        $dataPencairanOrganisasi = pencairan_dana_organisasi::all()->where('status','=','success');
        // $dataPencairanUserToOrganisasi = galang_dana_organisasi_forUser::all()->where('status','=','success');
        return view('viewAdmin.daftarPencairan',compact('dataPencairan','dataPencairanOrganisasi'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewAdmin.registerAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date("Y-m-d");

        $pass = $request->password;
        $data = new admin();
        $data->name = $request->name;
        $data->email= $request->email;
        $data->password= bcrypt($pass);
        $data->no_telp='0';
        $data->lokasi='0';
        $data->bio='0';
        $data->profil_pic='0';
        $data->wallet='0';
        $data->remember_token='0';
        $data->save();

        $daftarAdmin = admin::all();
        return view('viewAdmin.daftarAdmin',compact('daftarAdmin'));
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
        $dateNow = date('Y-m-d');
        // $idUser = Auth::user()->id;
        $newCampaign = new campaign_user();
        $newCampaign->id_user = $id;
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

        return Redirect::to('/daftar-new-campaign-user')->with(compact('dataNewCampaignUser'));
    }

    public function validasi_transfer($id)
    {
        
        $id_campaign_user = DB::table('galang_danas')
                    ->where('id', '=', $id)
                    ->sum('id_campaign_user');

        $nominal = DB::table('galang_danas')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $dana_campaign_sementara = DB::table('campaign_users')
                    ->where('id','=',$id_campaign_user)
                    ->sum('dana_sementara');

        $dana_sementara_sekarang = $dana_campaign_sementara + $nominal;

        $dana_admin = 0.05 * $nominal;
        $sisa_dana = $nominal-$dana_admin;

        $idAdmin=Auth::guard('admin')->user()->id;

        $sisa_dana_admin = DB::table('admins')
                    ->where('id','=',$idAdmin)
                    ->sum('wallet');
        $dana_admin_sekarang = $sisa_dana_admin + $dana_admin;

        $dataDana = admin::find($idAdmin);
        $dataDana->wallet = $dana_admin_sekarang;
        $dataDana->save();

        $sisa_dana_sebelumnya = DB::table('campaign_users')
                    ->where('id','=',$id_campaign_user)
                    ->sum('sisa_dana');
        $sisa_dana_sekarang = $sisa_dana + $sisa_dana_sebelumnya;

        $dataDana = campaign_user::find($id_campaign_user);
        $dataDana->dana_sementara = $dana_sementara_sekarang;
        $dataDana->sisa_dana = $sisa_dana_sekarang;
        $dataDana->save();
        
        $data = galang_dana::find($id);
        $data->status = 'success';
        $data->save();

        $dataTransfer = galang_dana::all()->where('status','!=','success');

        return Redirect::to('/daftar-new-transfer-user')->with(compact('dataTransfer'));
    }

    public function validasi_transfer_organisasi_to_user($id)
    {
        $id_campaign_user = DB::table('galang_dana_user_for_organisasis')
                    ->where('id', '=', $id)
                    ->sum('id_campaign_user');

        $nominal = DB::table('galang_dana_user_for_organisasis')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $dana_campaign_sementara = DB::table('campaign_users')
                    ->where('id','=',$id_campaign_user)
                    ->sum('dana_sementara');

        $dana_sementara_sekarang = $dana_campaign_sementara + $nominal;

        $dana_admin = 0.05 * $nominal;
        $sisa_dana = $nominal-$dana_admin;

        $idAdmin=Auth::guard('admin')->user()->id;

        $sisa_dana_admin = DB::table('admins')
                    ->where('id','=',$idAdmin)
                    ->sum('wallet');
        $dana_admin_sekarang = $sisa_dana_admin + $dana_admin;

        $dataDana = admin::find($idAdmin);
        $dataDana->wallet = $dana_admin_sekarang;
        $dataDana->save();

        $sisa_dana_sebelumnya = DB::table('campaign_users')
                    ->where('id','=',$id_campaign_user)
                    ->sum('sisa_dana');

        $sisa_dana_sekarang = $sisa_dana + $sisa_dana_sebelumnya;

        $dataDana = campaign_user::find($id_campaign_user);
        $dataDana->dana_sementara = $dana_sementara_sekarang;
        $dataDana->sisa_dana = $sisa_dana_sekarang;
        $dataDana->save();

        $data = galang_dana_user_forOrganisasi::find($id);
        $data->status = 'success';
        $data->save();

        $dataTransfer = galang_dana::all()->where('status','!=','success');
        $dataTransferOrganisasi = galang_dana_user_forOrganisasi::all()->where('status','!=','success');

        return Redirect::to('/daftar-new-transfer-user')->with(compact('dataTransfer','dataTransferOrganisasi'));
    }


    public function validasi_transfer_organisasi($id)
    {

        $id_campaign_organisasi = DB::table('galang_dana_organisasis')
                    ->where('id', '=', $id)
                    ->sum('id_campaign_organisasi');

        $nominal = DB::table('galang_dana_organisasis')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $dana_campaign_sementara = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign_organisasi)
                    ->sum('dana_sementara');

        $dana_sementara_sekarang = $dana_campaign_sementara + $nominal;

        $dana_admin = 0.05 * $nominal;
        $sisa_dana = $nominal-$dana_admin;

        $idAdmin=Auth::guard('admin')->user()->id;

        $sisa_dana_admin = DB::table('admins')
                    ->where('id','=',$idAdmin)
                    ->sum('wallet');
        $dana_admin_sekarang = $sisa_dana_admin + $dana_admin;

        $dataDana = admin::find($idAdmin);
        $dataDana->wallet = $dana_admin_sekarang;
        $dataDana->save();

        $sisa_dana_sebelumnya = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign_organisasi)
                    ->sum('sisa_dana');
        $sisa_dana_sekarang = $sisa_dana + $sisa_dana_sebelumnya;

        $dataDana = campaign_organisasi::find($id_campaign_organisasi);
        $dataDana->dana_sementara = $dana_sementara_sekarang;
        $dataDana->sisa_dana = $sisa_dana_sekarang;
        $dataDana->save();

        $data = galang_dana_organisasi::find($id);
        $data->status = 'success';
        $data->save();

        $dataTransfer = galang_dana_organisasi::all()->where('status','!=','success');
        $dataTransferUser = galang_dana_organisasi_forUser::all()->where('status','!=','success');

        return Redirect::to('/daftar-new-transfer-organisasi')->with(compact('dataTransfer','dataTransferUser'));
    }

    public function validasi_transfer_user_for_organisasi($id)
    {
        $id_campaign_organisasi = DB::table('galang_dana_organisasi_for_users')
                    ->where('id', '=', $id)
                    ->sum('id_campaign_organisasi');

        $nominal = DB::table('galang_dana_organisasi_for_users')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $dana_campaign_sementara = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign_organisasi)
                    ->sum('dana_sementara');

        // return $dana_campaign_sementara;

        $dana_sementara_sekarang = $dana_campaign_sementara + $nominal;

        $dana_admin = 0.05 * $nominal;
        $sisa_dana = $nominal-$dana_admin;

        $idAdmin=Auth::guard('admin')->user()->id;

        $sisa_dana_admin = DB::table('admins')
                    ->where('id','=',$idAdmin)
                    ->sum('wallet');
        $dana_admin_sekarang = $sisa_dana_admin + $dana_admin;

        $dataDana = admin::find($idAdmin);
        $dataDana->wallet = $dana_admin_sekarang;
        $dataDana->save();

        $sisa_dana_sebelumnya = DB::table('campaign_organisasis')
                    ->where('id','=',$id_campaign_organisasi)
                    ->sum('sisa_dana');
        $sisa_dana_sekarang = $sisa_dana + $sisa_dana_sebelumnya;

        $dataDana = campaign_organisasi::find($id_campaign_organisasi);
        $dataDana->dana_sementara = $dana_sementara_sekarang;
        $dataDana->sisa_dana = $sisa_dana_sekarang;
        $dataDana->save();

        $data = galang_dana_organisasi_forUser::find($id);
        $data->status = 'success';
        $data->save();

        $dataTransfer = galang_dana_organisasi::all()->where('status','!=','success');
        $dataTransferUser = galang_dana_organisasi_forUser::all()->where('status','!=','success');

        return Redirect::to('/daftar-new-transfer-organisasi')->with(compact('dataTransfer','dataTransferUser'));
    }


    public function validasi_pencairan_dana_user($id)
    {
        $data = pencairan_dana_user::find($id);
        $data->status = 'success';
        $data->save();

        $id_campaign_user = DB::table('pencairan_dana_users')
                    ->where('id', '=', $id)
                    ->sum('id_campaign_user');

        $nominal = DB::table('pencairan_dana_users')
                    ->where('id','=',$id)
                    ->sum('nominal');

        $dana_campaign_sementara = DB::table('campaign_users')
                    ->where('id','=',$id_campaign_user)
                    ->sum('sisa_dana');

        $sisa_dana_sekarang = $dana_campaign_sementara - $nominal;

        $dataDana = campaign_user::find($id_campaign_user);
        $dataDana->sisa_dana = $sisa_dana_sekarang;
        $dataDana->save();

        $dataNewPencairan = pencairan_dana_user::all()->where('status','=','onGoing');
        return view('viewAdmin.daftarNewPencairan',compact('dataNewPencairan'));
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
    public function destroyUser($id)
    {
        $dataCampaign = User::find($id);
        $dataCampaign->delete();

        $dataUser = User::all()->where('status','=','non-verified');

        return Redirect::to('/daftar-new-user')->with(compact('dataUser'));
    }

    public function destroy($id)
    {
        // $data = DB::table('campign_organisasi_barangs')->where('id_campaign_organisasi','=',$id_campaign_organisasi)->delete();
        
        
    }
}
