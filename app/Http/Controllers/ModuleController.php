<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module;
use App\Enseignant;
use App\semestre;
use App\Examen;
use Auth;
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
        $exams = Examen::where('module_Exam',$id)->select('idSem')->distinct('idSem')->get();
        $ex =Examen::where('module_Exam',$id)->get();
        //$corr = 

		 return view('modules.details' ,compact('module','sem1','sem2','exams','ex'));
	}
     public function details_pdf($id,$sc){

         $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
        $pdf = Examen::find($id);
    $module = Module::find($pdf->module_Exam);
        return view('modules.pdf' ,compact('sem1','sem2','pdf','sc','module'));
     }
	public function edit(Request $request){
        
		$a =$request->idMod;
		$module= Module::find($a);
        $module->nom = $request->nom;
		$module->code = $request->code;
		$module->type = $request->type;
		if($request->semestre1 != 0 ){
		$module->semestre = $request->semestre1;
		$module->ens_responsable = $request->enseignant;
        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
        foreach ($sem1 as $key ) {
        $s1 = $key->idSem;
    }
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
        foreach ($sem2 as $key ) {
        $s2 = $key->idSem;
    }

$ex = Examen::where('module_Exam',$a)->where('idSem',$s1)->orWhere('idSem',$s2)->count();
if($ex >0 ){
$exams = Examen::where('module_Exam',$a)->where('idSem',$s1)->orWhere('idSem',$s2)->get();
foreach ($exams as $e ) {
    $e->idSem = $request->semestre1;
    $e->save(); }
}else{
 $exam1 = Examen::create(["idSem"=>$request->semestre1 ,'type'=>'Examen', 'module_Exam'=>$a,]);

        if($module->type == 'CTT' || $module->type == 'CTd' ){
         $exam2 = Examen::create(["idSem"=>$request->semestre1 ,'type'=>'Controle', 'module_Exam'=>$a,]);
        }
}
    }else{

		$module->semestre = null;
		$module->ens_responsable = null;

		}
		$module->save();
		return response()->json(['module' => $module]);
	}
    public function index(Request $request){
         if(Auth::user()->role == '1'){
            $s1=0;
            $s2=0;
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
        return  view('modules.index', compact('sem','modules','ens','s1','s2','sem1','sem2'));}
        else{
            return view('erreur_500',compact('sem1','sem2'));
        }
    }
    public function store(Request $request){
    	if($request->semestre == 0){
 $mod= Module::Create(["nom"=>$request->nom,"type"=>$request->type,"code"=>$request->code,"semestre"=>null,"ens_responsable"=>null,]);
    	}
    else{

    	$mod= Module::Create(["nom"=>$request->nom,"type"=>$request->type,"code"=>$request->code,"semestre"=>$request->semestre,"ens_responsable"=>$request->enseignant,]);
         $exam1 = Examen::create(["idSem"=>$request->semestre ,'type'=>'Examen', 'module_Exam'=>$mod->idMod,]);

        if($mod->type == 'CTT' || $mod->type == 'CTd' ){
         $exam2 = Examen::create(["idSem"=>$request->semestre ,'type'=>'Controle', 'module_Exam'=>$mod->idMod,]);
        }
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
