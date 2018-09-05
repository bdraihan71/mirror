<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Video extends Model
{
    public function event ()
    {
        return $this->belongsTo('App\Event');
    }
}
