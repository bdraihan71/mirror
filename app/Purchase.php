<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Purchase extends Model
{
    public function product ()
    {
        return $this->belongsTo('App\Product');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
