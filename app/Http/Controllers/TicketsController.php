<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TicketType;
use App\Ticket;
use App\Event;
use App\EventAnswer;
use PDF;

class TicketsController extends Controller
{
    public function typeSelect (Request $request, $id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this');
        }

        $event = Event::where('id', $id)->first();

        return view('tickets/type')->with('event', $event)->with('footer', $this->footer());
    }

    public function create (Request $request)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this');
        }
        
        $types = $request->type;
        $numbers = $request->number;
        $prices = $request->price;

        for ($i = 0; $i < sizeof($types); $i++) {
            $type = new TicketType;
            $type->event_id = $request->id;
            $type->name = $types[$i];
            $type->price = $prices[$i];
            $type->save();

            for ($j = 0; $j < $numbers[$i]; $j++) {
                $ticket = new Ticket;
                $ticket->event_id = $request->id;
                $ticket->ticket_type_id = $type->id;
                $ticket->save();
            }
        }

        $tickets = Ticket::where('event_id', $request->id)->get();
        $url = '/events/'.$request->id;

        return redirect($url);
    }

    public function show (Request $request, $id)
    {
        $types = TicketType::where('event_id', $id)->get();
        dd($types);
        // $ticket = Ticket::where('id', $id)->first();

        // dd($ticket);
    }

    public function buy (Request $request, $id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)->first();

        if ($ticket != null) {
            $url = '/events/'.$id;
            return redirect($url)->with('error', 'You cannot buy more than one ticket for an event');
        }

        $types = TicketType::where('event_id', $id)->get();

        return view('tickets/buy')->with('types', $types)->with('id', $id)->with('footer', $this->footer());
    }

    public function purchase (Request $request, $id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)->where('event_id', $id)->first();

        if ($ticket != null) {
            $url = '/events/'.$id;

            return redirect($url)->with('error', 'You cannot buy more than one ticket for an event');
        }

        $type = TicketType::where('id', $request->type)->first();
        $url = '/payment/session/'.$type->id;

        return redirect($url);
    }

    public function print (Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $user = auth()->user();

        return view('tickets/ticket')->with('ticket', $ticket)->with('user', $user);
    }

    public function showAll ()
    {
        $user = auth()->user();
        $tickets = Ticket::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return view ('tickets/show-all')->with('tickets', $tickets);
    }
}
