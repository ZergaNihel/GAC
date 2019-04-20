<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{  public function users()
	{
		return $this->hasMany(User::class);
	}
    protected $primaryKey= 'idEns';
}
