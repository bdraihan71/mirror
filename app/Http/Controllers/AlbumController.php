<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoAlbum;
use App\Event;
use App\Album;
use DB;

class AlbumController extends Controller
{
    public function createAlbums () {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page')->error();

            return redirect('/media');
        }

        $ids = DB::table('albums')
                ->select('event_id')
                ->groupBy('event_id')
                ->get();

        foreach ($ids as $id) {
            $album = PhotoAlbum::find($id->event_id);
            if ($album == null) {
                $album = new PhotoAlbum;
                
                if ($id->event_id != 0) {
                    $album->name = Event::find($id->event_id)->name;
                } else {
                    $album->name = 'No Name';
                }

                $album->event_id = $id->event_id;
                $album->save();
            }
        }

        return redirect('/media');
    } 

    public function create ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page')->error();

            return redirect('/media');
        }

        return view('media.create-album');
    }

    public function store (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page')->error();

            return redirect('/media');
        }

        $this->validate($request, [
            'options' => 'required',
        ]);

        if ($request->options == 1) {
            $this->validate($request, [
                'name' => 'required|max:30',
            ]);

            $album = new PhotoAlbum;
            $album->name = $request->name;

            if ($request->event != null) {
                $album->event_id = $request->event;
            } else {
                $album->event_id = 0;
            }

            $album->save();
        } else {
            $this->validate($request, [
                'album' => 'required',
            ]);

            $album = PhotoAlbum::find($request->album);
        }

        $url = '/media/photo/edit?album='.$album->id;

        return redirect($url);
    }

    public function show (Request $request, $id)
    {
        $album = PhotoAlbum::find($id);

        return view('media.show-album')->with('album', $album);
    }
}
