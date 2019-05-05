<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Excel;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Enseignant;
use App\User;
use App\Semestre;

class EnseignantController extends Controller
{
 function rand(){
$rand = Str::random(8);
   return response()->json(['rand' => $rand]);
 } 
  
    function index(){
      $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    	$ens = Enseignant::all();
    	
return view('Enseignants.index',compact('ens','sem1','sem2'));
    }
  function storeEns(Request $request){
     $tab[]=null; 

     $this->validate($request, [
      'ens'  => 'required|mimes:xls,xlsx'
     ]);
   
    $path = $request->file('ens')->getRealPath();
    $data = Excel::load($path)->get();
    // dd($data);
     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
        $i=0; 
       foreach($value as $row)
       {  $tab[$i]=$row; $i++;
      
       }
       $pwd = Str::random(8);
      $ens = Enseignant::create(['nom'=>$tab[0], 'prenom'=>$tab[1] ,]);
       $insert_data[] = array(
        'email'   => $tab[2],
        'password'   => Hash::make($pwd),
        'role'  => 1,
        'id_Ens'  => $ens->idEns
       );
       $email =  $tab[2];
$data = array('name'=>$tab[0],'prenom'=>$tab[1] , 'email' => $email,'password' => $pwd);
Mail::send('emails.contact', $data, function($message) use ($email) {
  $message->to($email, 'A l\'enseignant ')
          ->subject('Nouveau Enseignant');
  $message->from('GAC13tlemcen@gmail.com','GAC');
});
      }
      
      //return $tab;

      if(!empty($insert_data))
      {
       DB::table('users')->insert($insert_data);
      }
     }
     return Redirect::to('Enseignants/index');
  }
function store(Request $request){

    $ens = Enseignant::create(['nom'=>$request->nom , 'prenom'=>$request->prenom ,]);
    $user = User::create(['role' => 1,
            'email' => $request->email,
            'id_Ens' => $ens->idEns,
            'password' => Hash::make($request->pwd),
        ]);
$email = $request->email;
$data = array('name'=>$request->nom,'prenom'=>$request->prenom , 'email' => $request->email,'password' => $request->pwd);
Mail::send('emails.contact', $data, function($message) use ($email) {
  $message->to($email, 'A l\'enseignant ')
          ->subject('Nouveau Enseignant');
  $message->from('GAC13tlemcen@gmail.com','GAC');
});
    	
return Redirect::to('Enseignants/index');
    }



  function delete(Request $request){
        $id= $request->input('idens');
        //dd($id);
        $mat = Enseignant::find($id);
        //dd($mat);
        $mat->delete();
            return  response()->json(['success' => 'deleting ith success','id'=>$id]);

    }



}
