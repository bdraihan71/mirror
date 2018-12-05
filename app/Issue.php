<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Issue extends Model
{
    public function cart ()
    {
        return $this->hasMany('App\Cart');
    }
}
