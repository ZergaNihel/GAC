<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{

	
     public function users()
	{
		return $this->hasMany(User::class);
	}

    protected $primaryKey = 'idEtu';
    public function groupe()
    {
        return $this->belongsTo('App\groupe','idG','idEtu');
    }
    //

}
