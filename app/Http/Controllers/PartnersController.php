<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnersController extends Controller
{
    public function create ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to view this page')->error();

            return redirect('/partners');
        }

        return view('partners/add')->with('footer', $this->footer());;
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'url' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($this->notAdmin()) {
            flash('You are not authorized to view this page')->error();

            return redirect('/partners');
        }

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->type = $request->type;

        $filenameWithExt = $request->file('url')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->file('url')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->file('url')->storeAs('public/partners', $fileNameToStore);
        $request->url->move('public/partners', $fileNameToStore);

        $partner->img = '/public/partners/'.$fileNameToStore;
        $partner->save();

        flash('Partner successfully created')->success();

        return redirect('/partners');
    }

    public function showAll ()
    {
        $local_partners = Partner::where('type', 'local')->get();
        $int_partners = Partner::where('type', 'international')->get();

        return view('partners/show-all')->with('local_partners', $local_partners)->with('int_partners', $int_partners)->
        with('footer', $this->footer());
    }

    public function edit (Request $request, $id)
    {
        $partner = Partner::find($id);

        return view('partners/edit')->with('partner', $partner)->with('footer', $this->footer());
    }

    public function update (Request $request, $id)
    {
        $partner = Partner::find($id);

        $partner->name = $request->name;
        $partner->type = $request->type;
        
        if ($request->hasFile('url')) {
            $filenameWithExt = $request->file('url')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('url')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('url')->storeAs('public/partners', $fileNameToStore);
            $request->url->move('public/partners', $fileNameToStore);

            $partner->img = '/public/partners/'.$fileNameToStore;
        }

        $partner->save();

        return redirect('/partners');
    }

    public function delete (Request $request, $id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect('/partners');
    }
}
