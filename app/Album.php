<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PhotoAlbum;

class Album extends Model
{
    public function album ()
    {
        return $this->belongsTo('App\PhotoAlbum', 'event_id');
    }

    public function featured ()
    {
        return $this->hasOne('App\PhotoAlbum', 'featured_id');
    }
}
