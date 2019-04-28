<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enseignant;
use App\Section;
use App\Seance;
use App\Groupe;
use App\Module;
use App\Cour;
use App\TDTP;
use App\Semestre;
use App\Groupe_etu;
class EmploiTemps extends Controller
{
function addSeance(Request $request)
{
    
}

    function generale ($id){
        $mods = Module::where('semestre','=',$id)->get();
            $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    $semestre = Semestre::find($id);
    $sec = Groupe_etu::where('sem_groupe','=',$semestre->idSem)
                           ->join('sections','sec_groupe','idSec')
                           ->select('idSec','nomSec')
                           ->distinct('idSec')
                           ->get();
                                $pro = Enseignant::all();
                                $seancesTP=Seance::where('type','tp')->get();
        return view('admin.emp_générale',compact('mods','semestre','sem1','sem2','pro','sec','seancesTP'));
    }
  function afficher ($id){
    $cour = Seance::where('type','=','Cour')->get();
    $td = Seance::where('type','=','td')->get();
    $tp = Seance::where('type','=','tp')->get();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    $semestre = Semestre::find($id);
    	$sec = Groupe_etu::where('sem_groupe','=',$semestre->idSem)
                           ->join('sections','sec_groupe','idSec')
                           ->select('idSec','nomSec')
                           ->distinct('idSec')
                           ->get();
                          // dd($sec);
    	$pro = Enseignant::all();
    	$nbr = Groupe_etu::where('sem_groupe','=',$id)
                           ->select('sec_groupe')
                           ->distinct('sec_groupe')
                           ->count('sec_groupe');
                           //dd($nbr);
    	$seances = Seance::where('type','Cour')->get();
    	$seancesTD= Seance::where('type','td')->get();
    	$seancesTP=Seance::where('type','tp')->get();

    	$groupes  = Groupe_etu::where('sem_groupe','=',$semestre->idSem)
                           ->join('groupes','groupe','idG')
                           ->select('idG','nomG')
                           ->distinct('idG')
                           ->get();
                           //dd($groupes);
    	$mods = Module::where('semestre','=',$id)->get();
    	//$mod = Module::where('idMod',1)->limit(1)->get();
    	return view('admin.emploi_du_temp',compact('semestre','sem1','sem2','pro','sec','nbr','seances','groupes','mods','seancesTD','seancesTP','cour','td','tp'));
    }

    function afficheress (){
         $semestres = Semestre::where('active','=',1)->get();
         
         foreach ($semestres as $key ) {
        $semestre = $key->idSem;
    }
    //dd($semestre);
        $modules = Module::where('semestre','=',$semestre)->get();

    	


    	return view('ess',compact('modules'));
    }
     function empMod (Request $request){
     	$m = $request->input('moduleCh');
$module= Module::where('idMod',$m)->limit(1)->get();
 $tab = TDTP::where('id_module',$m )->count();
 $tab1 = Cour::where('id_module',$m)->count();
$pop = DB::table('td_tps')
            ->join('enseignants', 'td_tps.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'td_tps.id_module', '=', 'modules.idMod')
            ->join('groupes', 'td_tps.id_groupe', '=', 'groupes.idG')
            ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
            ->where('td_tps.id_module','=', $m)
            ->select('seances.*','enseignants.*','groupes.nomG','groupes.idG')
            ->get(); 
            $pop1 = DB::table('cours')
            ->join('enseignants', 'cours.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'cours.id_module', '=', 'modules.idMod')
            ->join('sections', 'cours.id_section', '=', 'sections.idSec')
            ->join('seances', 'cours.id_seance', '=', 'seances.idSea')
            ->where('cours.id_module','=', $m)
            ->select('seances.*','enseignants.*','sections.*')
            ->get(); 


return response()->json(['module' => $module,'mo4' => $tab+$tab1 ,'pop' => $pop ,'pop1' => $pop1]);
     }


   public function storeCOUR(Request $request){
    $seances = $request->input('idsea');
   	foreach ($seances as $key) {
    	$cour = new Cour();
    	$cour->id_module= $request->idmodule;
    	$cour->id_Ens = $request->idens;
    	$cour->id_section =$request->idsec;
    	$cour->id_seance = $key;
    	$cour->save();
    	 }
    	
    	return response()->json(['success'=>'Cour is successfully added']);
    }
    public function storeTD(Request $request){
    	 $seance = $request->input('idseaTD');
    	 foreach ($seance as $key ) {
    	$td = new TDTP();
    	$td->id_module = $request->idmodule;
    	$td->id_Ens = $request->idensTD;
    	$td->id_seance = $key ;
    	$td->id_groupe = $request->idgrpTD;
    	$td->save();
    }
    	return response()->json(['success'=>'TD is successfully added']);
    }
        public function storeTP(Request $request){
    	 $seance = $request->input('idseaTP');
    	 foreach ($seance as $key ) {
    	$tdtp = new TDTP();
    	$tdtp->id_module = $request->idmodule;
    	$tdtp->id_Ens = $request->idensTP;
    	$tdtp->id_seance = $key ;
    	$tdtp->id_groupe = $request->idgrpTP;
    	$tdtp->save();
    }
    	return response()->json(['success'=>'TP is successfully added']);
    }
    
   

     function empTab (Request $request){
     	$m = $request->input('modhid');
        $pop = DB::table('td_tps')
            ->join('enseignants', 'td_tps.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'td_tps.id_module', '=', 'modules.idMod')
            ->join('groupes', 'td_tps.id_groupe', '=', 'groupes.idG')
            ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
            ->where('td_tps.id_module','=', $m)
            ->select('seances.*','enseignants.*','groupes.nomG','groupes.idG')
            ->get(); 
            $pop1 = DB::table('cours')
            ->join('enseignants', 'cours.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'cours.id_module', '=', 'modules.idMod')
            ->join('sections', 'cours.id_section', '=', 'sections.idSec')
            ->join('seances', 'cours.id_seance', '=', 'seances.idSea')
            ->where('cours.id_module','=', $m)
            ->select('seances.*','enseignants.*','sections.*')
            ->get(); 
         $var = "hello"; 
        // dd($pop); 
         //console.log($pop);  
return response()->json(['pop' => $pop , 'var' => $var , 'pop1' => $pop1]);
     }



}
