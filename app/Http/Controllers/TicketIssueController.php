<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\IssueTicket;
use App\Mail\TicketIssue as vMail;
use Mail;

class TicketIssueController extends Controller
{
    public function create ()
    {
        if (auth()->user()->role != 'super-admin') {
            flash('You are not authorized to access this view')->error();

            return redirect('/home');
        }

        $events = Event::all();

        return view('issues/create')->with('events', $events);
    }
    
    public function store (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error();

            return redirect('/home');
        }

        $this->validate($request, [
            'event' => 'required',
            'name' => 'required',
            'email' => 'required',
            'company' => 'nullable',
            'phone' => 'nullable',
            'present' => 'nullable',
            'designation' => 'nullable',
        ]);

        $ticket = IssueTicket::create([
            'event_id' => $request->event,
            'name' => $request->name,
            'company' => $request->company,
            'designation' => $request->designation,
            'phone' => $request->phone,
            'email' => $request->email,
            'present' => false,
        ]);

        if ($request->email != null) {
            Mail::to($request->email)->queue(new vMail($ticket));
        }

        flash('Ticket Successfully Issued')->success();

        $url = '/issue/show/'.$ticket->id;

        return redirect($url);
    }

    public function show (Request $request, $id)
    {
        return view('issues/show')->with('ticket', IssueTicket::find($id));
    }
}
