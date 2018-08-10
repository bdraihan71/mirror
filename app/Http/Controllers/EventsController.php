<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    public function create ()
    {
        return view('events/create');
    }

    public function store (Request $request)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->tagline = $request->tagline;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->save();

        $url = '/events/'.$event->id;
        
        return redirect($url)->with('success', 'Event has been created');
    }
}
