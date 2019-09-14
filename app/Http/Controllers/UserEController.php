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

class UserEController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function details($id)
    {
        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
        $membreE = User::find($id);
        $etudiant = Etudiant::all();
         $enseignant = Enseignant::all();
        

        return view('membreE.details', compact('membreE','etudiant','enseignant','sem1','sem2'));
            
            
     }

      public function edit($id)
    {

        $membreE = User::find($id);
        $etudiant = Etudiant::all();
        $enseignant = Enseignant::all();
        
        $semestre = Semestre::find($idS);

        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();

        return view('membreE.edite')->with([
            'membreE' => $membreE,
            'etudiant' => $etudiant,
            'enseignant' => $enseignant,
            'sem1' => $sem1,
            'sem2' => $sem2,
            'semestre'=> $semestre,
            
        ]);;
    
    }

    public function update(Request $request , $id)
    {

        $membreE = User::find($id);
        //$etudiant = Etudiant::all();
        if($request->hasFile('img')){

            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
	 	 $membreE->photo = '/uploads/photo/'.$file_name;
           
        }



        //$membreE->enseignant->name = $request->input('name');
        $membreE->enseignant->prenom = $request->input('prenom');
        $membreE->enseignant->nom = $request->input('nom');
        $membreE->enseignant->profil = $request->input('profil');
        $membreE->enseignant->grade = $request->input('grade');
        $membreE->email = $request->input('email');
       // $enseignant->grade = $request->input('grade');
         $etudiant->date_naissance = $request->input('date_naissance');

       

          
        $membreE->save();

        return redirect('membreE/'.$id.'/details/'.$request->input('semestre'));

    } 
  
}
