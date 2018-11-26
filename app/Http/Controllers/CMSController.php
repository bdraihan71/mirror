<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebContent;

class CMSController extends Controller
{
    public function getIndex ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $contents = array(WebContent::find(1), WebContent::find(2), WebContent::find(3), WebContent::find(4), WebContent::find(5),
        WebContent::find(6), WebContent::find(7), WebContent::find(8), WebContent::find(9), WebContent::find(10), WebContent::find(11),
        WebContent::find(12), WebContent::find(13), WebContent::find(14), WebContent::find(15));

        flash('Welcome to landing page content management system');
        
        return view('cms/index')->with('contents', $contents);
    }

    public function setIndex (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }



        $this->validate($request, [
            // 'wwds.*' => 'required|max:100',
            'wwd.*' => 'required',
            'url_1' => 'nullable|image',
            'url_2' => 'nullable|image',
            'url_3' => 'nullable|image',
        ]);

        if($request->hasFile('url_1')) {
            $content = WebContent::where('id', 1)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $this->uploadImage($request->url_1);
            $content->save();
        }

        if($request->hasFile('url_2')) {
            $content = WebContent::where('id', 2)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $this->uploadImage($request->url_2);
            $content->save();
        }

        if($request->hasFile('url_3')) {
            $content = WebContent::where('id', 3)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $this->uploadImage($request->url_3);
            $content->save();
        }

        if ($request->tagline != null) {
            $content = WebContent::where('id', 4)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $request->tagline;
            $content->save();
        }

        if ($request->description != null) {
            $content = WebContent::where('id', 5)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $request->description;
            $content->save();
        }

        $cCounter = 6;
        $wwds = $request->wwd;


        foreach ($wwds as $wwd) {
            if ($wwd != null) {
                $content = WebContent::where('id', $cCounter)->first();

                if ($content == null) {
                    $content = new WebContent;
                }

                $content->content = $wwd;
                $content->save();
            }

            $cCounter++;
        }

        $wwdss = $request->wwds;

        foreach ($wwdss as $wwds) {
            if ($wwds != null) {
                $content = WebContent::where('id', $cCounter)->first();

                if ($content == null) {
                    $content = new WebContent;
                }

                $content->content = $wwds;
                $content->save();
            }

            $cCounter++;
        }

        flash('Your changes have successfully made')->success();

        return redirect('/');
    }

    public function getFooter ()
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $contents = array(WebContent::find(16), WebContent::find(17), WebContent::find(18));

        flash('Welcome to the footer content management system');

        return view('cms/footer')->with('contents', $contents);
    }

    public function setFooter (Request $request)
    {
        if ($this->notAdmin()) {
            flash('You are not authorized to access this')->error();

            return redirect('/');
        }

        $this->validate($request, [
            'head_office' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'contact' => 'required',
            'contact' => 'required',
        ]);

        if ($request->head_office != null) {
            $content = WebContent::where('id', 16)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $request->head_office;
            $content->save();
        }

        if ($request->contact != null) {
            $content = WebContent::where('id', 17)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $request->contact;
            $content->save();
        }

        if ($request->email != null) {
            $content = WebContent::where('id', 18)->first();

            if ($content == null) {
                $content = new WebContent;
            }

            $content->content = $request->email;
            $content->save();
        }

        flash('The changes has been successfully made')->success();

        return redirect('/');
    }
}
