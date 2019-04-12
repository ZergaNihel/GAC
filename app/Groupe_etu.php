<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe_etu extends Model
{
   
	protected $fillable  = ['id','sem_groupe','sec_groupe','groupe',];
    public $table = "groupe_etus";

     public function section()
    {
        return $this->belongsTo('App\Section','sec_groupe','idSec');
    }
     public function groupe1()
    {
        return $this->belongsTo('App\Groupe','groupe','idG');
    }
}
