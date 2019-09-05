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

class UserController extends Controller
{ 
	 public function __construct()
    {
        $this->middleware('auth');
    }

     public function details($id)
    {
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  //$semestre =2;
        $membre = User::find($id);
        $etudiant = Etudiant::all();
       // $roles = Role::all();
         $enseignant = Enseignant::all();
        


        return view('membre.details', compact('membre','etudiant','enseignant','sem1','sem2'));
            
            
     }

      public function edit($id)
    {
$sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
$sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  
        $membre = User::find($id);
        $etudiant = Etudiant::all();
        $enseignant = Enseignant::all();
        


        return view('membre.edite')->with([
            'membre' => $membre,
            'etudiant' => $etudiant,
            'enseignant' => $enseignant,
            'sem1'  => $sem1,
            'sem2'  => $sem2,
            
        ]);
    
    }

    public function update(Request $request , $id)
    {
      
        $membre = User::find($id);
        $e=$membre->id_Etu;
        $etudiant = Etudiant::find($e);

        $etudiant1 = Etudiant::all();
        if($request->hasFile('img')){

            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
	 	     $membre->photo = '/uploads/photo/'.$file_name;
           
        }

       
        
       if(Auth::user()->role == '0'){

        //$membre->name = $request->input('name');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->nom = $request->input('nom');
        $membre->email = $request->input('email');
        $etudiant->date_naissance = $request->input('date_naissance');
       }
          if(Auth::user()->role == '1' || Auth::user()->role == '2'){
           $membre->name = $request->input('name');
         
          $membre->email = $request->input('email');
                }
           
        $membre->save();
         if(Auth::user()->role == '0')
        $etudiant->save();
    

        return redirect('membre/'.$id.'/edite');
        
}
     
   /* public function mdp(){
    	 auth()->user()->update([
                	"mot_de_passe" => bcrypt(request('password')),

                ]);
    }*/

}
