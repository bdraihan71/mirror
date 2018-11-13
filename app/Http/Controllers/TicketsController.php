<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Invoice;
use App\User;
use App\TicketType;
use App\Ticket;
use App\Event;
use App\EventAnswer;
use Mail;
use App\Mail\TicketPurchase as vMail;
use PDF;

class TicketsController extends Controller
{
    public function typeSelect (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();
            return redirect('/');
        }

        $event = Event::where('id', $id)->first();

        if ($event->ticket_number == 0) {
            $url = $url = '/events/'.$event->id;

            flash('Event Created')->success();

            return redirect($url);
        }

        return view('tickets/type')->with('event', $event)->with('footer', $this->footer());
    }

    public function create (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();
            return redirect('/');
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
        $ticket = Ticket::where('user_id', auth()->user()->id)->where('event_id', $id)->first();

        if ($ticket != null) {
            $url = '/events/'.$id;
            flash('You cannot buy more than one ticket for an event')->error();
            return redirect($url);
        }

        $types = TicketType::where('event_id', $id)->get();
        $t = array();

        foreach ($types as $type) {
            $tickets = Ticket::where('ticket_type_id', $type->id)->whereNull('user_id')->get();

            if (count($tickets) != 0) {
                array_push($t, $type);
            }
        }

        return view('tickets/buy')->with('types', $t)->with('id', $id)->with('footer', $this->footer());
    }

    public function purchase (Request $request, $id)
    {
        $ticket = Ticket::where('user_id', auth()->user()->id)->where('event_id', $id)->first();

        if ($ticket != null) {
            $url = '/events/'.$id;
            flash('You cannot buy more than one ticket for an event')->error();
            return redirect($url);
        }

        $t = Ticket::where('ticket_type_id', $id)->whereNull('user_id')->get();

        if ($t == null) {
            flash('Sorry, this ticket type has been sold out')->error();
            $type = TicketType::find($id);
            $url = '/ticket/buy/'.$type->event_id;

            return redirect($url);
        }

        $type = TicketType::find($id);

        if ($type->price == 0) {    
            $now = new Carbon;
            $now = $now->format('Ymd');
            $total_tickets = count(Ticket::where('event_id', $type->event->id)->get());
            $unsold_tickets = count(Ticket::where('event_id', $type->event->id)->whereNull('user_id')->get());
            $barcode = $now.time().$id;

            $invoice = new Invoice;
            $invoice->number = ($total_tickets - $unsold_tickets + 1);
            $invoice->barcode = $barcode;
            $invoice->save();

            $ticket = Ticket::where('event_id', $type->event->id)->where('ticket_type_id', $type->id)->whereNull('user_id')->first();
            $ticket->user_id = auth()->user()->id;
            $ticket->invoice_id = $invoice->id;
            $ticket->save();

            Mail::to(auth()->user()->email)->send(new vMail(auth()->user(), $ticket));

            flash('Ticket successfully purchased')->success();

            return redirect('/');
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
