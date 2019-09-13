<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Section;
use App\Semestre;
use App\Groupe;
use App\Groupe_etu;
use App\Module;
use App\Etudiant;
use Auth;

class Groupes extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index($id){
   
		$section = Groupe_etu::where('sem_groupe','=',$id)->select('sec_groupe')->distinct()->get();
        
        $semestre= Semestre::find($id); 

         if(Auth::user()->role == '3')
        {
            return view('EnseignantR.groupes', compact('semestre','section','sections'));
        }
        else
        {
            return view('Erreur403');
        }
    }
    
    function statistique ($id){
        $k1 =$id;
        $nbr = Etudiant::where('idG','=',$k1)->count();
        $endette = Etudiant::where('idG','=',$k1)->where('type','=','Endetté(e)')->count();
        $repetitif = Etudiant::where('idG','=',$k1)->where('type','=','Répétitif(ve)')->count();
        $nouveau = Etudiant::where('idG','=',$k1)->where('type','=','Nouveau(elle)')->count();
        return response()->json(["id"=>$id,"nbr"=>$nbr,"endette"=>$endette,"repetitif"=>$repetitif,"nouveau"=>$nouveau,]);
    }
    // public function index()
    // {
    //     $modules=DB::select("SELECT distinct id_module,nom FROM td_tps,modules where id_Ens=1 and modules.idMod=td_tps.id_module");
    //     $i=0;
    //     foreach ($modules as $module) {
    //         $m=$module->id_module;
    //         $mod[$i]=$module->nom; 
    //         $groupes[$i]=DB::select("SELECT t.id_groupe
    //         FROM td_tps t
    //         where t.id_module = $m
    //         and t.id_Ens = 1
    //         group by id_groupe ");
    //         $i++;
    //     }
    //     $groupes1=$groupes[0];$module1=$mod[0];
    //     if($i==2)
    //     {
    //         $groupes2=$groupes[1];     
    //         $module2=$mod[1];
    //     }
    //     else{
    //         $groupes2=null;     
    //         $module2=null;
    //     }
        
    //     return view('EnseignantR.groupes')->with(
    //         ['groupes1'=> $groupes1 ,
    //          'groupes2'=> $groupes2,
    //          'module1'=>$module1,
    //          'module2'=>$module2 ]
    //     );
    // }
}
