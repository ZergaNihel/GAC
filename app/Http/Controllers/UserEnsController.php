<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use App\User;
use Auth;
use App\Etudiant;
use App\Enseignant;
use App\Semestre;

class UserEnsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function details($id,$idS)
    {
        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
        $membreE = User::find($id);
        $etudiant = Etudiant::all();
         $enseignant = Enseignant::all();
        
         $semestre = Semestre::find($idS);
         $idSem= $idS;

        if(Auth::user()->role == '3')
        {
            return view('membreEns.details', compact('membreE','etudiant','enseignant','sem1','sem2','semestre','idSem'));
        }
        else
        {
            return view('Erreur403');
        }
            
            
     }

    public function update(Request $request , $id)
    {

        $membreE = User::find($id);
        $etudiant = Etudiant::all();
        if($request->hasFile('img')){

            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
	 	 $membreE->photo = '/uploads/photo/'.$file_name;
           
        }



        $membreE->name = $request->input('name');
        $etudiant->prenom = $request->input('prenom');

        $etudiant->nom = $request->input('nom');
        $membreE->email = $request->input('email');
       // $enseignant->grade = $request->input('grade');
         $etudiant->date_naissance = $request->input('date_naissance');

       

          
        $membreE->save();

        return redirect('membreE/'.$id.'/details/'.$request->input('semestre'));

    } 
  
}
