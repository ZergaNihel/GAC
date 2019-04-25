<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    public function codes()
    {
        return $this->belongsTo('App\codes','code_etu','idC');
    }
}
