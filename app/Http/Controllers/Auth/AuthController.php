<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

abstract class AuthController extends Controller
{
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
}
