<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    protected $fillable = ['id','id_module','id_Ens','id_section','id_seance',];
    protected $primaryKey = 'id';
}
