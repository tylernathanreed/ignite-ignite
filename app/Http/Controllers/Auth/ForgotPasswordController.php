<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/*
|--------------------------------------------------------------------------
| Forgot Password Controller
|--------------------------------------------------------------------------
|
| This controller is responsible for handling password reset emails and
| includes a trait which assists in sending these notifications from
| your application to your users. Feel free to explore this trait.
|
*/
class ForgotPasswordController extends AuthController
{
    //////////////
    //* Traits *//
    //////////////
    use SendsPasswordResetEmails;

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