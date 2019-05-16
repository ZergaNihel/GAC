<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['id','sujet','msg','id_emt','id_rcpt'];
  
   public function Emt()
    {
        return $this->belongsTo('App\User','id_emt','id');
    }
      public function Rcp()
    {
        return $this->belongsTo('App\User','id_rcpt','id');
    }
}
