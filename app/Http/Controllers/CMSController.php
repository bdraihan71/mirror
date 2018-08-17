<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebContent;

class CMSController extends Controller
{
    public function update (Request $request, $id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this');
        }

        $content = Webcontent::where('id', $id)->first();
        $content = $request->content;
        $content->save();

        return redirect($request->url);
    }

    public function getIndex ()
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this');
        }
        
        return view('cms/index');
    }

    public function setIndex (Request $request)
    {
        if($request->hasFile('url_1')) {
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('url_1')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('url_1')->storeAs('public/uploadedImg', $fileNameToStore);
            $request->url_1->move('public/uploadedImg', $fileNameToStore);
            $content = WebContent::where('id', 1)->first();
            $content->content = '/public/uploadedImg'.$fileNameToStore;
            $content->save();
        }

        if($request->hasFile('url_2')) {
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('url_2')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('url_2')->storeAs('public/uploadedImg', $fileNameToStore);
            $request->url_2->move('public/uploadedImg', $fileNameToStore);
            $content = WebContent::where('id', 2)->first();
            $content->content = '/public/uploadedImg'.$fileNameToStore;
            $content->save();
        }

        if($request->hasFile('url_3')) {
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('url_3')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('url_3')->storeAs('public/uploadedImg', $fileNameToStore);
            $request->url_3->move('public/uploadedImg', $fileNameToStore);
            $content = WebContent::where('id', 3)->first();
            $content->content = '/public/uploadedImg'.$fileNameToStore;
            $content->save();
        }

        if ($request->tagline != null) {
            $content = WebContent::where('id', 4)->first();
            $content->content = $request->tagline;
            $content->save();
        }

        if ($request->description != null) {
            $content = WebContent::where('id', 5)->first();
            $content->content = $request->description;
            $content->save();
        }

        $cCounter = 6;
        $wwds = $request->wwd;

        foreach ($wwds as $wwd) {
            if ($wwd != null) {
                $content = WebContent::where('id', $cCounter)->first();
                $content->content = $request->wwd;
                $content->save();
            }

            $cCounter++;
        }

        $wwds = $request->wwds;

        foreach ($wwds as $wwd) {
            if ($wwd != null) {
                $content = WebContent::where('id', $cCounter)->first();
                $content->content = $request->wwd;
                $content->save();
            }

            $cCounter++;
        }

        return redirect('/');
    }
}
