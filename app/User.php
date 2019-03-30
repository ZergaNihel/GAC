<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   

    protected $fillable = ['email', 'password','role','id_Etu',];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    

     public function etudiant()
    {

        //foreign key de role-id dans la table users
       // return $this->belongsTo('App\Etudiant','idEtu','id_Etu','id');
         //return $this->belongsTo('App\Etudiant');
         return $this->belongsTo('App\Etudiant','id_Etu');
         
    }
    public function enseignant()
    {

        
         return $this->belongsTo('App\Enseignant','id_Ens');
         
    }
}
