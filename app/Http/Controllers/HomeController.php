<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\support\Facades\DB;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { /*$m=User::all();
      $id=$m->id;
      $membre =User::find($id);*/
     $membre= DB::table('users');
        
         if(Auth::user()->role == '0'){
        return view('membre/details')->with([
            'membre' => $membre,
            ]);
          }

        else if(Auth::user()->role == '3'){
           return view('home');
       }
        
        
    }
     /*  protected function redirectTo()
      { 
       





       {
          return '/justifications';
       }
       else if(Auth::user()->role == '3'){
          return '/presence';
       }
     }*/
        
    
}
