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



   
    protected $primaryKey = 'id';
    protected $fillable = ['id','email', 'password','role','id_Etu','id_Ens','photo','matricule'];


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
         return $this->belongsTo('App\Etudiant','id_Etu');
         
    }
    public function enseignant()
    {

        
         return $this->belongsTo('App\Enseignant','id_Ens');
         
    }
}
