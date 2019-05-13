<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    protected $fillable = ['id','universite','promotion','dep','fac','logo','active',];
    protected $primaryKey = 'id';
}
