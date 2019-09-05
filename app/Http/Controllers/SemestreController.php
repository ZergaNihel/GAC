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
         if(Auth::user()->role == '1')
        {
          return view('Semestres.index',compact('sem1','sem2'));
        }
        else
        {
            return view('Erreur403');
        }
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
      
    $mod = Module::where("semestre",$id)->select('nom','idMod')->count();
     
    $m = array();
    $m_id = array();
    $m_a = array();
    $m_p = array();
    $m_m = array();
    $i=0;
   
    //return $m_id;
    $abs = Absence::where('etat',0)->where('etat_just',2)->orWhere('etat_just',0)
                     ->join('td_tps','id_td_tp','id')
                     ->join('modules','id_module','idMod')
                     ->where('semestre',$id)
                     ->select('modules.nom', DB::raw('count(*) as total'))
                     ->groupBy('modules.nom')
                     ->get();

                // return $abs;
  $pre = Absence::where('etat',1)
                     ->join('td_tps','id_td_tp','id')
                     ->join('modules','id_module','idMod')
                     ->where('semestre',$id)
                     ->select('modules.nom', DB::raw('count(*) as total'))
                     ->groupBy('modules.nom')
                     ->get();
                     // return $pre->count();
    $i=0;
  foreach ($abs as $key ) {
      $m_a[$i]=$key->total;
      
      $i++;
    }
        $i=0;
       // return $pre;
  foreach ($pre as $key ) {
      $m_p[$i]=$key->total;
      $m_m[$i]=$key->nom;
      $i++;
    }
    if($pre->count()>$abs->count()){
            $i=0;
  foreach ($pre as $key ) {
      $m_m[$i]=$key->nom;
      $i++;
    }}else{
    $i=0;
  foreach ($abs as $key ) {
      $m_m[$i]=$key->nom;
      $i++;
    }
    }
   // $mod_reste = Module::where('semestre',$id)->where('idMod',)
    //if()

     return response()->json(['modules'=>$m_m,'abs'=> $m_a,'pre'=> $m_p,]);
    }
    public function dash ($id){
   $semestre = Semestre::find($id);
   $total = Groupe_etu::where('sem_groupe','=',$id)
               ->join('groupes','groupe','idG')
               ->join('etudiants','groupes.idG','etudiants.idG')
               ->count();


   $nouveaux = Groupe_etu::where('sem_groupe','=',$id)
               ->join('groupes','groupe','idG')
               ->join('etudiants','groupes.idG','etudiants.idG')
               ->where('type','=','Nouveau(elle)')
               ->count();
   $nouveaux_prc = number_format(($nouveaux * 100)/$total, 2, '.', '');
             // dd($nouveaux_prc);
        // dd($nouveaux);
   $rep = Groupe_etu::where('sem_groupe','=',$id)
               ->join('etudiants','groupe','idG')
               ->where('type','=','Répétitif(ve)')
               ->count();
  $rep_prc = number_format(($rep*100)/$total, 2, '.', '');
   $endettes= Groupe_etu::where('sem_groupe','=',$id)
               ->join('etudiants','groupe','idG')
               ->where('type','=','Endetté(e)')
               ->select('id_Ens')
               ->count();
   $endettes_prc =  number_format(($endettes*100)/$total, 2, '.', '');
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
    $exclus_prc =  number_format(($exclus*100)/$total, 2, '.', '');
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
   if(Auth::user()->role == '1')
        {
          return view('Semestres.dashboard',compact('semestre','nouveaux','rep','endettes','exclus','abs','sem1','sem2','nouveaux_prc','rep_prc','endettes_prc','exclus_prc'));
        }
        else
        {
            return view('Erreur403');
        } 
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
   if(Auth::user()->role == '1')
    {
      return view('Semestres.historique',compact('sem1','sem2','sem'));
    }
    else
    {
        return view('Erreur403');
    }
   }
  function histoDet ($id){
  $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  $groupe = Groupe_etu::where('sem_groupe',$id)->get();
  $g = Groupe_etu::where('sem_groupe',$id)->select('groupe')->first();
  
  $mods = TDTP::where('id_groupe',$g->groupe)
                ->select('id_module')
                ->distinct('id_module')
                ->get('id_module')->toArray();
$modules = Module::whereIn('idMod',$mods)->get();
$semestre = Semestre::find($id);
    $sec = Groupe_etu::where('sem_groupe','=',$semestre->idSem)
                           ->join('sections','sec_groupe','idSec')
                           ->select('idSec','nomSec')
                           ->distinct('idSec')
                           ->get();
  
  //dd($mods);
   if(Auth::user()->role == '1')
    {
      return view('Semestres.details_historique',compact('sem1','sem2','groupe','mods','modules','id','semestre','sec'));
    }
    else
    {
        return view('Erreur403');
    }
   }
  function GrpDet ($id){
  $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
  $etus = Etudiant::where('idG',$id)->get();
   if(Auth::user()->role == '1')
    {
      return view('Semestres.detGrp',compact('sem1','sem2','etus'));
    }
    else
    {
        return view('Erreur403');
    }
   }
   
}
