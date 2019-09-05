<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;
use App\Semestre;
use App\Absence;
use App\Module;
use App\User;
use App\Exclu;
use App\Etudiant;
use App\Enseignant;
use DB;
use Auth;
use Response;
use Notification;
use Validator;
use App\Notifications\JustificationAlertNotifications;
class EtudiantController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    function notes(){
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
        if(Auth::user()->role == '0'){
            
   return view('Etudiant.notes',compact('sem1','sem2'));}
else{
  return view('erreur_500',compact('sem1','sem2'));
}

}

    function index(){
        $s1 = 0;
        $s2 = 0;
//dd(Exclu::where('Etu_exc',Auth::user()->id_Etu)->where('module_exc',$m->idMod)->count());
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    foreach ($sem1 as $key) {
    	$s1 = $key->idSem;
    }
    foreach ($sem2 as $key) {
    	$s2 = $key->idSem;
    }
    
    

    if(Auth::user()->role == '0'){
    	
    	$mod = Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)
    	                ->join('td_tps','Absences.id_td_tp','td_tps.id')
    	                ->join('modules','td_tps.id_module','modules.idMod')
    	                ->where('modules.semestre','=',$s1)
    	                ->select('modules.nom' , 'modules.code','modules.idMod')
    	                ->distinct('id_module')
    	                ->get();
                        //dd($mod);

    	$mod2 = Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)
    	                ->join('td_tps','Absences.id_td_tp','td_tps.id')
    	                ->join('modules','td_tps.id_module','modules.idMod')
    	                ->where('modules.semestre','=',$s2)
    	                ->select('modules.nom' , 'modules.code','modules.idMod')
    	                ->distinct('id_module')
    	                ->get();

return view('Etudiant.justification',compact('mod','sem1','sem2','mod2'));}
else{
  return view('erreur_500',compact('sem1','sem2'));
}
 
    }
    function add_justif(Request $request){
        $attributes = [
    'select_file' => 'justification',
    'idAbs' => 'dates',
];
                $messages = [
    'required'    => 'Le champs :attribute est obligatoire.',
    'mimes'    => 'la justification doit être compatible avec le format pdf ',
];

   $validator = Validator::make($request->all(), [
            'select_file' => 'required|mimes:pdf',
            'idAbs' => 'required',
        ],$messages,$attributes);
 
        if ($validator->fails()) {
           return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }
        //dd($request->idMod);
    $abs = Absence::find($request->idAbs);
    	 if($request->hasFile('select_file')){

            $file = $request->file('select_file');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/justifications'),$file_name);
	 	    $logo = '/uploads/justifications/'.$file_name;
    }
        $abs->justification = $logo;
        $abs->etat_just = 2;
        $abs->save();
        $e=Etudiant::find($abs->id_Etu);
$details = [
        'nomE' => $e->nom,
        'prenomE' => $e->prenom,
        'groupe' => $e->groupe->nomG,
        ];
$ens = $abs->tdtp->id_Ens;
//dd($ens);
$user = User::where('id_Ens',$ens)->get();
    
     Notification::send($user, new JustificationAlertNotifications($details));
   
        $abs1 = Absence::where('idAbs','=',$request->idAbs)
                        ->join('td_tps','absences.id_td_tp','td_tps.id')
                        ->join('seances','td_tps.id_seance','seances.idSea')
                        ->select('absences.*','seances.*')
                        ->get();
$num =  Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)
                      ->whereNull('justification')
                      ->join('td_tps','absences.id_td_tp','td_tps.id')
                      ->where('td_tps.id_module','=',$abs->tdtp->id_module)
                      ->select('idAbs','date')
                      ->count(); 
       if($request->ajax()){
       return response()->json(["abs"=>$abs1,"num"=>$num]);
       }else{
        return redirect('/absences_Etudiant/details/'.$request->idMod); }
    }

 function dates($id){
   $dates =  Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)
                      ->whereNull('justification')
                      ->join('td_tps','absences.id_td_tp','td_tps.id')
                      ->where('td_tps.id_module','=',$id)
                      ->select('idAbs','date')
                      ->get();
        return response()->json(["dates"=>$dates]);
                  }
function Deletejust(Request $request){
    $abs = Absence::find($request->trashJus);
    $abs->justification = null;
    $abs->save();
return response()->json(["abs"=>$abs]);
}
    function details($id){

    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
   
    if(Auth::user()->role == '0'){	
        $mod = Module::find($id);
    $absences = Absence::where('id_Etu','=',Auth::user()->id_Etu)->where('etat','=',0)
                        ->whereNotNull('justification')
    	                ->join('td_tps','Absences.id_td_tp','td_tps.id')
                        ->join('seances','td_tps.id_seance','seances.idSea')
    	                ->where('td_tps.id_module','=',$id)
    	                ->select('absences.*','td_tps.*','seances.*')
                        ->orderBy('absences.updated_at','desc')
    	                ->get();
    
$var = 1;
    return view('Etudiant.details',compact('mod','absences','sem1','sem2','var'));}
else{
  return view('erreur_500',compact('sem1','sem2'));
}

    }
    function modifier(Request $request){
         $attributes = ['select_file1' => 'justification',];
         $messages = [
    'required'    => 'Le champs :attribute est obligatoire.',
    'mimes'    => 'la justification doit être compatible avec le format pdf ',];

   $validator = Validator::make($request->all(), [
            'select_file1' => 'required|mimes:pdf',],$messages,$attributes);
 
        if ($validator->fails()) {
           return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }
    	$abs = Absence::find($request->idAbs);
        $logo = "0";
    	 if($request->hasFile('select_file1')){

            $file = $request->file('select_file1');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/justifications'),$file_name);
	 	     $logo = '/uploads/justifications/'.$file_name;
    }
        $abs->justification = $logo;
        $abs->etat_just = 2;
        $abs->save();
        return response()->json(["success"=>"success","img"=>$logo,"id"=>$request->idAbs,]);

    }
    function readAllNotif(){
Auth::user()->unreadNotifications->where('type','App\Notifications\nouvelEtudiant')->markAsRead();
Auth::user()->unreadNotifications->where('type','App\Notifications\ExclusNotifications')->markAsRead();
Auth::user()->unreadNotifications->where('type','App\Notifications\RefuseNotifications')->markAsRead();
Auth::user()->unreadNotifications->where('type','App\Notifications\AcceptNotifications')->markAsRead();


return response()->json(["success"=>"success"]);   
    }
    function readNotif($id){
Auth::user()->unreadNotifications->where('type','App\Notifications\ValideNotes')->where('id', $id)->markAsRead();
return response()->json(["success"=>"success"]);   
    }

function info ($id , $id_notif){

Auth::user()->unreadNotifications->where('type','App\Notifications\nouvelEtudiant')->where('id', $id_notif)->markAsRead();
 $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  //$semestre =2;
        $membre = User::find($id);
        $etudiant = Etudiant::all();
       // $roles = Role::all();
         $enseignant = Enseignant::all();
        


return view('membre.admin_etu', compact('membre','etudiant','enseignant','sem1','sem2'));
}
}
