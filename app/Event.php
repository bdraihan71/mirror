<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sponsor;
use App\AdditionalInformation;

class Event extends Model
{
    public function sponsors ()
    {
        return $this->belongsToMany('App\Sponsor');
    }

    public function addInfo ()
    {
        return $this->hasMany('App\AdditionalInformation');
    }
}
