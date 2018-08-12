<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class AdditionalInformation extends Model
{
    public function event ()
    {
        return $this->belongsTo('App\Event');
    }
}
