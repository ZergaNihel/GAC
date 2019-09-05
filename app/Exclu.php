<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exclu extends Model
{
    public $table = "exclus";
    protected $fillable = ['id','Etu_exc','module_exc',];
    protected $primaryKey = 'id';
}
