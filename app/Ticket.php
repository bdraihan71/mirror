<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\User;
use App\TicketType;

class Ticket extends Model
{
    public function event ()
    {
        return $this->belongsTo('App\Event');
    }

    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function type ()
    {
        return $this->belongsTo('App\TicketType', 'ticket_type_id');
    }
}
