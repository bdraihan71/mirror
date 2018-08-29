<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Purchase;
use App\Cart;

class Product extends Model
{
    public function cart ()
    {
        return $this->hasMany('App\Cart');
    }
}
