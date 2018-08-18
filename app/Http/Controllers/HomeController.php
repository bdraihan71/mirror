<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebContent;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgs = array();
        $i = 1;

        for (; $i <= 3; $i++) {
            array_push($imgs, WebContent::where('id', $i)->first());
        }

        $description = WebContent::where('id', 4)->first();
        $tagline = WebContent::where('id', 5)->first();
        $wwd = array();
        $wwds = array();

        for ($i = 6; $i <= 10; $i++) {
            array_push($wwd, WebContent::where('id', $i)->first());
        }

        for ($i = 11; $i <= 15; $i++) {
            array_push($wwds, WebContent::where('id', $i)->first());
        }

        return view('index')->with('imgs', $imgs)->with('description', $description)->with('wwd', $wwd)->
        with('wwds', $wwds);
    }
}
