<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Album;
use App\Video;
use Carbon\Carbon;

class MediaController extends Controller
{
    public function index ()
    {
        $now = new Carbon;
        $albums = Album::paginate(24);
        $videos = Video::paginate(9);

        return view('media/index')->with('albums', $albums)->with('videos', $videos);
    }

    public function addPhoto ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/media');
        }

        $es = Event::orderBy('created_at', 'desc')->get();
        $events = array();

        foreach ($es as $e) {
            if (count($e->album) == 0) {
                array_push($events, $e);
            }
        }

        if (sizeof($events) == 0) {
            flash('Please create an event first')->error();

            return redirect('/events/create');
        }

        return view('media/photo-add')->with('events', $events);
    }

    public function storePhoto (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error();

            return redirect('/media');
        }

        $counter = 0;

        foreach ($request->url as $url) {
            $album = new Album;

            $filenameWithExt = $url->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $url->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $url->storeAs('public/uploadedImg', $fileNameToStore);
            $album->url = $url->move('public/uploadedImg', $fileNameToStore);
            $album->caption = $request->caption[$counter];
            $album->event_id = $request->event;
            $counter++;
            $album->save();
        }

        flash('Images have been successfully stored')->success();

        return redirect('/media');
    }

    public function showAlbums ()
    {
        $events = Event::orderBy('date_end', 'desc')->get();

        return view('media/show-albums')->with('events', $events);
    }

    public function editAlbum (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error;
        }

        if ($request->event == null) {
            return view('media/event-select')->with('events', Event::all())->with('url', '/media/photo/edit');
        } else {
            return view('media/edit-album')->with('event', Event::find($request->event));
        }
    }

    public function updateAlbum (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error;
        }

        $event = Event::find($request->id);
        $counter = 0;

        foreach ($event->album as $album) {
            $album->caption = $request->caption[$counter];
            $album->save();

            $counter++;
        }

        if ($request->hasfile('all')) {
            $url = $request->all;
            $album = new Album;

            $filenameWithExt = $url->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $url->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $url->storeAs('public/uploadedImg', $fileNameToStore);
            $album->url = $url->move('public/uploadedImg', $fileNameToStore);
            $album->event_id = $request->id;
            $album->caption = $request->cap;

            $album->save();
        }

        $url = '/media/photo/edit?event='.$request->id;

        flash('Updates successfully made')->success();

        return redirect ($url);
    }

    public function deletePhoto (Request $request, $id)
    {
        $album = Album::find($id);
        $url = '/media/photo/edit?event='.$album->event->id;
        $album->delete();

        flash('Photo successfully deleted');

        return redirect($url);
    }

    public function addVideo ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/media');
        }

        $es = Event::orderBy('created_at', 'desc')->get();
        $events = array();

        if (sizeof($events) == 0) {
            flash('Please create an event first')->error();

            return redirect('/events/create');
        }

        return view('media/video-add')->with('events', $events);
    }

    public function storeVideo (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/media');
        }

        $video = new Video;
        $video->event_id = $request->event;
        $video->featured = true;
        $video->url = $this->findSRC($request->url);
        $video->timestamps = false;
        $video->save();

        $url = '/media/video/edit?='.$request->event;

        return redirect($url);
    }

    public function editVideo (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error;
        }

        if ($request->event == null) {
            return view('media/event-select')->with('events', Event::all())->with('url', '/media/video/edit');
        } else {
            return view('media/edit-video')->with('event', Event::find($request->event));
        }
    }

    public function updateVideo (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error;
        }

        $event = Event::find($request->id);
        $counter = 0;

        foreach ($event->videos as $video) {
            $url = explode(' ', $request->url[$counter]);
            $i = 0;
            $flag = false;

            for ($i = 0; $i < sizeof($url); $i++) {
                if (strpos($url[$i], 'src') !== false) {
                    break;
                    $flag = true;
                }
            }

            if ($flag) {
                $video->url = $this->findSRC($request->url[$counter]);
                $video->timestamps = false;
                $video->save();
            }

            $counter++;
        }

        if ($request->new != null) {
            $video = new Video;
            $video->url = $this->findSRC($request->new);
            $video->event_id = $request->id;
            $video->featured = false;
            $video->timestamps = false;
            $video->save();
        }

        $url = '/media/video/edit?event='.$request->id;

        flash('Updates successfully made')->success();

        return redirect ($url);
    }

    public function deleteVideo (Request $request, $id)
    {
        $video = Video::find($id);
        $url = '/media/video/edit?event='.$album->event->id;
        $album->delete();

        flash('Video successfully deleted');

        return redirect($url);
    }

    public function findSRC ($url)
    {
        $url = explode(' ', $url);
        $i = 0;
        $flag = true;

        for ($i = 0; $i < sizeof($url); $i++) {
            if (strpos($url[$i], 'src') !== false) {
                break;
                $flag = false;
            }
        }

        if (!$flag) {
            dd('This is not an embedded link');
        }

        $url = str_split($url[$i], 1);
        $x = '';

        for ($j = 5; $j < sizeof($url) - 1; $j++) {
            $x = $x.$url[$j];
        }

        return $x;
    }
}
