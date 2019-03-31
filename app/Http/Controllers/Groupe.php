<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

class Groupe extends Controller
{
    public function index()
    {
        $modules=DB::select("SELECT distinct id_module,nom FROM td_tps,modules where id_Ens=1 and modules.idMod=td_tps.id_module");
        $i=0;
        foreach ($modules as $module) {
            $m=$module->id_module;
            $mod[$i]=$module->nom; 
            $groupes[$i]=DB::select("SELECT t.id_groupe
            FROM td_tps t
            where t.id_module = $m
            and t.id_Ens = 1
            group by id_groupe ");
            $i++;
        }
        $groupes1=$groupes[0];$module1=$mod[0];
        if($i==2)
        {
            $groupes2=$groupes[1];     
            $module2=$mod[1];
        }
        else{
            $groupes2=null;     
            $module2=null;
        }
        
        return view('EnseignantR.groupes')->with(
            ['groupes1'=> $groupes1 ,
             'groupes2'=> $groupes2,
             'module1'=>$module1,
             'module2'=>$module2 ]
        );
    }
}
