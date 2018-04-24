<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\campaign_user;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataDonasi = campaign_user::all();
        return view('home',compact('dataDonasi'));
    }

    public function indexWelcome()
    {
        $dataDonasi = campaign_user::all();
        return view('welcome',compact('dataDonasi'));
    }
}
