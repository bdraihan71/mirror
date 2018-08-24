<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class AnalyticsController extends Controller
{
    public function events ()
    {
        $events = Event::all()->sortByDesc("created_at");
        $x = array();

        foreach ($events as $event) {
            $y = 0;
            foreach ($event->types as $type) {
                $y += $type->price * count($type->tickets->where('user_id', '!=', null));
            }

            array_push($x, $y);
        }

        return view('analytics/events')->with('events', $events)->with('x', $x);
    }

    public function event (Request $request, $id)
    {
        $event = Event::find($id);
        $tickets = $event->tickets->where('user_id', '!=', null);

        return view('analytics/event')->with('event', $event)->with('tickets', $tickets);
    }
}
