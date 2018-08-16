<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\User;
use App\Question;

class EventAnswer extends Model
{
    public function event ()
    {
        return $this->belongsTo('App\Event');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function question ()
    {
        return $this->belongsTo('App\Question');
    }
}
