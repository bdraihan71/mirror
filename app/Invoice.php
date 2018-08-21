<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ticket;

class Invoice extends Model
{
    public function ticket ()
    {
        return $this->hasOne('App\Ticket');
    }
}
