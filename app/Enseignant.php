<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
<<<<<<< HEAD
{
  protected $fillable = ['idEns','nom','prenom','grade','profil',];
    protected $primaryKey = 'idEns';

{  public function users()
	{
		return $this->hasMany(User::class);
	}

}
