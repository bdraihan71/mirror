<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Purchase;

class Product extends Model
{
    public function purchases ()
    {
        return $this->hasMany('App\Purchase');
    }
}
