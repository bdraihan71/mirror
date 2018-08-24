@extends('layouts.app')

@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <h3 class="page-header">{{$event->name}}</h3>
    </div>

    <div class="row">
        <div class="col-md-2">
            Purchasee Information
        </div>
        <div class="col-md-5">
            Questions
        </div>
        <div class="col-md-5">
            Answers
        </div>
    </div>

    @foreach($tickets as $ticket)
        <div class="row">
            <div class="col-md-2">
                {{$ticket->user->profile->f_name.' '.$ticket->user->profile->m_name.' '.$ticket->user->profile->l_name}}
                <br>
                {{$ticket->user->profile->phone}}
                <br>
                {{$ticket->user->email}}
                <br>
                {{$ticket->user->profile->address}}
                <br>
                {{$ticket->type->name}}
            </div>
            <div class="col-md-10">
                @foreach($ticket->event->questions as $question)
                    <div class="row bor-b">
                        <div class="col-md-6">
                            {{$question->question}}
                        </div>
                        <div class="col-md-6">
                            {{$question->answers->where('user_id', $ticket->user_id)->first()->answer}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection