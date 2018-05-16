<?php

namespace App\Http\Controllers;

use App\campaign_user;
use App\campaign_user_barang;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Redirect;

class CampaignUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tutorial_galang_dana');
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
            
            $id_campaign_user_max = DB::table('campaign_users')->min('id')->where('id_user','=',$idUser);
            $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign_user_max);
            
            return view('formCampaign',compact('id_campaign_user_max','dataBarang'));
        }else{
            return "not found".$data;
        }
        
    }

    public function storeBarang(Request $request){
    //     $data = new campaign_user_barang();
    //     $data->id_campaign_user='1';
    //     $data->nama_barang = $request->namaBarang;
    //     $data->target_jumlah= $request->jumlahBarang;
    //     $data->jumlah_sementara='0';
    //     $data->jumlah_sisa='0';
    //     $data->satuan=$request->satuanBarang;
    //     $data->save();

    //     $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=','1');

    //     return $dataBarang;
        // $data = [
        //     'id_campaign_user' => $request->['id_campaign_user'],
        //     'nama_barang'=>$request->['nama_barang']
        //     'target_jumlah' => $request->['target_jumlah'],
        //     'jumlah_sementara'=>'0',
        //     'jumlah_sisa'=> '0', 
        //     'satuan' => $request->['satuan']
        // ];
        // $data = [
        //     'id_campaign_user' => $request->id_campaign_user,
        //     'nama_barang'=>$request->nama_barang,
        //     'target_jumlah' => $request->target_jumlah,
        //     'jumlah_sementara'=>'0',
        //     'jumlah_sisa'=> '0', 
        //     'satuan' => $request->satuan
        // ];

        // return campaign_user_barang::create($data);

        return 'aaa';

        // $data = new campaign_user_barang();
        // $data->id_campaign_user=$request->id_campaign_user;
        // $data->nama_barang = $request->nama_barang;
        // $data->target_jumlah= $request->target_jumlah;
        // $data->jumlah_sementara='0';
        // $data->jumlah_sisa='0';
        // $data->satuan=$request->satuan;
        // $data->save();

        // $dataBarang = campaign_user_barang::all()->where('id_campaign_user','=','1');

        // return $dataBarang;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('imageCover')) {
            $fileCoverPic=$request->file('imageCover');
            $fileCoverPic->move('img/cover_campaign',$fileCoverPic->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }
        if ($request->hasFile('pic_verif')) {
            $filePicVerif=$request->file('pic_verif');
            $filePicVerif->move('img/image_verif_campaign',$filePicVerif->getClientOriginalName());
        }else{
            return 'no selected image Profil Picture';
        }
        
        //
        $dateNow = date('Y-m-d');
        $idUser = Auth::user()->id;
        $newCampaign = new campaign_user();
        $newCampaign->id_user = $idUser;
        $newCampaign->judul=$request->campaignName;
        $newCampaign->pic_cover_campaign = '/img/cover_campaign/'.$fileCoverPic->getClientOriginalName();
        $newCampaign->cerita_singkat=$request->deskripsiSingkat;
        $newCampaign->cerita_lengkap=$request->deskripsiLengkap;
        $newCampaign->target_donasi=$request->targetDonasi;
        $newCampaign->tgl_awal = $dateNow;
        $newCampaign->deadline=$request->deadlineCampaign;
        $newCampaign->kategori=$request->kategoriCampaign;
        $newCampaign->lokasi_penerima=$request->lokasi;
        $newCampaign->dana_sementara='0';
        $newCampaign->dana_bersih='0';
        $newCampaign->sisa_dana='0';
        $newCampaign->pic_verif = '/img/image_verif_campaign/'.$filePicVerif->getClientOriginalName();
        $newCampaign->status='non-verified';
        $newCampaign->save();

        $id_campaign_user_max = DB::table('campaign_users')->max('id');

        // $idUser = Auth::user()->id;

        $id_campaign_user_min = DB::table('campaign_users')->where('id_user','=',$idUser)->min('id');
        
        
        DB::table('campaign_user_barangs')->where("id_campaign_user",$id_campaign_user_min)->update(['id_campaign_user'=>$id_campaign_user_max]);

        // $Barang = $request->barang;
        // $jumlahBarang = count($Barang);

        // $nama = 'nama';
        // return $Barang;
        // return $jumlahBarang;


        //for ($x = 0; $x < $jumlahBarang; $x++) {
            // $data = new campaign_user_barang();
            // $data->id_campaign_user=$id_campaign_user_max;
            // $data->nama_barang = $Barang[$x][nama];
            // $data->target_jumlah= $Barang[$x][jumlah];
            // $data->jumlah_sementara='0';
            // $data->jumlah_sisa='0';
            // $data->satuan=$Barang[$x][satuan];
            // $data->save();
            // return $jumlahBarang;

        //}
        // return $Barang;
        // return ['nama'];
        return view('intermeso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function show($id_campaign)
    {
        $dataCampaign = campaign_user::find($id_campaign);
        $jumlahDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign)->count();
        $dataDonasiBarang = campaign_user_barang::all()->where('id_campaign_user','=',$id_campaign);
        return view('detailCampaign',compact('id_campaign','dataCampaign','jumlahDonasiBarang','dataDonasiBarang'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function edit(campaign_user $campaign_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, campaign_user $campaign_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\campaign_user  $campaign_user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_campaign_user)
    {
        $data = DB::table('campaign_user_barangs')->where('id_campaign_user','=',$id_campaign_user);
        $data->delete(); 

        $dataCampaign = campaign_user::find($id_campaign_user);
        $dataCampaign->delete();

        $dataNewCampaignUser = campaign_user::all()->where('status','=','non-verified');

        return Redirect::to('/daftar-new-campaign-user')->with(compact('dataNewCampaignUser'));
    }
}
