<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Paquet;
use App\Examen;
use App\Enseignant;
use App\Correction;
use App\Paquet_en;
use App\Semestre;
use Auth;
use File;
use Validator;

class CorrectionCopies extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $paquets = null;

        $modules = DB::table('modules')
                    ->join('semestres','modules.semestre','=','semestres.idSem')
                    ->where('semestres.active','=',1)
                    ->get(); 
        $semestre = Semestre::find($id);
        return view('EnseignantR.correction.popup')->with(
            [
                'semestre'=> $semestre,
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
                    ->where('ens_responsable','=',Auth::user()->enseignant->idEns)
                    ->where('examens.type','=',$type)
                    ->distinct()
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
        $i=0;
        $p = $request->input('paquets');
        $paquet=Paquet::find($p);
        $codes= DB::table('codes')
                  ->join('paquet_ens','codes.paq_code','=','paquet_ens.id_paq')
                  ->where('codes.paq_code','=',$p)
                  ->where('paquet_ens.id_Ens','=',Auth::user()->enseignant->idEns)
                  ->select('codes.*')
                  ->get();
        foreach($codes as $c)
        {
            $note[$i]=DB::table('corrections')
                    ->where('code_etu','=',$c->idC)
                    ->where('correcteur','=',Auth::user()->enseignant->idEns)
                    ->get();
            $i++;
        }
        
        $semestre= Semestre::find($request->input('semestre')); 

        return view('EnseignantR.correction.corriger',
            [
                'paquet' => $paquet ,
                'codes'  => $codes, 
                'semestre'=> $semestre,
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
                ->where('paquet_ens.id_Ens', '=',Auth::user()->enseignant->idEns)
                ->select('corrections.id')
                ->get();
        if(count($id)>0)
        {
            $note=Correction::find($id[0]->id);
            $note->note=$n;
            $note->save();
        }
        else
        {
            $note= new Correction();
            $note->note=$n;
            $note->correcteur=Auth::user()->enseignant->idEns;
            $note->code_etu=$code;
            $note->save();
        }
            
        
        return response()->json($note);
    }

    public function GstpaquetCtrl($id)
    {
        $exam=DB::table('examens')
                ->join('modules','examens.module_Exam','=','modules.idMod')
                ->where('modules.ens_responsable','=',Auth::user()->enseignant->idEns)
                ->where('examens.type','=','Controle')
                ->first();

        $module=DB::table('modules')
                ->join('semestres','modules.semestre','=','semestres.idSem')
                ->where('ens_responsable','=',Auth::user()->enseignant->idEns)
                ->first();
                
        $correcteurs=DB::select("SELECT distinct * FROM enseignants WHERE idEns in(SELECT id_Ens FROM cours WHERE cours.id_module = $module->idMod) OR idEns in(SELECT id_Ens FROM td_tps WHERE td_tps.id_module = $module->idMod) ");
        
        $nompaq=DB::table('paquets')
        ->join('examens','examens.idExam','=','paquets.paq_Exam')
        ->join('modules','examens.module_Exam','=','modules.idMod')
        ->where('modules.ens_responsable','=',Auth::user()->enseignant->idEns)
        ->where('examens.type','=','Controle')
        ->select('paquets.idPaq','paquets.salle')
        ->groupby('idPaq','salle')
        ->get();

        $semestre = Semestre::find($id);

        return view('EnseignantR.gestion_paquets.controle')->with(
            [
                'semestre'=> $semestre,
                'nompaq'=> $nompaq,
                'exam'=> $exam,
                'correcteurs'=> $correcteurs
            ] 
        );
    }

    public function datelimite(Request $request)
    {
        $module=DB::table('modules')
                ->join('semestres','modules.semestre','=','semestres.idSem')
                ->where('semestres.active','=',1)
                ->where('ens_responsable','=',Auth::user()->enseignant->idEns)
                ->first();
        $ex=DB::table('examens')
                ->where('type','=','Controle')
                ->where('module_Exam','=',$module->idMod)
                ->first();
        $examen=Examen::find($ex->idExam);
        $examen->delais=$request->input('date');
        $examen->save();
        return $examen;
    }

    public function GstpaquetExm($id)
    {
        $paquets=DB::table('paquet_ens')
                ->join('enseignants','enseignants.idEns','=','paquet_ens.id_Ens')
                ->join('paquets','paquets.idPaq','=','paquet_ens.id_paq')
                ->join('examens','examens.idExam','=','paquets.paq_Exam')
                ->join('modules','examens.module_Exam','=','modules.idMod')
                ->where('modules.ens_responsable','=',Auth::user()->enseignant->idEns)
                ->where('examens.type','=','Examen')
                ->select('paquets.*','enseignants.nom')
                ->get();

        $semestre = Semestre::find($id);

        return view('EnseignantR.gestion_paquets.examen')->with(
            [
                'semestre'=> $semestre,
                'paquets'=> $paquets
            ] 
        );
    }

    public function correcteur(Request $request)
    {
        $i=0;
        $correcteurs=$request->input('correcteurs'); 
        $paquet=$request->input('paquets');
        $paq_ens=DB::table('paquet_ens')
        ->where('id_paq','=',$paquet)
        ->get();
        if(count($paq_ens) != 0 )
        {
            foreach($correcteurs as $correcteur)
            {
                $tab[$i]=$correcteur;
                $i++;
            }
            $i=0;
            foreach($paq_ens as $p)
            {
                $exam=Paquet_en::find($p->id);
                $exam->id_Ens=$tab[$i];
                $exam->save();
                $i++;
            }
            $i=0;
            foreach($correcteurs as $correcteur)
            {
                $correc[$i]=Enseignant::find($correcteur);
                $i++;
            }
            $paquet=Paquet::find($request->input('paquets'));
            return ["paquet" => $paquet , "correcteur" => $correc];
        }
        else
        {
            $i=0;
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

    public function sujet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
          ]);
    
    
          if ($validator->passes()) {
    
    
            $File = $request->file('file');
    		$fileName = uniqid().$File->getClientOriginalName();
            $File->move(public_path('pdf'), $fileName);
            


            $module=DB::table('modules')
                ->join('semestres','modules.semestre','=','semestres.idSem')
                ->where('semestres.active','=',1)
                ->where('ens_responsable','=',Auth::user()->enseignant->idEns)
                ->first();
            $ex=DB::table('examens')
                    ->where('type','=','Controle')
                    ->where('module_Exam','=',$module->idMod)
                    ->first();
            $examen=Examen::find($ex->idExam);
            $examen->sujet=$fileName;
            $examen->save();
            return response()->json($examen);
          }
    
    
          return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function corrige(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
          ]);
    
    
          if ($validator->passes()) {
    
    
            $File = $request->file('file');
    		$fileName = uniqid().$File->getClientOriginalName();
            $File->move(public_path('pdf'), $fileName);
            


            $module=DB::table('modules')
                ->join('semestres','modules.semestre','=','semestres.idSem')
                ->where('semestres.active','=',1)
                ->where('ens_responsable','=',Auth::user()->enseignant->idEns)
                ->first();
            $ex=DB::table('examens')
                    ->where('type','=','Controle')
                    ->where('module_Exam','=',$module->idMod)
                    ->first();
            $examen=Examen::find($ex->idExam);
            $examen->corrige_type=$fileName;
            $examen->save();
            return response()->json($examen);
          }
    
    
          return response()->json(['error'=>$validator->errors()->all()]);
    }
}
