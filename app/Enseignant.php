<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model

{
  protected $fillable = ['idEns','nom','prenom','grade','profil',];
    protected $primaryKey = 'idEns';

  public function ensUser1()
	{
		return $this->hasOne('App\User','id_Ens','idEns');		
  }
  
  public function moduleR1()
  {
    return $this->hasMany('App\Module','ens_responsable','idEns');
  }

}
