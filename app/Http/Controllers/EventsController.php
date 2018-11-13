<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Ticket;
use App\AdditionalInformation;
use App\Question;
use App\Album;
use App\Video;
use App\WebContent;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function show (Request $request, $id)
    {
        if ($id == 'all' || $id == 'past' || $id == 'upcoming') {
            return $this->showAll($id);
        }
        $event = Event::where('id', $id)->first();
        $tickets = Ticket::where('event_id', $id)->get();
        $flow = false;

        if (auth()->user() == null) {
            if ($event->deleted) {
                flash('Sorry, the event you want is unavailable.')->error();
    
                return redirect('/events');
            }
        } elseif ($this->notAdmin()) {
            if ($event->deleted) {
                flash('Sorry, the event you want is unavailable.')->error();
    
                return redirect('/events');
            }
        }

        foreach ($tickets as $ticket) {
            if ($ticket->user_id == null) {
                $flow = true;
                break;
            }
        }

        $now = new Carbon;

        if ($event->date_start < $now->format('Y-m-d')) {
            $flow = false;
        }

        $album = Album::where('event_id', $id)->get();
        $video = Video::where('event_id', $id)->first();

        return view('events/show')->with('event', $event)->with('flow', $flow)->with('footer', $this->footer())->
        with('album', $album)->with('video', $video);
    }

    public function showAll ($range)
    {
        $now = new Carbon;
        $id = WebContent::find(19);
        $e = null;

        if ($id != null) {
            $e = Event::find($id->content);
        }

        if (auth()->user() == null) {
            $events = Event::where('date_start', '>=', $now->copy()->format('Y-m-d'))->orderBy('date_start')->whereNull('deleted')->get();
            if ($range == 'all') {
                $events = Event::whereNull('deleted')->get();
                $type = 'All';
            } elseif ($range == 'past') {
                $events = Event::where('date_start', '<', $now->copy()->format('Y-m-d'))->orderBy('date_start')->whereNull('deleted')->get();
                $type = 'Past';
            } else {
                $type = 'Upcoming';
            }
        } elseif (!$this->notAdmin()) {
            $events = Event::where('date_start', '>=', $now->copy()->format('Y-m-d'))->orderBy('date_start')->get();

            if ($range == 'all') {
                $events = Event::all();
                $type = 'All';
            } elseif ($range == 'past') {
                $events = Event::where('date_start', '<', $now->copy()->format('Y-m-d'))->orderBy('date_start')->get();
                $type = 'Past';
            } else {
                $type = 'Upcoming';
            }
        } else {
            $events = Event::where('date_start', '>=', $now->copy()->format('Y-m-d'))->orderBy('date_start')->whereNull('deleted')->get();

            if ($range == 'all') {
                $events = Event::whereNull('deleted')->get();
                $type = 'All';
            } elseif ($range == 'past') {
                $events = Event::where('date_start', '<', $now->copy()->format('Y-m-d'))->orderBy('date_start')->whereNull('deleted')->get();
                $type = 'Past';
            } else {
                $type = 'Upcoming';
            }
        }

        return view('events/show-all')->with('e', $e)->with('events', $events)->with('type', $type);
    }

    public function create ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        return view('events/create')->with('footer', $this->footer());
    }

    public function store (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $this->validate($request, [
            'description' => 'required',
            'url_1' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg',
            // 'url_2' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg',
            'url_3' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg',
            'url_4' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg',
            'url_5' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg'
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
        $event->img_1 = $this->uploadImage($request->url_1);
        // $event->img_2 = $this->uploadImage($request->url_2);
        $event->img_3 = $this->uploadImage($request->url_3);
        $event->img_4 = $this->uploadImage($request->url_4);
        $event->img_5 = $this->uploadImage($request->url_5);

        $event->ticket_number = $request->ticket_number;
        $event->save();
        
        return view('events/add-info')->with('id', $event->id)->with('information', array())->with('footer', $this->footer());
    }

    public function addInfo (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $this->validate($request, [
            'information' => 'required|max:50',
            'name' => 'required|max:500'
        ]);

        $info = new AdditionalInformation;
        $info->name = $request->name;
        $info->info = $request->information;
        $info->event_id = $request->id;
        $info->save();

        $information = AdditionalInformation::where('event_id', $request->id)->get();

        return view('events/add-info')->with('id', $request->id)->with('information', $information)->with('footer', $this->footer());
    }

    public function addQ (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        return view('events/add-q')->with('id', $id)->with('questions', array())->with('footer', $this->footer());
    }

    public function storeQ (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $this->validate($request, [
            'question' => 'required|max:200',
        ]);

        $question = new Question;
        $question->question = $request->question;
        $question->event_id = $request->id;
        $question->save();

        $questions = Question::where('event_id', $request->id)->get();

        return view('events/add-q')->with('id', $request->id)->with('questions', $questions)->with('footer', $this->footer());
    }

    public function edit (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

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
        with('questions', $questions)->with('add_flow', $add_flow)->with('q_flow', $q_flow)->with('footer', $this->footer());
    }

    public function eStore (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();
            
            return redirect('/');
        }

        $this->validate($request, [
            'description' => 'required',
        ]);

        $event = Event::where('id', $id)->first();

        if ($request->hasFile('url_1')) {
            $event->img_1 = $this->uploadImage($request->url_1);
        }

        if ($request->hasFile('url_2')) {
            $event->img_2 = $this->uploadImage($request->url_2);
        }

        if ($request->hasFile('url_3')) {
            $event->img_3 = $this->uploadImage($request->url_3);
        }

        if ($request->hasFile('url_4')) {
            $event->img_4 = $this->uploadImage($request->url_4);
        }

        if ($request->hasFile('url_5')) {
            $event->img_5 = $this->uploadImage($request->url_5);
        }

        $event->name = $request->name;
        $event->location = $request->location;
        $event->tagline = $request->tagline;
        $event->date_start = $request->date_start;
        $event->date_end = $request->date_end;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->description = $request->description;
        $event->save();

        $url = '/events/edit/'.$event->id;

        return redirect($url);
    }

    public function addStore (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();
            
            return redirect('/');
        }

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
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

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
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();
            
            return redirect('/');
        }

        $info = AdditionalInformation::where('id', $id)->first();
        $url = '/events/edit/'.$info->event_id.'#add';
        $info->delete();

        return redirect($url);
    }

    public function questionD (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $question = Question::where('id', $id)->first();
        $url = '/events/edit/'.$question->event_id.'#q';
        $question->delete();

        return redirect($url);
    }

    public function destroy (Request $request, $id)
    {
        $event = Event::find($id);
        $event->deleted = true;
        $event->save();
        $url = '/events/'.$id;
        flash('Event Successfully Deleted')->success();

        return redirect($url);
    }

    public function restore (Request $request, $id)
    {
        $event = Event::find($id);
        $event->deleted = null;
        $event->save();
        $url = '/events/'.$id;
        flash('Event Successfully Restored')->success();

        return redirect($url);
    }

    public function feature ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page.')->error();

            return redirect('/events');
        }

        $events = Event::all();

        return view('events.select-feature')->with('events', $events);
    }

    public function featured (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page.')->error();

            return redirect('/events');
        }

        $feature = WebContent::find(19);
        
        if ($feature == null) {
            $feature = new WebContent;
        }

        $feature->content = $request->event;
        $feature->save();

        flash('Event Successfully Featured')->success();

        return redirect('/events');
    }
}
