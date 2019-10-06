<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Validator;
use Excel;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Enseignant;
use App\User;
use App\Semestre;
use Auth;
class EnseignantController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
 function rand(){
$rand = Str::random(8);
   return response()->json(['rand' => $rand]);
 } 
  
    function index(){
      //$ens = Enseignant::find(47);
     // dd($ens->ensUser1);
      $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
      if(Auth::user()->role == '1')
      {
        $ens = Enseignant::all();
        return view('Enseignants.index',compact('ens','sem1','sem2'));
      }
      else
      {
        return view('Erreur403');
      }
    }
  function storeEns(Request $request){
     $tab[]=null; 
    $messages = [
    'required'    => 'Ce champs est obligatoire.',
    'mimes'    => ' :attribute doit être compatible avec le format .xlsx ',
];
$attri = [
  'ens'  => 'La liste des enseignants '   ,];
   $validator = Validator::make($request->all(), [
            'ens' => 'required|mimes:xlsx'
        ],$messages,$attri);
 
        if ($validator->fails()) {
 return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }
   
    $path = $request->file('ens')->getRealPath();
    $data = Excel::load($path)->get();
    // dd($data);
     if($data->count() > 0)
     {$i1 = 0;
      foreach($data->toArray() as $key => $value)
      {
        $i=0; 
       foreach($value as $row)
       {  $tab[$i]=$row; $i++;
      
       }
       $check_data[] = array(
        'nom'   => $tab[0],
        'prenom'   => $tab[1],
        'email'   => $tab[2]
       );
       $cpi = $i1+2;
       $messages = [
        'required'    => 'Vous devez remplir tous les champs dans la ligne.'.$cpi ,
        'alpha_spaces'=> 'Le ":attribute" doit contenir que les caractéres dans la ligne'.$cpi ,
        'email'=> "L' :attribute est invalide dans la ligne ".$cpi ,
        'unique'=>"L' email' doit être unique dans le fichier excel dans la ligne ".$cpi ,];
    
       $validator = Validator::make($check_data[$i1], [ 'email' => 'required|email|unique:users','nom' => 'required|alpha_spaces','prenom' => 'required|alpha_spaces',],$messages);
     
            if ($validator->fails()) {
               return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
            }
       $pwd = Str::random(8);
      $ens = Enseignant::create(['nom'=>$tab[0], 'prenom'=>$tab[1] ,'grade'=>'Enseignant',]);
       $user_data = User::create(['email'   => $tab[2],
       'password'   => Hash::make($pwd),
       'role'  => 3,
       'id_Ens'  => $ens->idEns,]);
        
       $email =  $tab[2];
$data = array('name'=>$tab[0],'prenom'=>$tab[1] , 'email' => $email,'password' => $pwd);
Mail::send('emails.contact', $data, function($message) use ($email) {
  $message->to($email, 'A l\'enseignant ')
          ->subject('Nouveau Enseignant');
  $message->from('GAC13tlemcen@gmail.com','GAC');
});
$i1++;
      }
      

     }
     return Redirect::to('Enseignants/index');
  }
function store(Request $request){
     $messages = [
    'required'    => 'le champs ":attribute" est obligatoire.',
    'alpha_spaces'=> 'Le ":attribute" doit contenir que les caractéres',
    'min'    => 'le champs ":attribute" doit contenir au moins 4 lettres ',
    'unique'    => 'l\'email existe déjà ',
    'email'    => 'l\'email est invalide ',
];
$attr = [
  'pwd'    => 'Mot de passe ',
];
   $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_spaces|min:3',
            'prenom' => 'required|alpha_spaces|min:3',
            'email' => 'required|email|unique:users',
            'pwd' => 'required'
        ],$messages,$attr);
 
        if ($validator->fails()) {
  return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }
    $ens = Enseignant::create(['nom'=>$request->nom , 'prenom'=>$request->prenom ,'grade'=>'Enseignant',]);
    //dd($ens->idEns);
    $user = User::create(['role' => 3,'email' => $request->email,'password' => Hash::make($request->pwd),'id_Ens' => $ens->idEns,]);
$email = $request->email;
$data = array('name'=>$request->nom,'prenom'=>$request->prenom , 'email' => $request->email,'password' => $request->pwd);
Mail::send('emails.contact', $data, function($message) use ($email) {
  $message->to($email, 'A l\'enseignant ')
          ->subject('Nouveau Enseignant');
  $message->from('GAC13tlemcen@gmail.com','GAC');
});
    	
return response()->json(['user'=>$user,'ens'=>$ens ]);
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
