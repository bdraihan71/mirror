<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Question;
use App\EventAnswer;

class AnswersController extends Controller
{
    public function answer (Request $request, $id)
    {
        $answers = EventAnswer::where('event_id', $id)->where('user_id', auth()->user()->id)->get();

        if (count($answers) != 0) {
            $url = '/events/'.$id;
            
            return redirect($url)->with('error', 'You can only buy one ticket');
        }

        $questions = Question::where('event_id', $id)->get();

        return view('answers/answer')->with('questions', $questions)->with('id', $id);
    }

    public function store (Request $request, $id)
    {
        $answers = $request->answer;
        $qid = $request->qid;

        for ($i = 0; $i < sizeof($answers); $i++) {
            $answer = new EventAnswer;
            $answer->event_id = $id;
            $answer->user_id = auth()->user()->id;
            $answer->answer = $answers[$i];
            $answer->question_id = $qid[$id];
            $answer->save();
        }

        $answers = EventAnswer::where('event_id', $id)->get();
        $url = '/ticket/buy/'.$id;

        return redirect($url);
    }

    public function cancel (Request $request, $id)
    {
        $answers = EventAnswer::where('event_id', $id)->where('user_id', auth()->user()->id)->get();

        foreach ($answers as $answer) {
            $answer->delete();
        }

        $url = '/events/'.$id;

        return redirect($url);
    }
}
