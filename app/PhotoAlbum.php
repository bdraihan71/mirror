<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;
use App\Event;

class PhotoAlbum extends Model
{
    public function photos ()
    {
        return $this->hasMany('App\Album', 'event_id');
    }

    public function event ()
    {
        return $this->belongsTo('App\Event');
    }

    public function featured ()
    {
        return $this->belongsTo('App\Album', 'featured_id');
    }
}
