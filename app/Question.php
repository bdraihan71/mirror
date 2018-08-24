<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\EventAnswer;

class Question extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function answers ()
    {
        return $this->hasMany('App\EventAnswer');
    }
}
