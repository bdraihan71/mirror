<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    public function create ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to view this page')->error();

            return redirect('/clients');
        }

        return view('clients/add')->with('footer', $this->footer());;
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'url' => 'image|required|max:3000|mimes:jpeg,png,jpg,gif,svg',
            'type' => 'required',
            'name' => 'required|max:80',
            'feedback' => 'required|max:255',
            'company' => 'required|max:80'
        ]);

        if ($this->notAdmin()) {
            flash('You are not authorized to view this page')->error();

            return redirect('/clients');
        }

        $partner = new Client;
        $partner->name = $request->name;
        $partner->feedback = $request->feedback;
        $partner->type = $request->type;
        $partner->company = $request->company;
        $partner->img = $this->uploadImage($request->url);
        $partner->save();

        flash('Client successfully created')->success();

        return redirect('/clients');
    }

    public function showAll ()
    {
        $local_clients = Client::where('type', 'local')->get();
        $int_clients = Client::where('type', 'international')->get();

        return view('clients/show-all')->with('local_clients', $local_clients)->with('int_clients', $int_clients)->
        with('footer', $this->footer());
    }

    public function edit (Request $request, $id)
    {
        $client = Client::find($id);

        return view('clients/edit')->with('client', $client)->with('footer', $this->footer());
    }

    public function update (Request $request, $id)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this view')->error();

            return redirect('/');
        }

        $this->validate($request, [
            'url' => 'image|nullable|max:3000|mimes:jpeg,png,jpg,gif,svg',
            'type' => 'required',
            'name' => 'required|max:80',
            'feedback' => 'required|max:255',
            'company' => 'required|max:80'
        ]);

        $client = Client::find($id);

        $client->name = $request->name;
        $client->type = $request->type;
        $client->company = $request->company;
        $client->feedback = $request->feedback;
        
        if ($request->hasFile('url')) {
            $client->img = $this->updateImage($request->url, $client->img);
        }

        $client->save();

        return redirect('/clients');
    }

    public function delete (Request $request, $id)
    {
        $partner = Client::find($id);
        $partner->delete();

        return redirect('/clients');
    }
}
