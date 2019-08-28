<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Code;
use App\Paquet;
use App\Examen;
use App\Enseignant;
use App\Correction;
use App\Paquet_en;
use App\Semestre;
use Auth;
use File;
use Validator;

class GestionCorrection extends Controller
{
    public function index($id)
    {
        $semestre = Semestre::find($id);
        return view('EnseignantR.gestion_correction.popup')->with(
            [
                'semestre'=> $semestre
            ]);
    }

    public function paquet(Request $request)
    {
        $idmodule = DB::table('modules')
                    ->where('ens_responsable','=',Auth::user()->enseignant->idEns)
                    ->get();

        $type = $request->input('type');

        $paquets= DB::table('paquets')
                    ->join('examens','examens.idExam','=','paquets.paq_Exam')
                    ->join('modules','examens.module_Exam','=','modules.idMod')
                    ->where('examens.module_Exam','=',$idmodule[0]->idMod)
                    ->where('examens.type','=',$type)
                    ->select('paquets.*')
                    ->get();
        $i=0; $t=null;
        foreach ($paquets as $p) {
            $cpt=DB::table('paquet_ens')
                    ->where('id_paq','=',$p->idPaq)
                    ->where('valide','=',1)
                    ->count();
            if($cpt == 2)
            {
                $t[$i]=$p;
                $i++;
            }
        }
        return response()->json($t);
    }

    public function lister(Request $request)
    {
        $type = $request->input('type');
        $paquet = Paquet::find($request->input('paquet'));  

        $correcteurs = DB::table('enseignants')
                        ->join('paquet_ens','paquet_ens.id_Ens','=','enseignants.idEns')
                        ->where('id_paq','=',$request->input('paquet'))
                        ->get();

        $codes=DB::table('codes')
                    ->where('codes.paq_code','=',$request->input('paquet'))
                    ->get();
                  
        $i=0; $notes1=null;$notes2=null;
        foreach($codes as $code)
        {
            $note1= DB::table('corrections')
                    ->join('paquet_ens','paquet_ens.id','=','corrections.correcteur')
                    ->where('paquet_ens.id_Ens','=',$correcteurs[0]->idEns)
                    ->where('code_etu','=',$code->idC)
                    ->first();
                    
            if($note1 )
            {
                $notes1[$i]=$note1->note; $i++;
            }else{
                $notes1[$i]=null; $i++;
            }
        }
        
        $i=0;
        foreach($codes as $code)
        {
            $note2= DB::table('corrections')
                    ->join('paquet_ens','paquet_ens.id','=','corrections.correcteur')
                    ->where('paquet_ens.id_Ens','=',$correcteurs[1]->idEns)
                    ->where('code_etu','=',$code->idC)
                    ->first();
            if($note2)
            {
                $notes2[$i]=$note2->note; $i++;
            }else{
                $notes2[$i]=null; $i++;
            }
        }

        $semestre= Semestre::find($request->input('semestre')); 
                        
        return view('EnseignantR.gestion_correction.gerer')->with(
            [
                'semestre'=> $semestre,
                'paquet'=> $paquet ,
                'codes' => $codes->pluck('code'),
                'correcteurs'=> $correcteurs,
                'notes1'=> $notes1,
                'notes2' => $notes2
            ] 
        );
    }

    public function ecart(Request $request)
    {
        
        $codes=DB::table('codes')
                    ->where('codes.paq_code','=',$request->input('paquet'))
                    ->get();
                   
        $i=0;
        foreach($codes as $code)
        {
            $note1= DB::table('corrections')
                    ->join('paquet_ens','paquet_ens.id','=','corrections.correcteur')
                    ->where('paquet_ens.id_Ens','=',$request->input('corr1'))
                    ->where('code_etu','=',$code->idC)
                    ->first();
            if($note1)
            {
                $notes1[$i]=$note1->note; $i++;
            }else{
                $notes1[$i]=null; $i++;
            }
        }
        
        $i=0;
        foreach($codes as $code)
        {
            $note2= DB::table('corrections')
                    ->join('paquet_ens','paquet_ens.id','=','corrections.correcteur')
                    ->where('paquet_ens.id_Ens','=',$request->input('corr2'))
                    ->where('code_etu','=',$code->idC)
                    ->first();
            if($note2)
            {
                $notes2[$i]=$note2->note; $i++;
            }else{
                $notes2[$i]=null; $i++;
            }
        }
       
        $j=0;
        for($i=0;$i<count($codes);$i++)
        {
            if( $notes1[$i] && $notes2[$i] && abs( $notes1[$i]-$notes2[$i] ) >= $request->input('ecart') )
            {
                $notes3[$j]= [
                    "id"   => $codes[$i]->idC,
                    "code" => $codes[$i]->code,
                    "note1"=> $notes1[$i],
                    "note2"=> $notes2[$i]
                ];
                $j++;
            }
        }
        return $notes3;
    }

    public function noter(Request $request)
    {
        if($request->input('note'))
        {
            $notefinale=Code::find($request->input('code'));
            $notefinale->notefinale=$request->input('note');
            $notefinale->save();
        }else{
            $notefinale=Code::find($request->input('code'));
            $notefinale->notefinale=0;
            $notefinale->save();
        }
        return $notefinale;
    }

    public function formule(Request $request)
    {
        $formule=$request->input('formule');

        $codes=DB::table('codes')
                    ->where('codes.paq_code','=',$request->input('paquet'))
                    ->get();
                   
        $i=0;
        foreach($codes as $code)
        {
            $note1= DB::table('corrections')
                    ->join('paquet_ens','paquet_ens.id','=','corrections.correcteur')
                    ->where('paquet_ens.id_Ens','=',$request->input('corr1'))
                    ->where('code_etu','=',$code->idC)
                    ->first();
            if($note1)
            {
                $notes1[$i]=$note1->note; $i++;
            }else{
                $notes1[$i]=null; $i++;
            }
        }
        
        $i=0;
        foreach($codes as $code)
        {
            $note2= DB::table('corrections')
                    ->join('paquet_ens','paquet_ens.id','=','corrections.correcteur')
                    ->where('paquet_ens.id_Ens','=',$request->input('corr2'))
                    ->where('code_etu','=',$code->idC)
                    ->first();
            if($note2)
            {
                $notes2[$i]=$note2->note; $i++;
            }else{
                $notes2[$i]=null; $i++;
            }
        }

        $j=0;
        for($i=0;$i<count($codes);$i++)
        {
            if($notes1[$i] && $notes2[$i] && abs( $notes1[$i]-$notes2[$i] ) <= $request->input('ecartFormule'))
            {
                $notefinale=Code::find($codes[$i]->idC);
                if($formule == 0)
                {
                    if($notes1[$i] < $notes2[$i])
                    {
                        $notefinale->notefinale=$notes1[$i];
                        $notefinale->save();
                    }else{
                        $notefinale->notefinale=$notes2[$i];
                        $notefinale->save();
                    }
                }
                if($formule == 1)
                {
                    if($notes1[$i] > $notes2[$i])
                    {
                        $notefinale->notefinale=$notes1[$i];
                        $notefinale->save();
                    }else{
                        $notefinale->notefinale=$notes2[$i];
                        $notefinale->save();
                    }   
                }
                if($formule == 2)
                {
                    $notefinale->notefinale=($notes1[$i]+$notes2[$i])/2;
                    $notefinale->save();   
                }
            }
        }
        $Ncodes=DB::table('codes')
                    ->where('codes.paq_code','=',$request->input('paquet'))
                    ->get();
        return $Ncodes;
    }

    public function decoder(Request $request)
    {
        $paquet=Paquet::find($request->input('paquet'));
        $paquet->decode=1;
        $paquet->save();
        $semestre= Semestre::find($request->input('semestre')); 
        
        // return view('EnseignantR.correction.popup',['semestre'=> $semestre,
        // ]);
       return redirect('enseignant/groupes/2');
    }
}
