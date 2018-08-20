<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Cart extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function product ()
    {
        return $this->belongsTo('App\Product');
    }
}
