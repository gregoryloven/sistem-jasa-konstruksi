<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        // $userStatus = auth()->user()->status;

        // if ($userStatus == 0) {
        //     return '/contractor';
        // } elseif ($userStatus == 1) {
        //     return '/house_type_detail';
        // }

        $user = auth()->user()->type;

        if ($user == 0) {
            return '/contractor';
        } elseif ($user == 1) {
            return '/house_type_detail';
        }

        return RouteServiceProvider::HOME;
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
