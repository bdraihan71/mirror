<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnersController extends Controller
{
    public function create ()
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/partners')->with('error', 'You are not authorized to view this page');
        }

        return view('partners/add')->with('footer', $this->footer());;
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'img' => 'image|required|max:1999|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if (auth()->user()->role != 'admin') {
            return redirect('/partners')->with('error', 'You are not authorized to view this page');
        }

        $partner = new Partner;
        $partner->name = $request->name;
        $partner->type = $request->type;

        $filenameWithExt = $request->file('img')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $request->file('img')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
        $path = $request->file('img')->storeAs('public/partners', $fileNameToStore);
        $request->img->move('public/partners', $fileNameToStore);

        $partner->img = '/public/partners/'.$fileNameToStore;
        $partner->save();

        return redirect('/partners')->with('succes', 'Partner successfully created');
    }

    public function showAll ()
    {
        $local_partners = Partner::where('type', 'local')->get();
        $int_partners = Partner::where('type', 'internatinal')->get();

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
        
        if ($request->hasFile('img')) {
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('img')->storeAs('public/partners', $fileNameToStore);
            $request->img->move('public/partners', $fileNameToStore);

            $partner->img = '/public/partners/'.$fileNameToStore;
        }

        $partner->save();

        return redirect('/partners');
    }

    public function delete (Request $request, $id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return redirect('/partners/show');
    }
}
