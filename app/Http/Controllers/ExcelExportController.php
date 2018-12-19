<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Excel;
use App\Exports\TicketsExport;

class ExcelExportController extends Controller
{
    public function ticket ()
    {
        if (auth()->user()->role != 'super-admin') {
            flash('You are not authorized to access this view')->error();

            return redirect('/home');
        }

        $events = Event::all();

        return view ('exports.select-event')->with('events', $events);
    }

    public function exportTicket (Request $request)
    {
        if (auth()->user()->role != 'super-admin') {
            flash('You are not authorized to access this view')->error();

            return redirect('/home');
        }

        $this->validate($request, [
            'event' => 'required',
        ]);

        $event = Event::find($request->event);

        if ($event == null) {
            flash('No such event found')->error();

            return back();
        } elseif (count($event->tickets) == 0 && count($event->issues) == 0) {
            flash('This event has no tickets or issued tickets')->error();

            return back();
        }

        return (new TicketsExport($request->event))->download($event->name.'.xlsx');
    }
}
