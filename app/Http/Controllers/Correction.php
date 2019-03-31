<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\support\Facades\DB;

class Correction extends Controller
{
    public function index()
    {
        $paquets = DB::table('paquet_ens as pe')
                    ->join('paquets as p','pe.id_paq','=','p.idPaq')
                    ->join('td_tps as t','pe.id_Ens','=','t.id_Ens')
                    ->select('pe.*')
                    ->get();  
        return view('EnseignantR.correction.popup')->with(
            ['paquets'=> $paquets 
             ] 
        );
    }
}
