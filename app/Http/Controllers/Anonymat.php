<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Module;
use App\Seance;
use App\Groupe;
use App\Absence;
use App\Paquet;
use Auth;
use Excel;

class Anonymat extends Controller
{
    public function index()
    {
        $modules= Module::all();
        $modules= DB::table('modules')
                ->join('semestres','modules.semestre','=','semestres.idSem')
                ->where('semestres.active','=',1)
                ->get();
        $module="";
        return view('Anonymat.paquets')->with(
            ['modules'=> $modules,
             'module' => $module
             ] 
        );
    }

    public function lister(Request $request)
    {
        
        $idmodule = $request->input('module');
        $type = $request->input('type');

        $module= Module::find($request->input('module')); 

        $ensR= DB::table('modules')
                ->join('enseignants','enseignants.idEns','=','modules.ens_responsable')
                ->where('modules.idMod','=',$idmodule)
                ->select('enseignants.*')
                ->get();

        $paquets= DB::table('paquets')
                    ->join('examens','examens.idExam','=','paquets.paq_Exam')
                    ->join('modules','examens.module_Exam','=','modules.idMod')
                    ->where('examens.module_Exam','=',$idmodule)
                    ->where('examens.type','=',$type)
                    ->select('paquets.*')
                    ->get();
        $i=0; $nbr=null;
        foreach( $paquets as $paquet)
        {
            $nbr[$i] = DB::table('codes')
                ->where('paq_code','=',$paquet->idPaq)
                ->groupBy('paq_code')
                ->count();
            $i++;
        }

                    $data=array(
                        "module" => $module ,
                        "type" => $type ,
                        "paquets" => $paquets,
                        "ensR" => $ensR,
                        "nbrCopies" => $nbr
                    );
        //return $data;
        return response()->json($data);
        

    }

    public function import(Request $request)
    {
      $tab[]=null; 

     $this->validate($request, [
      'listeEtu'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('listeEtu')->getRealPath();

     dd($path);

     $data = Excel::load($path)->get();
     
     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
        $i=0; 
       foreach($value as $row)
       { 
          $tab[$i]=$row; $i++;   
       }
       $insert_data[] = array(
            'code'    => rand(),
            'etu_code' => $tab[0]
       );
      }
      
      //return $tab;

      if(!empty($insert_data))
      {
       DB::table('codes')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');

    return response()->json(['a1'=>'hello']);
    }

    // public function import(Request $request)
    // {
    //     $idmodule = $request->input('moduleEx');
    //     $type = $request->input('typeEx');
    //     $path = $request->file('listeEtu')->getRealPath();
    //     return [ "m" => $idmodule , "t" => $type , "p" => $path];

    //     $exam=DB::table('examens')
    //             ->where('examens.module_Exam','=',$request->input('moduleEx'))
    //             ->where('examens.type','=',$request->input('typeEx'))
    //             ->get();
    //             dd($request->input('typeEx'));
    //             return $request->input('typeEx');
    //     $paquet= new Paquet();
    //     $paquet->nom_paq=$request->input('salle');
    //     $paquet->salle=$request->input('salle');
    //     $paquet->paq_Exam=$exam->idExam;
        
    //     $paquet->save();
    //     dd($paquet);
    //     return $paquet;
    //     return response()->json($paquet);
    // }
}
