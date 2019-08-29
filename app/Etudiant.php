<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
     protected $primaryKey = 'idEtu';
    protected $fillable = [ 'idEtu','matricule','nom', 'prenom', 'date_naissance', 'type', 'idG', ];

     public function users()
	{
		return $this->hasMany(User::class);
    }
    

	
     public function user_mail()
	{
		return $this->hasOne(User::class);
	}


   
    public function groupe()
    {
        return $this->belongsTo('App\groupe','idG','idG');
    }
    //

   /* public function user_mail(){
        return $this->hasMany('App\User', 'id_Etu', 'idEtu');
    }*/

}
