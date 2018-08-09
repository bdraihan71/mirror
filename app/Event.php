<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sponsor;

class Event extends Model
{
    public function sponsors ()
    {
        return $this->belongsToMany('App\Sponsor');
    }
}
