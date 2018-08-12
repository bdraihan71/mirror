<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\AdditionalInformation;

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
        //ceate tickets in DB
        
        return view('events/add-info')->with('id', $event->id);
    }

    public function addInfo (Request $request)
    {
        $this->validate($request, [
            'information' => 'required',
        ]);

        $info = new AdditionalInformation;
        $info->name = $request->name;
        $info->info = $request->information;
        $info->event_id = $request->id;
        $info->save();

        return view('events/add-info')->with('id', $request->id);
    }

    public function addQ (Request $request, $id)
    {
        return view('events/add-q')->with('id', $id);
    }

    public function storeQ (Request $request)
    {
        dd('here');
    }
}
