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
        $ticket = new IssueTicket;
        $ticket->event_id = $request->event;
        $ticket->name = $request->name;
        $ticket->company = $request->company;
        $ticket->designation = $request->designation;
        $ticket->phone = $request->phone;
        $ticket->email = $request->email;
        $ticket->save();

        if ($request->email != null) {
            Mail::to($request->email)->send(new vMail($ticket));
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
