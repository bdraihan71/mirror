@extends('layouts.app')

@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <h3 class="page-header">{{$event->name}}</h3>
    </div>

    <div class="row">
        <div class="col">
            Purchasee Information
        </div>
        <div class="col">
            Questions
        </div>
        <div class="col">
            Answers
        </div>
        <div class="col-1">
            Present
        </div>
    </div>

    @foreach($tickets as $ticket)
        @if ($ticket->present == 2)
            <div class="row bor-b present">
        @else
            <div class="row bor-b">
        @endif
            <div class="col">
                {{$ticket->user->profile->f_name.' '.$ticket->user->profile->m_name.' '.$ticket->user->profile->l_name}}
                <br>
                {{$ticket->user->profile->phone}}
                <br>
                {{$ticket->user->email}}
                <br>
                {{$ticket->type->name}}
            </div>
            <div class="col">
                @foreach($ticket->event->questions as $question)
                    <div class="row bor-b">
                        <div class="col">
                            {{$question->question}}
                        </div>
                        <div class="col">
                            {{$question->answers->where('user_id', $ticket->user_id)->first()->answer}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-1 text-center">
                @if ($ticket->present == 2)
                    <a href="/analytics/present/{{$ticket->id}}" class="btn btn-danger">Absent</a>
                @else
                    <a href="/analytics/present/{{$ticket->id}}" class="btn btn-primary">Present</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection