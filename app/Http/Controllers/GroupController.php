<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use App\Section;


class GroupController extends Controller
{  public function __construct()
    {
        $this->middleware('auth');
    }
	function index(){
		$sections = Section::all();
		 return view('admin.groupes', compact('sections'));
	}
   
    function import(Request $request)
    {

      $tab[]=null; 

     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();

     $data = Excel::load($path)->get();
     
     if($data->count() > 0)
     {
      foreach($data->toArray() as $key => $value)
      {
        $i=0; 
       foreach($value as $row)
       {  $tab[$i]=$row; $i++;
      
       }
       $insert_data[] = array(
        'matricule'  => $tab[0],
        'nom'   => $tab[1],
        'prenom'   => $tab[2],
        'type'   => $tab[3],
        'date_naissance'  => $tab[4]
       );
      }
      
      //return $tab;

      if(!empty($insert_data))
      {
       DB::table('etudiants')->insert($insert_data);
      }
     }
     return back()->with('success', 'Excel Data Imported successfully.');
    }

}
