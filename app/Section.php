<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
   protected $primaryKey = 'idSec';
   protected $fillable  = ['idSec','nomSec',];
}
