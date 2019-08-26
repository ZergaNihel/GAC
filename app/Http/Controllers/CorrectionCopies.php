<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\DatabaseNotification;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;
use App\Notifications\CorrecteursNotifications;

use App\Paquet;
use App\Examen;
use App\Enseignant;
use App\Correction;
use App\Paquet_en;
use App\Semestre;
use Auth;
use File;
use Validator;
use Notification;


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
                    //->join('semestres','modules.semestre','=','semestres.idSem')
                    ->join('examens','modules.idMod','=','examens.module_Exam')
                    ->join('paquets', 'examens.idExam', '=', 'paquets.paq_Exam')
                    ->join('paquet_ens', 'paquet_ens.id_paq', '=', 'paquets.idPaq')
                    ->where('paquet_ens.id_Ens','=',Auth::user()->enseignant->idEns)
                    ->where('examens.type','=',$type)
                    ->select('idMod','nom')
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
                    ->join('paquet_ens','paquet_ens.id_paq','=','paquets.idPaq')
                    ->where('paquet_ens.valide','=',0)
                    ->where('examens.module_Exam','=',$idmodule)
                    ->where('examens.type','=',$type)
                    ->where('id_Ens','=',Auth::user()->enseignant->idEns)
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
                    ->join('paquet_ens','corrections.correcteur','=','paquet_ens.id')
                    ->where('code_etu','=',$c->idC)
                    ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                    ->get();
            $i++;
        }

        $examen=DB::table('paquets')
                ->join('examens','examens.idExam','=','paquets.paq_Exam')
                ->where('paquets.idPaq','=',$p)
                ->get();

        $paq_ens=DB::table('paquet_ens')
                    ->join('corrections','corrections.correcteur','=','paquet_ens.id')
                    ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                    ->where('id_paq','=',$p)
                    ->get();
        
        $semestre= Semestre::find($request->input('semestre')); 

        return view('EnseignantR.correction.corriger',
            [
                'paquet' => $paquet ,
                'codes'  => $codes, 
                'semestre'=> $semestre,
                'examen' => $examen,
                'paq_ens' => $paq_ens,
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
        $paq_ens=DB::table('paquet_ens')
                ->where('id_Ens','=',Auth::user()->enseignant->idEns)
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
            $note->correcteur=$paq_ens[0]->id;
            $note->code_etu=$code;
            $note->save();
        }
            
        
        return response()->json($note);
    }

    public function valider(Request $request)
    {
        $paquet=$request->input('paquetens');
        $auth=$request->input('auth');
        $p=DB::table('paquet_ens')
        ->where('id_Ens', '=', $auth)
        ->where('id_paq', '=',$paquet)
        ->first();
        //return $p;
        $paqens=Paquet_en::find($p->id);
        $paqens->valide=1;
        $paqens->save();
        $semestre= Semestre::find($request->input('semestre')); 
        return view('EnseignantR.correction.popup',['semestre'=> $semestre,
        ]);
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
        ->where('decode','=',0)
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
        $p=Paquet::find($paquet);
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
            $ex=DB::table('paquets')
                ->join('examens','paquets.paq_Exam','=','examens.idExam')
                ->join('modules','modules.idMod','=','examens.module_Exam')
                ->where('paquets.idPaq','=',$paquet)
                ->select('examens.type as type','modules.nom')
                ->get();
        
            $details = [
                'id_paq' => $p->idPaq,
                'nomPaq' => $p->salle,
                'module' => $ex[0]->nom,
                'type' => $ex[0]->type,
            ];
            $c0=DB::table('users')
                ->join('enseignants','enseignants.idEns','=','users.id_Ens')
                ->first();
            $c1=DB::table('users')
                ->join('enseignants','enseignants.idEns','=','users.id_Ens')
                ->first();
                return $c0;
            
            Notification::send($c0, new CorrecteursNotifications($details));
            Notification::send($c1, new CorrecteursNotifications($details));
            
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

            $ex=DB::table('paquets')
                ->join('examens','paquets.paq_Exam','=','examens.idExam')
                ->join('modules','modules.idMod','=','examens.module_Exam')
                ->where('paquets.idPaq','=',$paquet)
                ->select('examens.type as type','modules.nom')
                ->get();
        
            $details = [
                'id_paq' => $p->idPaq,
                'nomPaq' => $p->salle,
                'module' => $ex[0]->nom,
                'type' => $ex[0]->type,
            ];
            $c0=DB::table('users')
                ->where('id_Ens',$correc[0]->idEns)
                ->get();
            $c1=DB::table('users')
                ->where('id_Ens',$correc[1]->idEns)
                ->get();
               // $c0[0]->notify(new CorrecteursNotifications($details));
               /* $c0[0]->notify(new CorrecteursNotifications($details));*/
            Notification::send($c0[0], new CorrecteursNotifications($details));
            Notification::send($c1[0], new CorrecteursNotifications($details));

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
