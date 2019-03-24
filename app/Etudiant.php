<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
<<<<<<< HEAD
    protected $primaryKey = 'idEtu';
    public function groupe()
    {
        return $this->belongsTo('App\groupe','idG','idEtu');
    }
=======
    //
>>>>>>> c4e1145369e76452cbd0cbb862064cf02c7c2f8e
}
