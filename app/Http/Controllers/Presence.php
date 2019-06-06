<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

use App\Module;
use App\Seance;
use App\Groupe;
use App\Absence;
use App\Etudiant;
use App\Exclu;
use App\TDTP;
use App\Semestre;
use Auth;

class Presence extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function semestre()
    {
        $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
  
        $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();

   
        return view('EnseignantR.semestre',compact('sem1','sem2'));
    }

    public function index($id)
    {
        $modules= DB::table('modules')
                    ->join('td_tps', 'td_tps.id_module', '=', 'modules.idMod')
                    ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                    ->where('semestre',$id)
                    ->distinct()
                    ->get();
        $seances= DB::table('seances')
                    ->join('td_tps', 'td_tps.id_seance', '=', 'seances.idSea')
                    ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                    ->get();
        $groupes= DB::table('groupes')
                    ->join('td_tps', 'td_tps.id_groupe', '=', 'groupes.idG')
                    ->join('groupe_etus', 'groupe_etus.groupe', '=', 'groupes.idG')
                    ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                    ->where('groupe_etus.sem_groupe',$id)
                    ->get();
        
        return view('EnseignantR.popup')->with(
            ['modules'=> $modules ,
            'seances'=> $seances ,
            'groupes'=> $groupes ,
            'idSem'=> $id
             ] 
        );
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
        $justifiations=DB::table('absences')
        ->join('etudiants','absences.id_Etu', '=', 'etudiants.idEtu')
        ->join('td_tps', 'absences.id_td_tp', '=', 'td_tps.id')
        ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
        ->where('td_tps.id_module','=', $idmodule)
        ->where('td_tps.id_groupe','=', $idgroupe)
        ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
        ->where('seances.type','=', $seance->type)
        ->where('absences.justification','<>','')
        ->where('absences.etat_just','=',2)
        ->select('absences.*','etudiants.*')
        ->get();


        // exclus
        $i=0; $j=0;
        $td_tp=DB::table('td_tps')
                ->join('seances', 'td_tps.id_seance', '=', 'seances.idSea')
                ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                ->where('id_groupe','=',$request->input('groupe'))
                ->where('id_module','=',$request->input('module'))
                ->where('seances.type','=', $seance->type)
                ->pluck('id');
                
        $etu=DB::table('absences')
                    ->where('etat','=',0)
                    ->wherein('id_td_tp',$td_tp)
                    ->select('id_Etu')
                    ->distinct()
                    ->get();

        foreach($etu as $e)
        {
            $nb[$i]=DB::table('absences')
                    ->where('id_Etu','=',$e->id_Etu)
                    ->where('etat','=',0)
                    ->count();
            if($nb[$i]>=5)
            {
                $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                $abs[$j]=$nb[$i];
                $j++;
            }
            if($nb[$i]==3)
            {
                $justif=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->whereNull('justification')
                        ->count();
                if($justif==3)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                    $abs[$j]=$nb[$i];
                    $j++;   
                }
                $justifA=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->whereNotNull('justification')
                        ->where('etat_just','=',1)
                        ->count();
                $justifAtt=DB::table('absences')
                ->where('id_Etu','=',$e->id_Etu)
                ->whereNotNull('justification')
                ->where('etat_just','=',2)
                ->count();

                if($justifA<1 && $justifAtt<1)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                    $abs[$j]=$nb[$i];
                    $j++;    
                }
            }
            if($nb[$i]==4)
            {
                $justifA=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->whereNotNull('justification')
                        ->where('etat_just','=',1)
                        ->count();
                $justifAtt=DB::table('absences')
                ->where('id_Etu','=',$e->id_Etu)
                ->whereNotNull('justification')
                ->where('etat_just','=',2)
                ->count();

                if($justifA<2 && $justifAtt<2)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                    $abs[$j]=$nb[$i];
                    $j++;    
                }
            }
            $i++;
        }

        //liste
        $etuExclus = DB::table('exclus')
                    ->pluck('Etu_exc');

        $etudiants = DB::table('etudiants')
                    ->where('idG','=',$idgroupe)
                    ->whereNotIn('idEtu',$etuExclus)
                    ->get();

        $NbEtu = DB::table('etudiants')
                    ->where('idG','=',$idgroupe)
                    ->whereNotIn('idEtu',$etuExclus)
                    ->count();
        
        $section= DB::table('groupe_etus')
                    ->join('sections', 'groupe_etus.sec_groupe', '=', 'sections.idSec')
                    ->where('groupe','=',$groupe->idG) //////////////sem
                    ->take(1)
                    ->get();

        //historique
        $historiques = DB::table('absences')
                    ->join('td_tps', 'absences.id_td_tp', '=', 'td_tps.id')
                    ->where('td_tps.id_seance','=', $idseance)
                    ->where('td_tps.id_module','=', $idmodule)
                    ->where('td_tps.id_groupe','=', $idgroupe)
                    ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
                    ->select('date')
                    ->distinct()
                    ->orderBy('date')
                    ->get();
        $idhistoriques = DB::table('absences')
                    ->join('td_tps', 'absences.id_td_tp', '=', 'td_tps.id')
                    ->where('td_tps.id_seance','=', $idseance)
                    ->where('td_tps.id_module','=', $idmodule)
                    ->where('td_tps.id_groupe','=', $idgroupe)
                    ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
                    ->select('idAbs')
                    ->get();

        $nbrEtu = DB::table('etudiants')
                ->where('idG','=',$idgroupe)
                ->count();
        $i=0;
        foreach($historiques as $h)
        {
            $p[$i]= DB::table('absences')
                            ->join('td_tps', 'absences.id_td_tp', '=', 'td_tps.id')
                            ->where('td_tps.id_seance','=', $idseance)
                            ->where('td_tps.id_module','=', $idmodule)
                            ->where('td_tps.id_groupe','=', $idgroupe)
                            ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
                            ->where('date','=',$h->date)
                            ->where('etat','=',0)
                            ->select('date')
                            ->count();
            $pourcentage[$i]=($p[$i]*100)/$nbrEtu;
                            $i++;
        }

        $id_td_tp=DB::table('td_tps')
                        ->where('td_tps.id_seance','=', $idseance)
                        ->where('td_tps.id_module','=', $idmodule)
                        ->where('td_tps.id_groupe','=', $idgroupe)
                        ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
                        ->first();

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
            'NbEtu' => $NbEtu,
            'nomgroupe' => $nomgroupe,
            'justifications' => $justifiations,
            'exclus' => $exclus , 
            'abs' => $abs,
            'historiques' => $historiques,
            'absents' => $p,
            'pourcentage' => $pourcentage,
            'id_td_tp' => $id_td_tp->id,
            'section' => $section
            ]);

    }

    public function historique($d,$m,$y,$id)
    {
        $date=$d.'/'.$m.'/'.$y;
        $abs = DB::table('absences')
                ->join('etudiants', 'absences.id_Etu', '=', 'etudiants.idEtu')
                ->where('id_td_tp','=',$id)
                ->where('date','=',$date)
                ->get();
        $td_tp = TDTP::find($id);
        $section= DB::table('groupe_etus')
                    ->join('sections', 'groupe_etus.sec_groupe', '=', 'sections.idSec')
                    ->where('groupe','=',$td_tp->id_groupe) //////////////sem
                    ->get();
        $seance = Seance::find($td_tp->id_seance);

        return view('EnseignantR.historique',
        [
            'abs'=> $abs, 
            'td_tp' => $td_tp,
            'section' => $section,
            'seance'=> $seance 
        ] 
    );
    } 

    public function present(Request $request)
    {
        $module=$request->input('module');
        $seance=$request->input('seance');
        $groupe=$request->input('groupe');
        $auth=Auth::user()->enseignant->idEns;
        $td_tp=DB::select("SELECT id FROM td_tps WHERE id_module=$module and id_Ens=$auth and id_groupe=$groupe and id_seance=$seance");
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

        $nbr = DB::table('absences')
                ->where('date','=',$request->input('datep'))
                ->where('id_td_tp','=',$a)
                ->count();

        return response()->json($nbr);
    }

    public function absent(Request $request)
    {
        $module=$request->input('module');
        $seance=$request->input('seance');
        $groupe=$request->input('groupe');
        $auth=Auth::user()->enseignant->idEns;
        $td_tp=DB::select("SELECT id FROM td_tps WHERE id_module=$module and id_Ens=$auth and id_groupe=$groupe and id_seance=$seance");
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

        $nbr = DB::table('absences')
                ->where('date','=',$request->input('datep'))
                ->where('id_td_tp','=',$a)
                ->count();

        return response()->json($nbr);
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
        $auth=Auth::user()->enseignant->idEns;
        $justif=DB::select("SELECT  A.idAbs,A.justification , A.date , A.etat ,E.matricule,E.idEtu,E.type, E.nom ,E.prenom,E.date_naissance FROM absences A,etudiants E WHERE A.id_td_tp in (SELECT id FROM td_tps WHERE id_Ens=$auth) and A.justification IS NOT NULL and A.etat_just=2 and A.id_Etu=E.idEtu");
        return view('EnseignantR.justifications',
            [
                'justifications'=> $justif, 
            ] 
        );
    }

    public function exclus()
    {
        $etudiants=Absence::all();
        $i=0; $j=0;
        $td_tp=DB::table('td_tps')
                ->where('id_Ens','=',Auth::user()->enseignant->idEns)
                ->pluck('id');
                
        $etu=DB::table('absences')
                    ->where('etat','=',0)
                    ->wherein('id_td_tp',$td_tp)
                    ->select('id_Etu')
                    ->distinct()
                    ->get();

        foreach($etu as $e)
        {
            $nb[$i]=DB::table('absences')
                    ->where('id_Etu','=',$e->id_Etu)
                    ->where('etat','=',0)
                    ->count();
            if($nb[$i]>=5)
            {
                $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                $abs[$j]=$nb[$i];
                $j++;
            }
            if($nb[$i]==3)
            {
                $justif=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->whereNull('justification')
                        ->count();
                if($justif==3)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                    $abs[$j]=$nb[$i];
                    $j++;   
                }
                $justifA=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->whereNotNull('justification')
                        ->where('etat_just','=',1)
                        ->count();
                $justifAtt=DB::table('absences')
                ->where('id_Etu','=',$e->id_Etu)
                ->whereNotNull('justification')
                ->where('etat_just','=',2)
                ->count();

                if($justifA<1 && $justifAtt<1)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                    $abs[$j]=$nb[$i];
                    $j++;    
                }
            }
            if($nb[$i]==4)
            {
                $justifA=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->whereNotNull('justification')
                        ->where('etat_just','=',1)
                        ->count();
                $justifAtt=DB::table('absences')
                ->where('id_Etu','=',$e->id_Etu)
                ->whereNotNull('justification')
                ->where('etat_just','=',2)
                ->count();

                if($justifA<2 && $justifAtt<2)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get();
                    $abs[$j]=$nb[$i];
                    $j++;    
                }
            }
            $i++;
        }
        return view('EnseignantR.exclus',["exclus" => $exclus , "abs" => $abs]);
    }

    public function exclure(Request $request)
    {
        $exclus= new Exclu();
        $exclus->Etu_exc=$request->input('etudiant');
        $exclus->module_exc=$request->input('module');
        $exclus->save();

        return response()->json($exclus);

    }
}
