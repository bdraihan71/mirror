<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventsController extends Controller
{
    public function show (Request $request, $id)
    {
        $event = Event::where('id', $id)->first();

        dd($event);
    }

    public function create ()
    {
        return view('events/create');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $event = new Event;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->tagline = $request->tagline;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->img_1 = $request->url_1;
        $event->img_2 = $request->url_2;
        $event->save();

        //need to implement tickets

        $url = '/events/'.$event->id;
        
        return redirect($url)->with('success', 'Event has been created');
    }
}
