<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TDTP extends Model
{
   public $table = "td_tps";
   protected $fillable = ['id','id_module','id_Ens','id_groupe','id_seance',];
    protected $primaryKey = 'id';


    public function module()
    {
        return $this->belongsTo('App\Module','idMod','id_module');
    }
}
