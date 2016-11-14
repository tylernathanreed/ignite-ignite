<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;

/*
|--------------------------------------------------------------------------
| Reset Password Controller
|--------------------------------------------------------------------------
|
| This controller is responsible for handling password reset requests
| and uses a simple trait to include this behavior. You're free to
| explore this trait and override any methods you wish to tweak.
|
*/
class ResetPasswordController extends AuthController
{
    //////////////
    //* Traits *//
    //////////////
    use ResetsPasswords;

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
        $this->middleware('guest');
    }
}