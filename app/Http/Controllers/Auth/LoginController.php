<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
class LoginController extends AuthController
{
    //////////////
    //* Traits *//
    //////////////
    use AuthenticatesUsers;

    ///////////////////
    //* Constructor *//
    ///////////////////
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    //////////////////////
    //* Implementation *//
    //////////////////////
    /**
     * Returns the Login Username to be used by this Controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}