<?php

namespace App\Http\Controllers\Auth;

use App\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;

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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
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
            'wallet' ,
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
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
}
