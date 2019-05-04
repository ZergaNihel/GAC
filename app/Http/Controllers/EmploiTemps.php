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
function destroy(Request $request){
    
    $id = $request->supID;
    if($request->supType == 2 || $request->supType == 3){
    $sea = TDTP::find($request->supID);}
    if ($request->supType == 1) {
    $sea = Cour::find($request->supID);
    }
$sea->delete();

return response()->json(["id" =>$id]);
}

function addSeance(Request $request)
{
   $emp1 = 0;
    if($request->newType == "Cour"){
        $c = Cour::where("id_seance","=",$request->newSeance)
                   ->where("id_section","=",$request->newSec)
                   ->where("id_module","=",$request->idmodule)
                   ->count();
                    if($c == 0){
        //dd($request->newEns);
    $emp = Cour::create(["id_module"=>$request->idmodule,"id_Ens"=>$request->newEns,"id_section"=>$request->newSec,"id_seance"=>$request->newSeance,]);
    $emp1 = Cour::where('id','=',$emp->id)
                   ->join('enseignants','id_Ens','idEns')
                   ->join('seances','id_seance','idSea')
                   ->join('sections','id_section','idSec')
                   ->select('enseignants.nom','enseignants.prenom','seances.jour','seances.heure','seances.salle' , 'sections.nomSec','cours.id','seances.type')
                   ->get();
               }
    }
    if($request->newType == "TP" || $request->newType == "TD"  ){
         $c = TDTP::where("id_seance","=",$request->newSeance)
                   ->where("id_groupe","=",$request->newGrp)
                   ->where("id_module","=",$request->idmodule)
                   ->count();
                   if($c == 0){
        //  dd($request->newGrp);
    $emp = TDTP::create(["id_module"=>$request->idmodule,"id_Ens"=>$request->newEns,
        "id_groupe"=>$request->newGrp,"id_seance"=>$request->newSeance,]);
    $emp1 = TDTP::where('id','=',$emp->id)
                   ->join('enseignants','id_Ens','idEns')
                   ->join('seances','id_seance','idSea')
                   ->join('groupes','id_groupe','idG')
                   ->select('enseignants.nom','enseignants.prenom','seances.jour','seances.heure','seances.salle' , 'groupes.nomG','td_tps.id','seances.type')
                   ->get();
               }

    }
    
//dd($emp1);
    return response()->json(["emp" =>$emp1,"c"=>$c]);
}
function empGen (Request $request){
$m = $request->input('section');
$sem = $request->input('semestre');
$sec = Section::find($m);
$pop = DB::table('td_tps')
            ->join('enseignants', 'td_tps.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'td_tps.id_module', '=', 'modules.idMod')
            ->join('groupes', 'td_tps.id_groupe', '=', 'groupes.idG')
            ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
            ->join('groupe_etus', 'td_tps.id_groupe', '=', 'groupe_etus.groupe')
            ->where('groupe_etus.sec_groupe','=', $m)
            ->where('groupe_etus.sem_groupe','=', $sem)
            ->select('seances.*','enseignants.*','groupes.nomG','groupes.idG','modules.nom as nomModule','modules.code','modules.idMod')
            ->get();
            //dd($pop); 
$pop1 = DB::table('cours')
            ->join('enseignants', 'cours.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'cours.id_module', '=', 'modules.idMod')
            ->join('sections', 'cours.id_section', '=', 'sections.idSec')
            ->join('seances', 'cours.id_seance', '=', 'seances.idSea')
             ->join('groupe_etus', 'cours.id_section', '=', 'groupe_etus.sec_groupe')
            ->where('groupe_etus.sem_groupe','=', $sem)
             ->where('groupe_etus.sec_groupe','=', $m)
              ->where('cours.id_section','=', $m)
            ->select('seances.*','enseignants.*','sections.*','modules.nom as nomModule','modules.code','modules.idMod')
            ->distinct('section.idSec')
            ->get(); 
//dd($pop1);

return response()->json(['sec' => $sec,'pop' => $pop ,'pop1' => $pop1]);

}

    function generale ($id){
        
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    $semestre = Semestre::find($id);
    $sec = Groupe_etu::where('sem_groupe','=',$semestre->idSem)
                           ->join('sections','sec_groupe','idSec')
                           ->select('idSec','nomSec')
                           ->distinct('idSec')
                           ->get();
   
        return view('admin.emp_générale',compact('semestre','sem1','sem2','sec'));
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

    	$groupes  = Groupe_etu::where('sem_groupe','=',$id)
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
        $sem = $request->semestre;
     	$m = $request->input('moduleCh');
$module= Module::where('idMod',$m)->limit(1)->get();
 $tab = TDTP::where('id_module',$m )->count();
 $tab1 = Cour::where('id_module',$m)->count();
$pop = DB::table('td_tps')
            ->join('enseignants', 'td_tps.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'td_tps.id_module', '=', 'modules.idMod')
            ->join('groupes', 'td_tps.id_groupe', '=', 'groupes.idG')
            ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
            ->join('groupe_etus', 'td_tps.id_groupe', '=', 'groupe_etus.groupe')
            ->where('groupe_etus.sem_groupe','=', $sem)
            ->where('td_tps.id_module','=', $m)
            ->select('seances.*','enseignants.*','groupes.nomG','groupes.idG','td_tps.id')
            ->get(); 
            $pop1 = DB::table('cours')
            ->join('enseignants', 'cours.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'cours.id_module', '=', 'modules.idMod')
            ->join('sections', 'cours.id_section', '=', 'sections.idSec')
            ->join('seances', 'cours.id_seance', '=', 'seances.idSea')
            ->join('groupe_etus', 'cours.id_section', '=', 'groupe_etus.sec_groupe')
            ->where('groupe_etus.sem_groupe','=', $sem)
            ->where('cours.id_module','=', $m)
            ->select('seances.*','enseignants.*','sections.*','cours.id')
            ->distinct('cours.id_section')
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
        $sem =$request->input('semestre');
  $pop = DB::table('td_tps')
            ->join('enseignants', 'td_tps.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'td_tps.id_module', '=', 'modules.idMod')
            ->join('groupes', 'td_tps.id_groupe', '=', 'groupes.idG')
            ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
            ->join('groupe_etus', 'td_tps.id_groupe', '=', 'groupe_etus.groupe')
            ->where('groupe_etus.sem_groupe','=', $sem)
            ->where('td_tps.id_module','=', $m)
            ->select('seances.*','enseignants.*','groupes.nomG','groupes.idG','td_tps.id')
            ->get(); 
            $pop1 = DB::table('cours')
            ->join('enseignants', 'cours.id_Ens', '=', 'enseignants.idEns')
            ->join('modules', 'cours.id_module', '=', 'modules.idMod')
            ->join('sections', 'cours.id_section', '=', 'sections.idSec')
            ->join('seances', 'cours.id_seance', '=', 'seances.idSea')
            ->join('groupe_etus', 'cours.id_section', '=', 'groupe_etus.sec_groupe')
            ->where('groupe_etus.sem_groupe','=', $sem)
            ->where('cours.id_module','=', $m)
            ->select('seances.*','enseignants.*','sections.*','cours.id')
            ->distinct('cours.id_section')
            ->get(); 

        
return response()->json(['pop' => $pop  , 'pop1' => $pop1]);
     }



}
