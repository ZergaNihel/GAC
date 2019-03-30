<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
	protected $primaryKey= 'idEtu';
	
     public function users()
	{
		return $this->hasMany(User::class);
	}
}
