<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semestre;
use Auth;
class CompteEtudiant extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
     function index(){
 $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
     	if(Auth::user()->role == '1'){
            
   return view('admin.comptes_etudiants',compact('sem1','sem2'));}
else{
  return view('erreur_500',compact('sem1','sem2'));
}
     }
}
