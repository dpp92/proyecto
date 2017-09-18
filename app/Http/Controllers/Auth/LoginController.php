<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function username (){
        return 'dni';
    }

    /**
    *Sobreescribir funcion de redireccion
    * tipo de usuario 1=>alumno, 2=> docente, 0=>admin (Solo existe un admin)
    */
    public function redirectPath(){
        if (auth()->user()->tipo == '0') {
            # code...
            return '/home';
        }elseif( auth()->user()->tipo == '1'){
            return '/alumno/home';
        }else{
            return '/docente/home';
        }
    }

}
