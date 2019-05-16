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
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function details($id){
        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
		$module = Module::find($id);
		 return view('modules.details' ,compact('module','sem1','sem2'));
	}
	public function edit(Request $request){
        
		$a =$request->idMod;
		$module= Module::find($a);
        $module->nom = $request->nom;
		$module->code = $request->code;
		$module->type = $request->type;
		if($request->semestre1 != 0 ){
		$module->semestre = $request->semestre1;
		$module->ens_responsable = $request->enseignant;}
		else{
		$module->semestre = null;
		$module->ens_responsable = null;
		}
		$module->save();
		return response()->json(['module' => $module]);
	}
    public function index(Request $request){
    	$ens = Enseignant::all();
    	$modules= Module::paginate(16);
    	$sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
		foreach ($sem1 as $key ) {
    	$s1 = $key->idSem;
    }
    	$sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
		foreach ($sem2 as $key ) {
    	$s2 = $key->idSem;
    }
    $sem = Semestre::where('active','=',1)->get();
       //dd($s2);
    if ($request->ajax()) {
        //dd("hh");
            return view('modules.pagination', compact('sem','modules','ens','s1','s2' , 'sem1','sem2'));
        }
        return  view('modules.index', compact('sem','modules','ens','s1','s2','sem1','sem2'));
    }
    public function store(Request $request){
    	if($request->semestre == 0){
 $mod= Module::Create(["nom"=>$request->nom,"type"=>$request->type,"code"=>$request->code,"semestre"=>null,"ens_responsable"=>null,]);
    	}
    else{

    	$mod= Module::Create(["nom"=>$request->nom,"type"=>$request->type,"code"=>$request->code,"semestre"=>$request->semestre,"ens_responsable"=>$request->enseignant,]);

    }
   
   
 
         return  response()->json(['mod' => $mod]);
    }
    public function delete($id){
    	$mod = Module::find($id);
    	$sem = $mod->semestre;
    	$mod->delete();
        	return  response()->json(['sem' =>$sem,'id'=>$id ,'nom'=>$mod->nom]);
    }

}
