<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TicketType;
use App\Ticket;
use App\Event;

class TicketsController extends Controller
{
    public function typeSelect (Request $request, $id)
    {
        $event = Event::where('id', $id)->first();

        return view('tickets/type')->with('event', $event);
    }

    public function create (Request $request)
    {
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
}
