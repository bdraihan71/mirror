@extends('layouts.app')

@section('content')
<br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <h3 class="page-title"><a href="/analytics/events"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$event->name}} ANALYTICS</h3>
    </div>

    <form action="/present/barcode" method="POST" id="barcode">
        @csrf
        <input type="hidden" name="event" value="{{ $event->id }}">
        <div class="row">
            <div class="col-md-12">
                <input type="text" autofocus="autofocus" name="barcode" class="form-control" onchange="myFunction(this.value)">
            </div>
        </div>
    </form>

    <script>
        function myFunction(val) {
            document.forms["barcode"].submit();
        }
    </script>

    <br>

    <div class="row">
        <h3 class="page-header">Purchased Tickets</h3>
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

    <br><br>

    <div class="row">
        <h3 class="page-header">Issued Tickets</h3>
    </div>

    <div class="row">
        <div class="col">
            Name
        </div>
        <div class="col">
            Email
        </div>
        <div class="col">
            Company
        </div>
        <div class="col">
            Designation
        </div>
        <div class="col">
            Phone
        </div>
    </div>

    @foreach($event->issues as $issue)
        @if ($issue->present == true)
            <div class="row bor-b present">
        @else
            <div class="row bor-b">
        @endif
            <div class="col">{{$issue->name}}</div>
            <div class="col">{{$issue->email}}</div>
            <div class="col">{{$issue->company}}</div>
            <div class="col">{{$issue->designation}}</div>
            <div class="col">{{$issue->phone}}</div>
            <div class="col-1 text-center">
                @if ($issue->present == true)
                    <a href="/analytics/present/issue/{{$issue->id}}" class="btn btn-danger">Absent</a>
                @else
                    <a href="/analytics/present/issue/{{$issue->id}}" class="btn btn-primary">Present</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection