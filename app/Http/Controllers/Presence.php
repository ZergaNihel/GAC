<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\support\Facades\DB;
use App\Module;
use App\User;
use App\Seance;
use App\Groupe;
use App\Absence;
use App\Etudiant;
use App\Exclu;
use App\TDTP;
use App\Semestre;
use Auth;
use Notification;
use App\Notifications\AcceptNotifications;
use App\Notifications\RefuseNotifications;
use App\Notifications\ExclusNotifications;
use App\Notifications\NotificationBeforeExclus;

class Presence extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
                    ->select('modules.*')
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
        $semestre = Semestre::find($id);
  
        return view('EnseignantR.popup')->with(
            ['modules'=> $modules ,
            'seances'=> $seances ,
            'groupes'=> $groupes ,
            'idSem'=> $id,
            'semestre'=> $semestre,
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
        $auth=Auth::user()->enseignant->idEns;
        $justifiations=DB::select("SELECT  A.idAbs,A.justification , A.date , A.etat_just 
                                            ,E.matricule,E.idEtu,E.type, E.nom ,E.prenom,E.date_naissance 
                                    FROM absences A,etudiants E 
                                    WHERE A.id_td_tp in (SELECT id FROM td_tps WHERE id_Ens=$auth) 
                                    and A.justification IS NOT NULL and A.id_Etu=E.idEtu");

        $etuExclus = DB::table('exclus')
                    ->pluck('Etu_exc');

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

        $exclus=null; $abs=null; $p=null; $pourcentage=null;

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
                            ->distinct()
                            ->get();
                $j++;
            }
            if($nb[$i]==3)
            {
                $justif=DB::table('absences')
                        ->where('id_Etu','=',$e->id_Etu)
                        ->where('etat','=',0)
                        ->whereNull('justification')
                        ->count();
                if($justif==3)
                {
                    $exclus[$j]=DB::table('etudiants')
                            ->where('idEtu','=',$e->id_Etu)
                            ->get(); 
                    $j++;
                }else{
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
                        $j++;
                    }
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
                    $j++; 
                }
            }
            $i++;
        }
        //liste

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
            $pp=($p[$i]*100)/$nbrEtu;
            $pourcentage[$i] = number_format($pp, 2, '.', '');
            $i++;
        }
       
        $id_td_tp=DB::table('td_tps')
                        ->where('td_tps.id_seance','=', $idseance)
                        ->where('td_tps.id_module','=', $idmodule)
                        ->where('td_tps.id_groupe','=', $idgroupe)
                        ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
                        ->first();

        $semestre= Semestre::find($request->input('semestre')); 
        $u=0;
       foreach ($exclus as $e ) {
           $t[$u]=$e[0]->idEtu;$u++;
       }
       $tabExc= Exclu::all()->pluck('Etu_exc');
       $exc=DB::table('etudiants')
                ->whereIn('idEtu',$t)
                ->whereNotIn('idEtu',$tabExc)
                ->distinct()
                ->get();
                $i=0;
        foreach ($exc as $c ) {
            $abs[$i]=DB::table('absences')
                    ->where('id_Etu',$c->idEtu)
                    ->where('etat',0)
                    ->count(); 
            $i++;
        }
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
            'exclus' => $exc, 
            'abs' => $abs,
            'historiques' => $historiques,
            'absents' => $p,
            'pourcentage' => $pourcentage,
            'id_td_tp' => $id_td_tp->id,
            'section' => $section,
            'semestre'=> $semestre,
            ]);

    }

    public function historique($d,$m,$y,$idh,$id)
    {
        $date=$d.'/'.$m.'/'.$y;
        $abs = DB::table('absences')
                ->join('etudiants', 'absences.id_Etu', '=', 'etudiants.idEtu')
                ->where('id_td_tp','=',$idh)
                ->where('date','=',$date)
                ->get();
        $td_tp = TDTP::find($idh);
        $section= DB::table('groupe_etus')
                    ->join('sections', 'groupe_etus.sec_groupe', '=', 'sections.idSec')
                    ->where('groupe','=',$td_tp->id_groupe) //////////////sem
                    ->get();
        $seance = Seance::find($td_tp->id_seance);

        $semestre = Semestre::find($id);

        return view('EnseignantR.historique',
        [
            'abs'=> $abs, 
            'td_tp' => $td_tp,
            'section' => $section,
            'seance'=> $seance,
            'semestre'=> $semestre,
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
          
$nbEx = Absence::where('etat',0)
                 ->where('id_Etu',$request->input('etudiant'))
                 ->join('td_tps','id_td_tp','id')
                 ->join('seances','id_seance','idSea')
                 ->where('id_module',$module)
                 ->where('id_groupe',$groupe)
                 ->where('seances.type','td')
                 ->count();
                // return $nbEx;
if($nbEx == 4){
    $m = Module::find($module);
        $details = [
            'id_mod' => $module,
            'module' => $m->nom,
        ];
        $user = User::where('id_Etu',$request->input('etudiant'))->get();
        Notification::send($user, new NotificationBeforeExclus($details));
        

}
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
        $m = Module::find($justification->tdtp->id_module);
        $details = [
            'id_mod' => $justification->tdtp->id_module,
            'module' => $m->nom,
            'nomEns' => Auth::user()->enseignant->nom,
            'prenomEns' => Auth::user()->enseignant->prenom,
        ];
        $user = User::where('id_Etu',$justification->id_Etu)->get();
        Notification::send($user, new AcceptNotifications($details));
        return response()->json($justification);
        
    }

    public function refuserJ(Request $request)
    {
        $justification = Absence::find($request->input('idjustification'));
        $justification->etat_just=0;
        $justification->save();
        $m = Module::find($justification->tdtp->id_module);
        $details = [
            'id_mod' => $justification->tdtp->id_module,
            'module' => $m->nom,
            'nomEns' => Auth::user()->enseignant->nom,
            'prenomEns' => Auth::user()->enseignant->prenom,
        ];
        $user = User::where('id_Etu',$justification->id_Etu)->get();
        Notification::send($user, new RefuseNotifications($details));
        return response()->json($justification);
        
    }

    public function justification($id)
    {
        $auth=Auth::user()->enseignant->idEns;
        $justif=DB::select("SELECT  A.idAbs,A.justification , A.date , A.etat_just 
                                    ,E.matricule,E.idEtu,E.type, E.nom ,E.prenom,E.date_naissance 
                            FROM absences A,etudiants E 
                            WHERE A.id_td_tp in (SELECT id FROM td_tps WHERE id_Ens=$auth) 
                            and A.justification IS NOT NULL and A.id_Etu=E.idEtu");
        $semestre = Semestre::find($id);
        
        return view('EnseignantR.justifications',
            [
                'justifications'=> $justif, 
                'semestre'=> $semestre
            ] 
        );
    }

    public function exclus($id)
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
        $semestre = Semestre::find($id);
        return view('EnseignantR.exclus',
                    ["exclus" => $exclus , 
                    "abs" => $abs,
                    'semestre'=> $semestre]);
    }

    public function listeExclus($id)
    {
        $idexclus=DB::table('exclus')
                    ->join('td_tps', 'exclus.module_exc', '=', 'td_tps.id_module')
                    ->where('td_tps.id_ens','=', Auth::user()->enseignant->idEns)
                    ->select('Etu_exc','module_exc')
                    ->groupby('module_exc','Etu_exc')
                    ->distinct()
                    ->pluck('Etu_exc');
        $exclus= DB::table('etudiants')
                    ->join('exclus', 'exclus.Etu_exc', '=', 'etudiants.idEtu')
                    ->join('modules', 'exclus.module_exc', '=', 'modules.idMod')
                    ->wherein('idEtu',$idexclus)
                    ->select('etudiants.nom as nomEtu','etudiants.*','modules.nom as nomMod')
                    ->orderBy("modules.nom")
                    ->get(); 

        $l=0;
        foreach ($exclus as $e) {
            $nbabs[$l]=Absence::where('id_Etu','=',$e->idEtu)->where('etat','=',0)->count();
            $l++;
        }
                    
        $semestre = Semestre::find($id);
        return view('EnseignantR.exclus',
                    ["exclus" => $exclus , 
                    "nbabs" => $nbabs , 
                    'semestre'=> $semestre]);
    }

    public function exclure(Request $request)
    {
        $exclus= new Exclu();
        $exclus->Etu_exc=$request->input('etudiant');
        $exclus->module_exc=$request->input('module');
        $exclus->save();
        $m = Module::find($request->input('module'));
        $details = [ 'module' => $m->nom, ];
        $user = User::where('id_Etu',$request->input('etudiant'))->get();
        Notification::send($user, new ExclusNotifications($details));
         
        return response()->json($exclus);

    }
}
