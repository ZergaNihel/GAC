<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exclu extends Model
{
    public $table = "exclus";
    protected $fillable = ['id','Etu_exc','module_exc',];
    protected $primaryKey = 'id';
    public function module()
    {
         return $this->belongsTo('App\Module','module_exc');
         
    }
    public function etu()
    {
         return $this->belongsTo('App\Etudiant','Etu_exc');
         
    }
}
