<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;
use App\AdditionalInformation;
use App\Question;

class EventsController extends Controller
{
    public function show (Request $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $tickets = Ticket::where('event_id', $id)->get();
        $flow = false;

        foreach ($tickets as $ticket) {
            if ($ticket->user_id == null) {
                $flow = true;
                break;
            }
        }

        return view('events/show')->with('event', $event)->with('flow', $flow);
    }

    public function create ()
    {
        return view('events/create');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $event = new Event;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->tagline = $request->tagline;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->img_1 = $request->url_1;
        $event->img_2 = $request->url_2;
        $event->ticket_number = $request->ticket_number;
        $event->save();

        //need to implement tickets
        //ceate tickets in DB
        
        return view('events/add-info')->with('id', $event->id)->with('information', null);
    }

    public function addInfo (Request $request)
    {
        $this->validate($request, [
            'information' => 'required',
        ]);

        $info = new AdditionalInformation;
        $info->name = $request->name;
        $info->info = $request->information;
        $info->event_id = $request->id;
        $info->save();

        $information = AdditionalInformation::where('event_id', $request->id)->get();

        return view('events/add-info')->with('id', $request->id)->with('information', $information);
    }

    public function addQ (Request $request, $id)
    {
        return view('events/add-q')->with('id', $id)->with('questions', null);
    }

    public function storeQ (Request $request)
    {
        $question = new Question;
        $question->question = $request->question;
        $question->event_id = $request->id;
        $question->save();

        $questions = Question::where('event_id', $request->id)->get();

        return view('events/add-q')->with('id', $request->id)->with('questions', $questions);
    }

    public function edit (Request $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $information = AdditionalInformation::where('event_id', $id)->get();
        $questions = Question::where('event_id', $id)->get();
        $add_flow = false;
        $q_flow = false;

        if ($request->add_flow == 'true') {
            $add_flow = true;
        }

        if ($request->q_flow == 'true') {
            $q_flow = true;
        }

        return view('events/edit')->with('event', $event)->with('information', $information)->
        with('questions', $questions)->with('add_flow', $add_flow)->with('q_flow', $q_flow);
    }

    public function eStore (Request $request, $id) {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $event = Event::where('id', $id)->first();
        $event->name = $request->name;
        $event->location = $request->location;
        $event->tagline = $request->tagline;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->img_1 = $request->url_1;
        $event->img_2 = $request->url_2;
        $event->ticket_number = $request->ticket_number;
        $event->save();

        $url = '/events/edit/'.$event->id;

        return redirect($url);
    }

    public function addStore (Request $request, $id)
    {
        $information = AdditionalInformation::where('event_id', $id)->get();
        $url = '/events/edit/'.$id.'#add';

        for ($i = 0; $i < count($information); $i++) {
            $information[$i]->name = $request->add_name[$i];
            
            if ($request->add_information[$i] != null) {
                $information[$i]->info = $request->add_information[$i];
            } else {
                $information[$i]->info = 'None provided';
            }

            $information[$i]->event_id = $request->id;
            $information[$i]->save();
        }

        if (count($information) != count($request->add_name)) {
            $info = new AdditionalInformation;
            $info->name = $request->add_name[count($request->add_name) - 1];
            $info->info = $request->add_information[count($request->add_name) - 1];
            $info->event_id = $id;
            $info->save();
        }

        return redirect($url);
    }

    public function qStore (Request $request, $id)
    {
        $questions = Question::where('event_id', $id)->get();
        $url = '/events/edit/'.$id.'#q';

        for ($i = 0; $i < count($questions); $i++) {
            $questions[$i]->question = $request->question[$i];
            $questions[$i]->save();
        }

        if (count($questions) != count($request->question)) {
            $question = new Question;
            $question->question = $request->question[count($questions)];
            $question->event_id = $id;
            $question->save();
        }

        return redirect($url);
    }

    public function addInfoD (Request $request, $id)
    {
        $info = AdditionalInformation::where('id', $id)->first();
        $url = '/events/edit/'.$info->event_id.'#add';
        $info->delete();

        return redirect($url);
    }

    public function questionD (Request $request, $id)
    {
        $question = Question::where('id', $id)->first();
        $url = '/events/edit/'.$question->event_id.'#q';
        $question->delete();

        return redirect($url);
    }

    public function delete (Request $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $information = AdditionalInformation::where('event_id', $id)->get();
        $questions = Question::where('event_id', $id)->get();

        foreach ($information as $info) {
            $info->delete();
        }

        foreach ($questions as $question) {
            $question->delete();
        }

        $event->delete();

        return redirect('/')->with('success', 'Event deleted');
    }
}
