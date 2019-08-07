<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebContent;
use App\Contactee;
use App\Partner;
use App\Mail\ContactUs as vMail;
use Mail;
use App\Client;
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

        $partners = Partner::all();
        $local_partners = Partner::where('type', 'local')->get();
        $int_partners = Partner::where('type', 'international')->get();

        $clients = Client::all();
        $local_clients = Client::where('type', 'local')->get();
        $int_clients = Client::where('type', 'international')->get();


        for (; $i <= 3; $i++) {
            array_push($imgs, WebContent::where('id', $i)->first());
        }

        $description = WebContent::where('id', 7)->first();
        $tagline = WebContent::where('id', 6)->first();
        $wwd = array();
        $wwds = array();

        for ($i = 8; $i <= 10; $i++) {
            array_push($wwd, WebContent::where('id', $i)->first());
        }

        for ($i = 11; $i <= 13; $i++) {
            array_push($wwds, WebContent::where('id', $i)->first());
        }

        return view('index')->with('imgs', $imgs)->with('description', $description)->with('wwd', $wwd)->
        with('wwds', $wwds)->with('footer', $this->footer())->with('tagline', $tagline)->with('partners', $partners)->
        with('local_partners', $local_partners)->with('int_partners', $int_partners)->with('clients', $clients)->
        with('local_clients', $local_clients)->with('int_clients', $int_clients);
;
    }

    public function contactUs ()
    {
        $contact = array(WebContent::where('id', 14)->first(), WebContent::where('id', 15)->first(), WebContent::where('id', 16)->first());

        if (auth()->user() == null) {
            flash('Leave us a message!')->success();

            return view('contact-us')->with('footer', $this->footer())->with('contact', $contact);
        }

        if (!$this->notAdmin()) {
            $contacts = Contactee::orderBy('id', 'desc')->paginate(10);

            flash('Leave us a message!')->success();

            return view('view-contactees')->with('footer', $this->footer())->with('contact', $contact)->
            with('contacts', $contacts);
        } else {
            return view('contact-us')->with('footer', $this->footer())->with('contact', $contact);
        }
    }

    public function contacted (Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500',
            'name' => 'required|max:200',
            'email' => 'required|max:200',
        ]);

        $contact = new Contactee;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->body = $request->body;
        $contact->save();

        Mail::to(env('MAIL_COPY_TO'))->queue(new vMail($contact));

        flash('Message successfully delivered')->success();
        return redirect('/');
    }
}
