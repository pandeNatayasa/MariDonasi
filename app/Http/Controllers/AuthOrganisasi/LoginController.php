<?php

namespace App\Http\Controllers\AuthOrganisasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest:organitation')->except('logout');
    }

    /**
    *Show the aplication's Login Form
    * @return \Iluminate\Http\Response
    */
    public function showLoginForm()
    {
        return view('authOrganisasi.login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    // protected function guard() {
    //     return Auth::guard('admin');
    // }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate( $request ,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password'=> $request->password
        ];

        //Attempt to log the user
        if(Auth::guard('organitation')->attempt($credential,$request->member)){
            //if login success
            return redirect()->intended(route('organisasi.home'));
        }
        //iff unsuccessfull login
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout() {
        Auth::guard('organitation')->logout();
        return redirect('/');
    }

}
