<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Section;
use App\Semestre;
use App\Groupe;
use App\Groupe_Etu;
use App\Paquet;
use App\Module;
use App\Etudiant;
use Auth;


class Deliberation extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index($id){
   
        $section = Groupe_etu::where('sem_groupe','=',$id)->select('sec_groupe')->distinct()->get();
        
        $controle = DB::table('paquets')
                    ->join('examens', 'paquets.paq_Exam', '=', 'examens.idExam')
                    ->join('modules', 'examens.module_Exam', '=', 'modules.idMod')
                    ->where('examens.type','=','Controle')
                    ->where('modules.ens_responsable','=',Auth::user()->enseignant->idEns)
                    ->where('modules.semestre',$id)
                    ->where('decode','=',1)
                    ->get();

        $examen = DB::table('paquets')
                    ->join('examens', 'paquets.paq_Exam', '=', 'examens.idExam')
                    ->join('modules', 'examens.module_Exam', '=', 'modules.idMod')
                    ->where('examens.type','=','Examen')
                    ->where('modules.ens_responsable','=',Auth::user()->enseignant->idEns)
                    ->where('modules.semestre',$id)
                    ->where('decode','=',1)
                    ->get();
        $i=0; $nbEtuCC=null;
        foreach ($controle as $c ) {
            $nbEtuCC[$i]= DB::table('codes')
                            ->join('paquets', 'paquets.idPaq', '=', 'codes.paq_code')
                            ->where('codes.paq_code','=',$c->idPaq)
                            ->count();
            $i++;
        }

        $i=0; $tauxCC=null;
        foreach ($controle as $c ) {
            $t= DB::table('codes')
                            ->where('codes.paq_code','=',$c->idPaq)
                            ->where('codes.notefinale','>',10)
                            ->count();
            $tauxCC[$i]=($t*100) / $nbEtuCC[$i];
            $i++;
        }
       
        $i=0; $nbEtuEx=null;
        foreach ($examen as $c ) {
            $nbEtuEx[$i]= DB::table('codes')
                            ->join('paquets', 'paquets.idPaq', '=', 'codes.paq_code')
                            ->where('codes.paq_code','=',$c->idPaq)
                            ->count();
            $i++;
        }

        $i=0; $tauxEx=null;
        foreach ($examen as $c ) {
            $t= DB::table('codes')
                            ->where('codes.paq_code','=',$c->idPaq)
                            ->where('codes.notefinale','>',10)
                            ->count();
            $tauxEx[$i]=($t*100) / $nbEtuEx[$i];
            $i++;
        }
        
        $semestre= Semestre::find($id); 

        
        if(Auth::user()->role == '3')
        {
            return view('EnseignantR.notes')->with(
            ['semestre' => $semestre,
            'section' => $section,
            'controle' => $controle,
            'examen' => $examen,
            'tauxEx' => $tauxEx,
            'tauxCC' => $tauxCC,
            'nbEtuCC' => $nbEtuCC,
            'nbEtuEx' => $nbEtuEx]);
        }
        else
        {
            return view('Erreur403');
        }
    }

    function detail($id,$p){
        $etudiants= DB::table('codes')
                    ->join('etudiants', 'etudiants.matricule', '=', 'codes.etu_code')
                    ->join('groupes', 'etudiants.idG', '=', 'groupes.idG')
                    ->where('codes.paq_code','=',$p)
                    ->get();
//return $etudiants[0]->type;
        $semestre= Semestre::find($id); 

        $paquet= Paquet::find($p);

       
        if(Auth::user()->role == '3')
        {
            return view('EnseignantR.notes_detail')->with(
            ["etudiants" => $etudiants,
            'semestre' => $semestre,
                'paquet' => $paquet]);
        }
        else
        {
            return view('Erreur403');
        }
    }
}
