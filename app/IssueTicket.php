<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class IssueTicket extends Model
{
    protected $fillable = ['event_id', 'email', 'name', 'company', 'designation', 'phone', 'present'];

    public function event ()
    {
        return $this->belongsTo('App\Event');
    }
}
