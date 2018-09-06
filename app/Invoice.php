<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;
use App\Address;

class Invoice extends Model
{
    public function ticket ()
    {
        return $this->hasOne('App\Ticket');
    }

    public function address ()
    {
        return $this->hasOne('App\Address');
    }
}
