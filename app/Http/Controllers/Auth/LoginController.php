<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/justifications';
    //nihel
    protected function redirectTo()
      { if(Auth::user()->role == '1'){
        return '/admin/parametre';
    }
       if(Auth::user()->role == '0'){
          return '/absences_Etudiant';
       }
       else if(Auth::user()->role == '3'){
          return '/semestre/choix';
       }
       else if(Auth::user()->role == '2'){
        return '/anonymat/paquets';
     }

     }
//fin nihel

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
