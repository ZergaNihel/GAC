<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
     protected $fillable = ['idSem','nomSem','annee','active',];
    protected $primaryKey = 'idSem';
  
}
