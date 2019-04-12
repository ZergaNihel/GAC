<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	protected $fillable = ['idMod','nom','code','type','ens_responsable','semestre',];
    protected $primaryKey = 'idMod';
    public function sem1()
    {
        return $this->belongsTo('App\Semestre','semestre','idSem');
    }
}
