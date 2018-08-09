<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Sponsor extends Model
{
    public function events ()
    {
        return $this->belongsToMany('App\Event');
    }
}
