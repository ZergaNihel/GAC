<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Semestre;
use App\parametre;


class ParametresController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

   function index(){
   	$param = parametre::where('active','=',1)->get();
   	$paramCount = parametre::where('active','=',1)->count();
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
    return view('admin.parametre',compact('sem1','sem2','param','paramCount'));
   }
   function store(Request $request){
   	$messages = [
    'required'    => 'le champs :attribute est obligatoire.',
    'mimes'    => 'le champs :attribute doit être compatible avec le format jpg,bmp,png . ',
];
   $validator = Validator::make($request->all(), [
            'univ' => 'required',
            'dep' => 'required',
            'fac' => 'required',
            'prom' => 'required',
            'logo' => 'required|mimes:jpeg,bmp,png'
        ],$messages);
 
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
   
   	$param = parametre::where('active','=',1)->get();
   	foreach ($param as $key ) {
   		$key->active = 0;
   		$key->save();
   	}
   	
   	//dd($request->hasFile('logo'));
   	    if($request->hasFile('logo')){

            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/logos'),$file_name);
	 	     $logo = '/uploads/logos/'.$file_name;
    }

   	$param = Parametre::create(['promotion'=>$request->prom,'universite'=>$request->univ,'dep'=>$request->dep,'fac'=>$request->fac,'logo'=>$logo,'active'=>1,]);
   	 
    return redirect('admin/parametre');

   }
   function edit(Request $request){
   	   	$messages = [
    'required'    => 'le champs :attribute est obligatoire.',
    'mimes'    => 'le champs :attribute doit être compatible avec le format jpg,bmp,png . ',
];
   $validator = Validator::make($request->all(), [
            'univ' => 'required',
            'dep' => 'required',
            'fac' => 'required',
            'prom' => 'required',
            'logo' => 'required|mimes:jpeg,bmp,png'
        ],$messages);
 
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

   	$param = parametre::find($request->id);
//dd($param);
   	 	    if($request->hasFile('logo')){

            $file = $request->file('logo');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/uploads/logos'),$file_name);
	 	     $logo = '/uploads/logos/'.$file_name;
    }
   //dd($request->prom);
   		$param->promotion = $request->prom;
   		$param->universite = $request->univ;
   		$param->dep = $request->dep;
   		$param->fac = $request->fac;
   		$param->logo = $logo;
   	
   	    $param->save();

   	 
    return redirect('admin/parametre');

   }
}
