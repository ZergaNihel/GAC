<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

class Groupe extends Controller
{
    public function index()
    {
        $groupes=DB::select("SELECT nomG 
                                FROM groupes 
                                WHERE idG in
                                (SELECT id_groupe
                                FROM td_tps
                                WHERE id_Ens = 1 
                                GROUP BY id_module) ");
        return $groupes;
    }
}
