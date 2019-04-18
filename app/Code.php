<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function corrections()
    {
        return $this->hasMany('App\Correction');
    }
}
