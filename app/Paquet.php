<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquet extends Model
{
    protected $primaryKey = 'idPaq';
    protected $fillable = ['idPaq','nom_paq','salle','paq_Exam','decode'];
     public function exam()
    {
        return $this->belongsTo('App\Examen','paq_Exam','idExam');
    }
}
