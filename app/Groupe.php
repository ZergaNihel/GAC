<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $primaryKey = 'idG';
    public function etudiants()
    {
        return $this->hasMany('App\Etudiant','','idG');
    }
    //
}
