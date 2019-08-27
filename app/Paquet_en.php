<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquet_en extends Model
{
    public $table = "paquet_ens";
    protected $fillable = ['id','id_Ens','id_paq','valide',];
    protected $primaryKey = 'id';
    public function enseignant()
    {
        return $this->belongsTo('App\enseignant','id_Ens','idEns');
    }
}
