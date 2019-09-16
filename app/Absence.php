<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $primaryKey = 'idAbs';
   protected $fillable = [ 'id_td_tp','id_Etu','justification','etat', 'date', 'etat_just', ];
     public function tdtp()
    {
         return $this->belongsTo('App\TDTP','id_td_tp');
         
    }
    public function etu()
    {
         return $this->belongsTo('App\Etudiant','id_Etu');
         
    }
}
