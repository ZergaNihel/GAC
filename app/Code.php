<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $primaryKey = 'idC';
    public function corrections()
    {
        return $this->hasMany('App\Correction');
    }
}
