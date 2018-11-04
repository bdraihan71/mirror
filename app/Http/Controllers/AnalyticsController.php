<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;
use App\IssueTicket;

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
    
    public function present (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error();

            return redirect('/');
        }

        $ticket = Ticket::where('id', $id)->first();
        
        if ($ticket->present == null || $ticket->present == 1) {
            $ticket->present = 2;
        } else {
            $ticket->present = 1;
        }

        $ticket->save();
        $url = '/analytics/events/'.$ticket->event->id;

        return redirect($url);
    }

    public function issuePresent (Request $request, $id)
    {
        $issue = IssueTicket::find($id);

        if ($issue->present) {
            $issue->present = false;
        } else {
            $issue->present = true;
        }

        $issue->save();

        $url = '/analytics/events/'.$issue->event->id;

        return redirect($url);
    }
}
