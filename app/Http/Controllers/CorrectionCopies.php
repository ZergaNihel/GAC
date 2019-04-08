<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Paquet;
use App\Enseignant;
use App\Correction;
use App\Paquet_en;
use Auth;

class CorrectionCopies extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paquets = null;

        $modules = DB::table('modules')
                    ->join('semestres','modules.semestre','=','semestres.idSem')
                    ->where('semestres.active','=',1)
                    ->get(); 
        return view('EnseignantR.correction.popup')->with(
            [
                'modules'=> $modules ,
                'paquets'=> $paquets
            ] 
        );
    }

    public function module(Request $request)
    {
        $type = $request->input('type');
        $modules = DB::table('modules')
                    ->join('semestres','modules.semestre','=','semestres.idSem')
                    ->join('examens','modules.idMod','=','examens.module_Exam')
                    ->where('semestres.active','=',1)
                    ->where('examens.type','=',$type)
                    ->get(); 
        return response()->json($modules);
    }

    public function paquet(Request $request)
    {
        $idmodule = $request->input('module');
        $type = $request->input('type');
        $paquets= DB::table('paquets')
                    ->join('examens','examens.idExam','=','paquets.paq_Exam')
                    ->join('modules','examens.module_Exam','=','modules.idMod')
                    ->where('examens.module_Exam','=',$idmodule)
                    ->where('examens.type','=',$type)
                    ->select('paquets.*')
                    ->get();
        return response()->json($paquets);
    }

    public function corriger(Request $request)
    {
        $p = $request->input('paquet');
        $paquet=Paquet::find($p);
        $codes= DB::table('codes')
                  ->join('corrections','codes.idC','=','corrections.code_etu')
                  ->where('codes.paq_code','=',$p)
                  ->where('corrections.correcteur','=', 1 )
                  ->select('corrections.*','codes.*')
                  ->get();
        return view('EnseignantR.correction.corriger',
            [
                'paquet' => $paquet ,
                'codes'  => $codes, 
            ] 
        );
    }

    public function noter(Request $request)
    {
        $code=$request->input('code');
        $n=$request->input('note');
        $id=DB::table('corrections')
                ->join('paquet_ens','corrections.correcteur','=','paquet_ens.id')
                ->where('code_etu', '=', $code)
                ->where('paquet_ens.id_Ens', '=', 1)
                ->select('id')
                ->get();
        $note=Correction::find($id[0]->id);
        $note->note=$n;
        $note->save();
        
        return response()->json($note);
    }

    public function GstpaquetCtrl()
    {
        $paquets=DB::table('paquet_ens')
                ->join('enseignants','enseignants.idEns','=','paquet_ens.id_Ens')
                ->join('paquets','paquets.idPaq','=','paquet_ens.id_paq')
                ->join('examens','examens.idExam','=','paquets.paq_Exam')
                ->join('modules','examens.module_Exam','=','modules.idMod')
                ->where('modules.ens_responsable','=',1)
                ->where('examens.type','=','Controle')
                ->select('paquets.*','enseignants.*')
                ->get();

        $module=DB::table('modules')
                ->join('semestres','modules.semestre','=','semestres.idSem')
                ->where('semestres.active','=',1)
                ->where('ens_responsable','=',1)
                ->first();

        $correcteurs=DB::table('td_tps')
                    ->join('enseignants','enseignants.idEns','=','td_tps.id_Ens')
                    ->where('id_module','=',$module->idMod)
                    ->get();
        $correcteursC=DB::table('cours')
                    ->join('enseignants','enseignants.idEns','=','cours.id_Ens')
                    ->where('id_module','=',$module->idMod)
                    ->select('id_Ens','enseignants.*')
                    ->distinct()
                    ->get();
                    
        $nompaq=DB::table('paquets')
        ->join('examens','examens.idExam','=','paquets.paq_Exam')
        ->join('modules','examens.module_Exam','=','modules.idMod')
        ->where('modules.ens_responsable','=',1)
        ->where('examens.type','=','Controle')
        ->select('paquets.idPaq','paquets.salle')
        ->groupby('idPaq','salle')
        ->get();

        return view('EnseignantR.gestion_paquets.controle')->with(
            [
                'nompaq'=> $nompaq,
                'paquets'=> $paquets,
                'correcteurs'=> $correcteurs,
                'correcteursC'=> $correcteursC
            ] 
        );
    }

    public function GstpaquetExm()
    {
        $paquets=DB::table('paquet_ens')
                ->join('enseignants','enseignants.idEns','=','paquet_ens.id_Ens')
                ->join('paquets','paquets.idPaq','=','paquet_ens.id_paq')
                ->join('examens','examens.idExam','=','paquets.paq_Exam')
                ->join('modules','examens.module_Exam','=','modules.idMod')
                ->where('modules.ens_responsable','=',1)
                ->where('examens.type','=','Examen')
                ->select('paquets.*','enseignants.nom')
                ->get();
        return view('EnseignantR.gestion_paquets.examen')->with(
            [
                'paquets'=> $paquets
            ] 
        );
    }

    public function correcteur(Request $request)
    {
        $correcteurs=$request->input('correcteurs'); $i=0;
        foreach($correcteurs as $correcteur)
        {
                $corriger = new Paquet_en();
                $corriger->id_paq= $request->input('paquets');
                $corriger->id_Ens = $correcteur;
                $corriger->save();
                $correc[$i]=Enseignant::find($correcteur);
                $i++;
        }
        $paquet=Paquet::find($request->input('paquets'));
        return ["paquet" => $paquet , "correcteur" => $correc];
    }
}
