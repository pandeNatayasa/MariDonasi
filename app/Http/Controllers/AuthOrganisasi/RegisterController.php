<?php

namespace App\Http\Controllers\AuthOrganisasi;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\organisasi;
use App\campaign_user;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/organisasi';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:organitation');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'no_telp',
            'lokasi',
            'bio',
            'profil_pic',
            'ktp_pic',
            'verif_pic',
            'wallet' ,
            'camp_earn',
            'status',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
        return view('authOrganisasi.register');
    }

    protected function store(Request $request)
    {
        $date = date("Y-m-d");

        $pass = $request->password;
        $data = new organisasi();
        $data->name = $request->name;
        $data->email= $request->email;
        $data->password= bcrypt($pass);
        $data->no_telp='0';
        $data->lokasi='0';
        $data->bio='0';
        $data->pic='0';
        $data->wallet='0';
        $data->status='non-verified';
        $data->pic_surat='0';
        $data->berlaku_hingga=$date;
        $data->remember_token='0';
        $data->save();

        $dateNow = date('Y-m-d');
        $dataDonasi = campaign_user::all()->where('status','=','verified')->where('deadline','>',$dateNow);
        return view('homeOrganisasi',compact('dataDonasi'));
    }
}
