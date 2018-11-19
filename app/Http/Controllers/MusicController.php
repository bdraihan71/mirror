<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;
use \Exception;

class MusicController extends Controller
{
    public function create ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page')->error();

            return redirect('/music');
        }

        return view ('music/create');
    }

    public function store (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this page')->error();

            return redirect('/music');
        }

        $this->validate($request, [
            'name' => 'required|max:100',
            'music' => 'required'
        ]);

        $music = new Music;
        $music->name = $request->name;

        try {
            $music->url = $this->findSRC($request->music);
        }
        catch (\Exception $e) {
            flash('Please enter an embedded link')->error();

            return redirect ('/music/create');
        }

        $music->save();

        flash('Music successfully added')->success();

        return redirect('/music');
    }

    public function index ()
    {
        $musics = Music::orderBy('created_at', 'desc')->paginate(24);

        return view('music/index')->with('musics', $musics);
    }

    public function delete (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/music');
        }

        $music = Music::find($id);
        $music->delete();

        flash('Music successfully deleted')->error();

        return redirect('/music');
    }
}
