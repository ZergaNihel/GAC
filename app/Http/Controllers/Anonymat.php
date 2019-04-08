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

        $exam=DB::table('examens')
                ->where('examens.module_Exam','=',$request->input('moduleEx'))
                ->where('examens.type','=',$request->input('typeEx'))
                ->get();

        $paquet= new Paquet();
        $paquet->nom_paq=$request->input('salle');
        $paquet->salle=$request->input('salle');
        $paquet->paq_Exam=$exam[0]->idExam;
        
        $paquet->save();
        
        $p=DB::table('paquets')
            ->where('salle' ,'=', $request->input('salle'))
            ->where('paq_Exam', '=', $exam[0]->idExam)
            ->get();

        $tab[]=null; 

        $this->validate($request, [
        'listeEtu'  => 'required|mimes:xls,xlsx'
        ]);

        $path = $request->file('listeEtu')->getRealPath();

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
                    'code'    => mt_rand(1000, 9999),
                    'etu_code' => $tab[0],
                    'paq_code' => $p[0]->idPaq
                );
            }

            if(!empty($insert_data))
            {
            DB::table('codes')->insert($insert_data);
            }
        }
        $nbr = DB::table('codes')
            ->where('paq_code','=',$p[0]->idPaq)
            ->groupBy('paq_code')
            ->count();
        return ["paquet" => $paquet , "nbrCopies" => $nbr];
    }

    public function details($id)
    {
        $paquet = Paquet::find($id);
        $etudiants=DB::table('codes')
        ->join('etudiants','codes.etu_code','=','etudiants.matricule')
        ->where('paq_code','=',$paquet->idPaq)
        ->select('etudiants.*','codes.*')
        ->get();
        return view('Anonymat.paquet')->with([
            'etudiants' => $etudiants,
        ]);
    }

    public function delete(Request $request)
    {
        $paquet=Paquet::find($request->idP)->delete();
    }
}
