<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Enseignant;
use App\semestre;
use App\Examen;
use Illuminate\Support\Facades\Redirect;
class ModuleController extends Controller
{
	public function edit(Request $request){
		$a =$request->idMod;
		$module= Module::find($a);
 if(($request->type == c || $request->type == 'CTd') &&($module->type == 'Cour' || $module->type == 'TP') ){

    	$ex1 = new Examen();
    	$ex1->type ='Controle';
    	$ex1->module_Exam = $module->idMod;
    	$ex1->save();

    }
    if(($request->type == 'Cour' || $request->type == 'TP') &&($module->type == 'CTd' || $module->type == 'CTT' )){

    	$ex2 = Examen::where('module_Exam','=',$module->idMod)->where('type','=','Controle')->get();
    	foreach ($ex2 as $key ) {
    		$key->delete();
    	}

    }

		$module->nom = $request->nom;
		$module->code = $request->code;
		$module->type = $request->type;
		if($request->semestre1 !=0 ){
		$module->semestre = $request->semestre1;
		$module->ens_responsable = $request->enseignant;}
		else{
		$module->semestre = null;
		$module->ens_responsable = null;
		}
		$module->save();
		return response()->json(['module' => $module]);
	}
    public function index(){
    	$ens = Enseignant::all();
    	$modules= Module::paginate(16);
    	$semestres1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
		foreach ($semestres1 as $key ) {
    	$s1 = $key->idSem;
    }
    	$semestres2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
		foreach ($semestres2 as $key ) {
    	$s2 = $key->idSem;
    }
    $sem = Semestre::where('active','=',1)->get();
       //dd($s2);
        return  view('modules.index', compact('sem','modules','ens','s1','s2'));
    }
    public function store(Request $request){
    	if($request->semestre == 0){
 $mod= Module::Create(["nom"=>$request->nom,"type"=>$request->type,"code"=>$request->code,"semestre"=>null,"ens_responsable"=>null,]);
    	}else{

    	$mod= Module::Create(["nom"=>$request->nom,"type"=>$request->type,"code"=>$request->code,"semestre"=>$request->semestre,"ens_responsable"=>$request->enseignant,]);
    }
    if($request->type == 'CTT' || $request->type == 'CTd'){

    	$ex1 = new Examen();
    	$ex1->type ='Controle';
    	$ex1->module_Exam = $mod->idMod;
    	$ex1->save();

    }
   
    	$ex = new Examen();
    	$ex->type ='Examen';
    	$ex->module_Exam = $mod->idMod;
    	$ex->save();

    

         return  response()->json(['mod' => $mod]);
    }
    public function delete($id){
    	$mod = Module::find($id);
    	$sem = $mod->semestre;
    	$mod->delete();
        	return  response()->json(['sem' =>$sem,'id'=>$id ,'nom'=>$mod->nom]);
    }

}
