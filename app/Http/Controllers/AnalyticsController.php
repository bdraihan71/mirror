<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;
use App\IssueTicket;
use Exception;

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

    public function barcodePresent (Request $request)
    {
        $barcode = null;
        $type = null;
        $url = '/analytics/events/'.$request->event;
        $number = null;
        $ticket = null;

        try {
            $barcode = explode(' ', $request->barcode);
            $type = $barcode[0];
            $event = $barcode[1];
            $number = $barcode[2];
        } catch (Exception $e) {
            flash('The entered infomation is invalid')->error();

            return redirect($url);
        }
        
        $message = "New present marked";

        if ($type == 1) {
            $ticket = Ticket::find($number);

            if ($ticket->user_id == null) {
                flash('The entered infomation is invalid')->error();

                return redirect($url);
            }

            try {
                if ($ticket->present == null || $ticket->present == 1) {
                    $ticket->present = 2;
                } else {
                    $ticket->present = 1;
                    $message = "Present unmarked";
                }
            } catch (Exception $e) {
                flash('The entered infomation is invalid')->error();

                return redirect($url);
            }
        } else {
            $ticket = IssueTicket::find($number);

            try {
                if ($ticket->present) {
                    $ticket->present = false;
                    $message = "Present unmarked";
                } else {
                    $ticket->present = true;
                }
            } catch (Exception $e) {
                flash('The entered infomation is invalid')->error();

                return redirect($url);
            }
        }

        $ticket->save();

        flash($message);

        return redirect($url);
    }
}
