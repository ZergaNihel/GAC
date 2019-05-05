<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\DB;
use App\User;
use Auth;
use App\Etudiant;
use App\Enseignant;

class UserEController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

     public function details($id)
    {
        $membreE = User::find($id);
        $etudiant = Etudiant::all();
       // $roles = Role::all();
         $enseignant = Enseignant::all();
        


        return view('membreE.details', compact('membreE','etudiant','enseignant'));
            
            
     }

      public function edit($id)
    {

        $membreE = User::find($id);
        $etudiant = Etudiant::all();
        $enseignant = Enseignant::all();
        


        return view('membreE.edite')->with([
            'membreE' => $membreE,
            'etudiant' => $etudiant,
            'enseignant' => $enseignant
            
        ]);;
    
    }

    public function update(Request $request , $id)
    {
       /* request()->validate([
        'password' => ['required', 'confirmed', 'min:6'],
        'password_confirmation' => ['required'],
    ]);*/
        $membreE = User::find($id);
       /* $membre=DB::table('users')
            ->where('users.id','=',$id)
            ->join('etudiants', 'users.id_Etu', '=', 'etudiants.idEtu')
            
            ->select('users.*','etudiants.*')
            ->get();*/
           // dd($membre);

        $etudiant = Etudiant::all();
        if($request->hasFile('img')){

            $file = $request->file('img');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/photo'),$file_name);
	 	     $membreE->photo = '/uploads/photo/'.$file_name;
           
        }

       // $enseignant = Enseignant::all();
        
            
           /* foreach ($membre as $n)
            	$nim=$n-nom*/
        
       

        $membreE->name = $request->input('name');
        $etudiant->prenom = $request->input('prenom');

        $etudiant->nom = $request->input('nom');
        $membreE->email = $request->input('email');
       // $enseignant->grade = $request->input('grade');
         $etudiant->date_naissance = $request->input('date_naissance');

                
                //$membre->password =Hash::make($request->input('password'));
               
               
               /*  if((Auth::id() == $membre->id))
                { //dd($membre);
                $membre->password =Hash::make($request->input('password'));
                }*/
                
       

          
        $membreE->save();

        return redirect('membreE/'.$id.'/edite');

    } 
   /* public function mdp(){
    	 auth()->user()->update([
                	"mot_de_passe" => bcrypt(request('password')),

                ]);
    }*/
}
