<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Semestre;
use App\Groupe_etu;
use App\Etudiant;
use App\Cour;
use App\TDTP;
use App\Exclu;
use App\Absence;
use App\Module;
use DB;
use Illuminate\Support\Facades\Redirect;
class SemestreController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
   public function index (){
   	$sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
   	//dd($sem1);
  
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    //dd($sem2);
   return view('Semestres.index',compact('sem1','sem2'));
   }
   public function new_sem(){
   	$sem = Semestre::where('active','=',1)->count();
   	if($sem>0){
   		$test = true;
   	}
   	else {
   $test = false;
   	}
   	return response()->json(['test'=>$test]);
   }
    public function store (Request $request){
      
    $sem1 = Semestre::create(['nomSem'=>'Semestre 1' ,'annee'=>$request->anne ,'active'=>1, ]);
    $sem2 = Semestre::create(['nomSem'=>'Semestre 2' ,'annee'=>$request->anne ,'active'=>1 ,]);
     return Redirect::to('Semestres/index');
    }
        public function graphe1 ($id){
      
    $mod = Module::where("semestre",$id)->select('nom','idMod')->get();
     
    $m = array();
    $m_id = array();
    $m_a = array();
    $m_p = array();
    $i=0;
    foreach ($mod as $key ) {
      $m[$i]=$key->nom;
      $i++;
    }
     $i=0;
    foreach ($mod as $key ) {
      $m_id[$i]=$key->idMod;
      $i++;
    }
    $abs = Absence::where('etat',0)->where('etat_just',2)->orWhere('etat_just',0)
                     ->join('td_tps','id_td_tp','id')
                     ->whereIn('id_module',$m_id)
                     ->select('id_module', DB::raw('count(*) as total'))
                 ->groupBy('id_module')
                 ->get();
      $pre = Absence::where('etat',1)
                     ->join('td_tps','id_td_tp','id')
                     ->whereIn('id_module',$m_id)
                     ->select('id_module', DB::raw('count(*) as total'))
                 ->groupBy('id_module')
                 ->get();
    $i=0;
  foreach ($abs as $key ) {
      $m_a[$i]=$key->total;
      $i++;
    }
        $i=0;
  foreach ($pre as $key ) {
      $m_p[$i]=$key->total;
      $i++;
    }

     return response()->json(['modules'=>$m,'abs'=> $m_a,'pre'=> $m_p,]);
    }
    public function dash ($id){
   	$semestre = Semestre::find($id);
   
   	
   $nouveaux = Groupe_etu::where('sem_groupe','=',$id)
               ->join('etudiants','groupe','idG')
               ->where('type','=','Nouveau(elle)')
               ->count();
        // dd($nouveaux);
   $rep = Groupe_etu::where('sem_groupe','=',$id)
               ->join('etudiants','groupe','idG')
               ->where('type','=','Répétitif(ve)')
               ->count();
   $endettes= Groupe_etu::where('sem_groupe','=',$id)
               ->join('etudiants','groupe','idG')
               ->where('type','=','Endetté(e)')
               ->select('id_Ens')
               ->count();
   
   $ens1 = Cour::join('groupe_etus','id_section','sec_groupe')
                 ->where('groupe_etus.sem_groupe','=',$id)
                 ->select('cours.id_Ens')
                 ->distinct('cours.id_Ens')
                 ->count('cours.id_Ens');
    $k = Cour::join('groupe_etus','id_section','sec_groupe')
                 ->where('groupe_etus.sem_groupe','=',$id)
                 ->select('cours.id_Ens')
                 ->distinct('cours.id_Ens')
                 ->get('cours.id_Ens')->toArray();
   
   $ens2 = TDTP::join('groupe_etus','id_groupe','groupe')
                 ->where('groupe_etus.sem_groupe','=',$id)
                 ->whereNotIn('td_tps.id_Ens' , $k)
                 ->select('td_tps.id_Ens')
                 ->distinct('td_tps.id_Ens')
                 ->count('td_tps.id_Ens');

   $ens =$ens1 + $ens2;
   $exclus = Exclu::join('modules','module_exc','idMod')
                 ->where('modules.semestre','=',$id)
                 ->select('exclus.Etu_exc')
                 ->count('exclus.Etu_exc');
 //dd($ens2);
   $abs = Absence::join('td_tps','id_td_tp','id')
                 ->join('groupe_etus','td_tps.id_groupe','groupe_etus.groupe')
                 ->where('groupe_etus.sem_groupe','=',$id)
                 ->where('etat','=',0)
                 ->select('absences.idAbs')
                 ->count('absences.idAbs');
  $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
   	
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
//dd($abs);
   return view('Semestres.dashboard',compact('semestre','nouveaux','rep','endettes','ens','exclus','abs','sem1','sem2'));
   }
   function archiver ($id){
    $sem = Semestre::find($id);
    $sem->active = 0;
    $sem->save();
    $mods = Module::where('semestre' , $id)->get();
        foreach ($mods as $m ) {
        $m->semestre = null;
        $m->save();
        }
    return response()->json(['success' =>'sucess']);
   }
   function historique (){
  $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
 $sem = Semestre::where('active','=',0)->get();
   return view('Semestres.historique',compact('sem1','sem2','sem'));
   }
  function histoDet ($id){
  $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  $groupe = Groupe_etu::where('sem_groupe',$id)->get();
  $g = Groupe_etu::where('sem_groupe',$id)->select('groupe')->first();
  
  $mods = TDTP::where('id_groupe',$g->groupe)
                ->select('id_module')
                ->distinct('id_module')->get();

  
  //dd($mods);
   return view('Semestres.details_historique',compact('sem1','sem2','groupe','mods'));
   }
  function GrpDet ($id){
  $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  $etus = Etudiant::where('idG',$id)->get();
   return view('Semestres.detGrp',compact('sem1','sem2','etus'));
   }
   
}
