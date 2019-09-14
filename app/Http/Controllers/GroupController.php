<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Section;
use App\Semestre;
use App\Groupe;
use App\Groupe_etu;
use App\Module;
use App\Etudiant;
use App\Endette;
use App\User;
use Session;
//use Datatables;
use Illuminate\Support\Facades\Validator;
class GroupController extends Controller

{
   public function __construct()
    {
        $this->middleware('auth');
    }

	function index($id){
		$sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
	  $semestre = Semestre::find($id);
    $section = Groupe_etu::where('sem_groupe','=',$id)->select('sec_groupe')->distinct()->get();
    $sections = Section::all();

		 return view('admin.groupes', compact('semestre','section','sections','sem1','sem2'));
	}
  
	function groupe($id,$idSem){
    $sem1 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 1')->get();
    $sem2 = Semestre::where('active','=',1)->where('nomSem','=','Semestre 2')->get();
		$etudiants = Etudiant::where('idG','=',$id)->get();
	  $semestre = Semestre::find($idSem);
    $grp = Groupe::find($id);
    //dd($semestre);
		$modules = Module::where('semestre','=',$idSem)->get();
    $sec = Groupe_etu::where('groupe',$id)->get();		//dd($modules);
	
		 return view('admin.groupe_det', compact('modules','etudiants','sem1','sem2','semestre','id','grp','sec'));
	}
function edit(Request $request){
  $messages1 = ['required'    => "Vous devez remplir le champ \":attribute\"",];

	  $this->validate($request, [
      'groupe' => 'required',
      'section' => 'required'
    ],$messages1);
        
	$idG = $request->idGrp;
	$idGrp_etu = $request->idGrp_etu;
	$grp = Groupe::find($idG);
	$grp->nomG = $request->groupe;
	$grp->save();
	$grp_etu = Groupe_etu::where('sec_groupe','=',$idGrp_etu)->where('groupe','=',$idG)->get();
	foreach ($grp_etu as $grp) {
		$grp->sec_groupe = $request->section;
	    $grp->save();
	}
    return back()->with('succ', 'le groupe a été bien modifié .');        
}

   public function editStud($id)
    {
        $etu = Etudiant::find($id);
$mods = 0;
      if($etu->type === "Répétitif(ve)" || $etu->type === "Endétté(e)"){
     $mods = Endette::where("Etu_end",$id)->select('module_end')->get();
    
     }
        return response()->json(['etu' =>$etu ,'mods' =>$mods] );
    }

	function new_student(Request $request)
    {  
      $attributes = [
        'nom'    => 'Nom',
        'prenom'=> "Prénom",
        'matricule'=>"Matricule",
        "birthday"=>"Date de naissance",
        "type"=>"Type",
    ];
   $messages = [
    'required'    => 'Vous devez remplir le champ ":attribute".',
    'alpha_spaces'=> "Le champ \":attribute\" doit contenir que les caractéres",
    'unique'=>"Le matricule doit être unique",
    "numeric"=>"Le matricule doit contenir que les chiffres",
];
   $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_spaces',
            'prenom' => 'required|alpha_spaces',
            'matricule' => 'required|numeric|unique:etudiants|max:9',
            'birthday'  => 'required ',
             'type'  => 'required ',
        ],$messages,$attributes);
 
        if ($validator->fails()) {
             return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }

     $type = $request->type;
 
    	//dd($request->type);
      $etud = Etudiant::Create(["matricule"=>$request->matricule,"nom"=>$request->nom,"prenom"=>$request->prenom,"type"=>$request->type,"date_naissance"=>$request->birthday,"idG"=>$request->groupe,]);
      //dd();
    if($type === "Répétitif(ve)" || $type === "Endétté(e)"){
    	$modules = $request->input('modules');
    	//dd($modules);
   	foreach ($modules as $key) {
    	$cour = new Endette();
    	$cour->Etu_end= $etud->idEtu;
    	$cour->module_end = $key;
    	$cour->save();
    	 }
    	}

    	return  response()->json(['etud' => $etud]);

    }
      function update_student(Request $request)
    {  
      $id = $request->id_stud;
     $etud = Etudiant::find($id);
     $rules = [
            'nom' => 'required|alpha_spaces ',
            'prenom' => 'required|alpha_spaces ',
            'matricule' => 'required|numeric|unique:etudiants',
            'birthday'  => 'required ',
             'type'  => 'required ',
        ];
        $rulesM = [
            'nom' => 'required|alpha_spaces ',
            'prenom' => 'required|alpha_spaces ',
            'matricule' => 'required|numeric',
            'birthday'  => 'required ',
             'type'  => 'required ',
        ];
   $messages = [
    'required'    => 'Vous devez remplir tous les champs.',
    'alpha_spaces'=> "Le :attribute doit contenir que les caractéres",
    'unique'=>"Le matricule doit être unique",
    "numeric"=>"Le matricule doit contenir que les chiffres",
];
if($etud->matricule == $request->matricule){
   $validator = Validator::make($request->all(),$rulesM,$messages);} 
     else{
   $validator = Validator::make($request->all(),$rules,$messages);}
 
        if ($validator->fails()) {
             return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }
   
     $etud->matricule = $request->matricule;
     $etud->nom = $request->nom;
     $etud->prenom = $request->prenom;
     $etud->type = $request->type;
     $etud->date_naissance = $request->birthday;
     $etud->save();
      //dd();
    if($request->type === "Répétitif(ve)" || $request->type === "Endétté(e)"){ 
      $mods = Endette::where("Etu_end",$id)->get();
      foreach ($mods as $key) {
        $key->delete();
      }

      $modules = $request->input('modules');
      //dd($modules);
    foreach ($modules as $key) {
      $cour = new Endette();
      $cour->Etu_end= $etud->idEtu;
      $cour->module_end = $key;
      $cour->save();
       }
      }

      return  response()->json(['sucess' => "hello"]);

    }
   
    function import(Request $request)
    {
      $attribute1 = [
        "select_file" => "liste d'étudiants",
    ];
      $messages1 = [
        'required'    => "Vous devez remplir le champ \":attribute\"",
        'mimes' => "Le champ \":attribute\" doit être de type: \":values\".",
    ];
      $validator1 = Validator::make($request->all(), [
        'section' => 'required',
        'groupe' => 'required',
        'select_file' => 'required|mimes:xlsx',
      ],$messages1,$attribute1);

    if ($validator1->fails()) {
      return response()->json(['errors'=> $validator1->getMessageBag()->toArray()],422);
    }

    $tab[]=null; 
    $groupe = $request->groupe;
    $section = $request->section;
    
    $path = $request->file('select_file')->getRealPath();
    $data = Excel::load($path)->get();
    if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
                 $i=0; 
              foreach($value as $row)
              {  $tab[$i]=$row; $i++; }
      $check_data[] = array(
        'matricule'  => $tab[0],
        'nom'   => $tab[1],
        'prenom'   => $tab[2],
        'type'   => $tab[3],
        'date_naissance'  => $tab[4]);
   
      }
      
      if(!empty($check_data))
      {
        //dd(count($insert_data));
        $m=1;
        for($i=0;$i<count($check_data);$i++){
        $messages = [
    'required'    => "Vous devez remplir le champs \":attribute\" dans la ligne ".$m,
    'alpha_spaces'=> "Le champ :attribute doit contenir que les caractéres dans la ligne ".$m,
    'unique'=>"Le matricule doit être unique dans le fichier excel dans la ligne ".$m,
    "numeric"=>"Le matricule doit contenir que les chiffres dans la ligne ".$m,
];

   $validator = Validator::make( $check_data[$i], [
            'nom' => 'required',
            'prenom' => 'required',
            'matricule' => 'required|numeric|unique:etudiants',
            'date_naissance'  => 'required ',
            'type'  => 'required ',
        ],$messages);
 
        if ($validator->fails()) {
           return response()->json(['errors'=> $validator->getMessageBag()->toArray()],422);
        }
       // dd($insert_data[0]);
       $m++;
 
      }
    $k = Groupe::create(['nomG'=> $groupe,]);	
    $grp_etu  = Groupe_etu::create(['sem_groupe'=>$request->idsemestre,'sec_groupe'=>$section,'groupe'=>$k->idG,]);
      foreach($data->toArray() as $key => $value)
      {
                 $i=0; 
              foreach($value as $row)
              {  $tab[$i]=$row; $i++; }
     
       $insert_data[] = array(
        'matricule'  => $tab[0],
        'nom'   => $tab[1],
        'prenom'   => $tab[2],
        'type'   => $tab[3],
        'date_naissance'  => $tab[4],
        'idG'  => $k->idG
       );
      }
      DB::table('etudiants')->insert($insert_data);
      }
     }
     //return redirect('groupe/detail/'.$k->idG.'/'. $request->idsemestre);
     return response()->json(['idSem'=> $request->idsemestre,'idG'=>$k->idG]);
    }
      function statistique ($id){
      	//dd($id);
    	$k1 =$id;
    	$nbr = Etudiant::where('idG','=',$k1)->count();
    	$endette = Etudiant::where('idG','=',$k1)->where('type','=','Endetté(e)')->count();
    	$repetitif = Etudiant::where('idG','=',$k1)->where('type','=','Répétitif(ve)')->count();
    	$nouveau = Etudiant::where('idG','=',$k1)->where('type','=','Nouveau(elle)')->count();
    	return response()->json(["id"=>$id,"nbr"=>$nbr,"endette"=>$endette,"repetitif"=>$repetitif,"nouveau"=>$nouveau,]);
    }
    function delete(Request $request){
    	$id= $request->input('idGrpDel');
        //dd($id);
        $mat = Groupe::find($id);
        //dd($mat);
        $mat->delete();
        	return  response()->json(['success' => 'deleting wordwrap(str)ith success','id'=>$id]);

    }



    public function index1($id)
{
 
  $students = Etudiant::select('idEtu','nom','prenom','matricule','date_naissance','type')
                        ->where('idG','=',$id)
                        ->get();
     return Datatables::of($students) ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->idEtu.'" class="edit btn btn-primary btn-sm edit"><i class="fa fa-pencil"></i></button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button class="edit btn btn-danger btn-sm edit" data-toggle="modal" data-id="'.$data->idEtu.'" data-nom="'.$data->nom.'" data-prenom="'.$data->prenom.'"   data-target="#delete" > <i class="fa fa-trash "></i></button>';
                      $button .= '&nbsp;&nbsp;';
                      $user = User::where('id_Etu',$data->idEtu)->get();
                      foreach ($user as $u) {
  $button .='<a  href="#"  id="'.$u->id.'" class="vue"><button type="button" class="edit btn btn-info btn-sm "><i class="fa fa-eye"></i></button></a >';
                      }
                 
                      

                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->smart(true)
                    ->make(true);
}
  public function destroy($id)
    {
        Etudiant::find($id)->delete();
     
        return response()->json(['success'=>'Student deleted successfully.']);
    }

}