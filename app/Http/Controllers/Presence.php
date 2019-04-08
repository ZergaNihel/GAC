<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Module;
use App\Seance;
use App\Groupe;
use App\Absence;
use Auth;

class Presence extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function lister(Request $request)
    {
        //select
        $modules= Module::all();
        $seances= Seance::all();
        $groupes= Groupe::all();
        
        $idgroupe = $request->input('groupe');
        $idmodule = $request->input('module');
        $idseance = $request->input('seance');

        // popup result
        $seance = Seance::find($request->input('seance'));
        $module= Module::find($request->input('module')); 
        $groupe= Groupe::find($idgroupe);
         
        $nomgroupe = $groupe->nomG;
        
        //justifiation
        $justif=DB::table('absences')
        ->join('etudiants','absences.id_Etu', '=', 'etudiants.idEtu')
        ->join('td_tps', 'absences.id_td_tp', '=', 'td_tps.id')
        ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
        ->where('td_tps.id_module','=', $idmodule)
        ->where('td_tps.id_groupe','=', $idgroupe)
        ->where('td_tps.id_ens','=', 1)
        ->where('seances.type','=', $seance->type)
        ->where('absences.justification','<>','')
        ->where('absences.etat_just','=',2)
        ->select('absences.*','etudiants.*')
        ->get();


        // // //exclus
        // $seanceType= Seance::where('type',$seance->type)->get();
        // //return $seanceType;
        // foreach($seanceType as $seanceType){
        // $td_tp=DB::select("SELECT id FROM td_tps WHERE 
        // id_module=$idmodule and id_Ens=1 and id_groupe=$idgroupe 
        // and id_seance = $seanceType->idSea");}
        // return $td_tp;
        // foreach($td_tp as $td_tp){
        //     $exclus=DB::select("SELECT id_Etu, count(etat) , count(justification) FROM absences WHERE id_td_tp=$td_tp->id and etat=0 GROUP BY id_Etu");
        // }
        //     return $exclus;
        // $k= DB::table('absences')
        // ->join('etudiants', 'absences.id_Etu', '=', 'etudiants.idEtu')
        // ->join('td_tps', 'absences.id_td_tp', '=', 'td_tps.id')
        // ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
        // ->where('td_tps.id_module','=', $idmodule)
        // ->where('td_tps.id_groupe','=', $idgroupe)
        // ->where('td_tps.id_ens','=', 1)
        // ->where('seances.type','=', $seance->type)
        // ->where('absences.etat','=', '0')
        // ->select('absences.*','etudiants.*')
        // ->get();
        // return $k;

        //liste
        $etudiants = DB::select("SELECT * FROM etudiants WHERE idG = $idgroupe"); 

        
        return view('EnseignantR.presence')->with( 
            [
            'seance'=> $seance ,
            'idseance'=> $idseance ,
            'idmodule'=> $idmodule ,
            'idgroupe' => $idgroupe,
            'modules'=> $modules ,
            'seances'=> $seances ,
            'groupes'=> $groupes,
            'etudiants' => $etudiants,
            'nomgroupe' => $nomgroupe,
            'justifications' => $justif
            ]);

    }


    public function index()
    {
        $modules= Module::all();
        $seances= Seance::all();
        $groupes= Groupe::all();
        $etudiants=NULL;
        
        return view('EnseignantR.popup')->with(
            ['modules'=> $modules ,
            'seances'=> $seances ,
            'groupes'=> $groupes,
            'etudiants' => $etudiants
             ] 
        );
    }

    public function present(Request $request)
    {
        $module=$request->input('module');
        $seance=$request->input('seance');
        $groupe=$request->input('groupe');

        $td_tp=DB::select("SELECT id FROM td_tps WHERE id_module=$module and id_Ens=1 and id_groupe=$groupe and id_seance=$seance");
        foreach($td_tp as $td_tp){
            $a=$td_tp->id;
        }
        $existe= DB::table('absences')
        ->where('absences.id_td_tp','=', $a)
        ->where('absences.id_Etu','=', $request->input('etudiant') )
        ->where('absences.date','=', $request->input('datep'))
        ->select('absences.idAbs')
        ->get();
        
        if(count($existe)){
            foreach($existe as $existe){
                $e=$existe->idAbs;
            }
            $present = Absence::find($e);
            $present->etat=1;
        }
        else
        {
            $present= new Absence();
            $present->id_td_tp=$a;
            $present->id_Etu=$request->input('etudiant');
            $present->etat=1;
            $present->date=$request->input('datep');
        }
        
        $present->save();
        return response()->json($present);
    }

    public function absent(Request $request)
    {
        $module=$request->input('module');
        $seance=$request->input('seance');
        $groupe=$request->input('groupe');

        $td_tp=DB::select("SELECT id FROM td_tps WHERE id_module=$module and id_Ens=1 and id_groupe=$groupe and id_seance=$seance");
        foreach($td_tp as $td_tp){
            $a=$td_tp->id;
        }
        $existe= DB::table('absences')
        ->where('absences.id_td_tp','=', $a)
        ->where('absences.id_Etu','=', $request->input('etudiant') )
        ->where('absences.date','=', $request->input('datep'))
        ->select('absences.idAbs')
        ->get();
        
        if(count($existe)){
            foreach($existe as $existe){
                $e=$existe->idAbs;
            }
            $present = Absence::find($e);
            $present->etat=0;
        }
        else
        {
            $present= new Absence();
            $present->id_td_tp=$a;
            $present->id_Etu=$request->input('etudiant');
            $present->etat=0;
            $present->date=$request->input('datep');
        }
        $present->save();
        return response()->json($present);
    }

    public function accepterJ(Request $request)
    {
        $justification = Absence::find($request->input('idjustification'));
        $justification->etat_just=1;
        $justification->save();
        return response()->json($justification);
        
    }

    public function refuserJ(Request $request)
    {
        $justification = Absence::find($request->input('idjustification'));
        $justification->etat_just=0;
        $justification->save();
        return response()->json($justification);
        
    }

    public function justification()
    {
        $justif=DB::select("SELECT  A.idAbs,A.justification , A.date , A.etat ,E.matricule,E.idEtu,E.type, E.nom ,E.prenom,E.date_naissance FROM absences A,etudiants E WHERE A.id_td_tp in (SELECT id FROM td_tps WHERE id_Ens=1 ) and A.justification IS NOT NULL and A.etat_just=2 and A.id_Etu=E.idEtu");
        return view('EnseignantR.justifications',
            [
                'justifications'=> $justif, 
            ] 
        );
    }

    public function exclus()
    {
        $seance=Seance::find(1);
        $td_tp=DB::select("SELECT id from td_tps where id_groupe = 1 and id_module=1 and id_Ens=1 and id_seance in (select idSea from seances where type ='$seance->type' ) ");

            $abs=DB::select("SELECT id_Etu , etat , idAbs from absences where etat=0 and id_td_tp in 
                            (SELECT id from td_tps where id_groupe = 1 and id_module=1 and 
                            id_Ens=1 and id_seance in (select idSea from seances 
                                                        where type ='$seance->type' )) ");
                                            
        return $abs;
        
    }
}
