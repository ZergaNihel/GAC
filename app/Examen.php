<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $fillable  = ['idExam','idSem','type','delais','formule','sujet','corrige_type','module_Exam',];
    protected $primaryKey = 'idExam';
         public function sem_ann()
    {
        return $this->belongsTo('App\Semestre','idSem','idSem');
    }
}
