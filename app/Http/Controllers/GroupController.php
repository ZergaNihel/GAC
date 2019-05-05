<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Section;
use App\Semestre;
use App\Groupe;
use App\Groupe_etu;
use App\Module;
use App\Etudiant;
use App\Endette;
use Session;
use Illuminate\Support\Facades\Validator;
class GroupController extends Controller

{
   public function __construct()
    {
        $this->middleware('auth');
    }

	function index($id){
		$sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
	  $semestre = Semestre::find($id);
    $section = Groupe_etu::where('sem_groupe','=',$id)->select('sec_groupe')->distinct()->get();
    $sections = Section::all();

		 return view('admin.groupes', compact('semestre','section','sections','sem1','sem2'));
	}
  
	function groupe($id,$idSem){
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
		$etudiants = Etudiant::where('idG','=',$id)->get();
	  $semestre = Semestre::find($idSem);
    
    //dd($semestre);
		$modules = Module::where('semestre','=',$idSem)->get();
		//dd($modules);
	
		 return view('admin.groupe_det', compact('modules','etudiants','sem1','sem2','semestre'));
	}
function edit(Request $request){

	  $this->validate($request, [
      'groupe' => 'required|string',
           'section' => 'required'
     ]);
        
	$idG = $request->idGrp;
	$idGrp_etu = $request->idGrp_etu;
	$grp = Groupe::find($idG);
	$grp->nomG = $request->groupe;
	$grp->save();
	$grp_etu = Groupe_etu::where('sec_groupe','=',$idGrp_etu)->where('groupe','=',$idG)->get();
	foreach ($grp_etu as $grp) {
		$grp->sec_groupe = $request->section;
	    $grp->save();
	}
    return back()->with('succ', 'le groupe a été bien modifié .');        
}

	function new_student(Request $request)
    {   $type = $request->type;
 
    	//dd($request->type);
      $etud = Etudiant::create(["matricule"=>$request->matricule,"nom"=>$request->nom,"prenom"=>$request->prenom,"type"=>$request->type,"date_naissance"=>$request->birthday,"idG"=>$request->groupe,]);
      //dd();
    if($type === "Répétitif(ve)" || $type === "Endétté(e)"){
    	$modules = $request->input('modules');
    	//dd($modules);
   	foreach ($modules as $key) {
    	$cour = new Endette();
    	$cour->Etu_end= $etud->idEtu;
    	$cour->module_end = $key;
    	$cour->save();
    	 }
    	}


    	//dd($etud);
    	return  response()->json(['etud' => $etud]);

    }
   
    function import(Request $request)
    {

      $tab[]=null; 
      $semestre=Semestre::find($request->idsemestre);

     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);
   
    $groupe = $request->groupe;
  
    $k = Groupe::create(['nomG'=> $groupe,]);	
    //dd($k->idG);
    $section = $request->section;
    $grp_etu  = Groupe_etu::create(['sem_groupe'=>$request->idsemestre,'sec_groupe'=>$section,'groupe'=>$k->idG,]);
    $path = $request->file('select_file')->getRealPath();
    $data = Excel::load($path)->get();
     
     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
        $i=0; 
       foreach($value as $row)
       {  $tab[$i]=$row; $i++;
      
       }
       $insert_data[] = array(
        'matricule'  => $tab[0],
        'nom'   => $tab[1],
        'prenom'   => $tab[2],
        'type'   => $tab[3],
        'date_naissance'  => $tab[4],
        'idG'  => $k->idG
       );
      }
      
      //return $tab;

      if(!empty($insert_data))
      {
       DB::table('etudiants')->insert($insert_data);
      }
     }
     return Redirect::to('groupe/detail/'.$k->idG.'/'.$semestre->idSem);
    }
      function statistique ($id){
      	//dd($id);
    	$k1 =$id;
    	$nbr = Etudiant::where('idG','=',$k1)->count();
    	$endette = Etudiant::where('idG','=',$k1)->where('type','=','Endetté(e)')->count();
    	$repetitif = Etudiant::where('idG','=',$k1)->where('type','=','Répétitif(ve)')->count();
    	$nouveau = Etudiant::where('idG','=',$k1)->where('type','=','Nouveau(elle)')->count();
    	return response()->json(["id"=>$id,"nbr"=>$nbr,"endette"=>$endette,"repetitif"=>$repetitif,"nouveau"=>$nouveau,]);
    }
    function delete(Request $request){
    	$id= $request->input('idGrpDel');
        //dd($id);
        $mat = Groupe::find($id);
        //dd($mat);
        $mat->delete();
        	return  response()->json(['success' => 'deleting ith success','id'=>$id]);

    }

}
