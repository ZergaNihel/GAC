<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable  = ['id','att','ex','file_name','id_msg',];
    public $table = "medias";
}
