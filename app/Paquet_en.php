<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquet_en extends Model
{
    public $table = "paquet_ens";
    public function enseignant()
    {
        return $this->belongsTo('App\enseignant','id_Ens','idEns');
    }
}
