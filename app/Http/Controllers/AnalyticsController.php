<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class AnalyticsController extends Controller
{
    public function events ()
    {
        $events = Event::all();
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
}
