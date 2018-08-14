<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Ticket;

class TicketType extends Model
{
    public function event ()
    {
        return $this->belongsTo('App\Event');
    }

    public function tickets ()
    {
        return $this->hasMany('App\Ticket');
    }
}
