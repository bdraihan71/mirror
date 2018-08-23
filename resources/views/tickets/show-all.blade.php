@extends('layouts.app')

@section('content')
    <br><br><br><br><br>

    <div class="section black-bg">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-title">EVENT TICKETS</h3>
            </div>
            
            @if (count($tickets) == 0)
                <h3 class="page-title text-center">You Have No Tickets Purchased</h3>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Ticket Type</th>
                            <th>Ticket Price</th>
                            <th>Ticket Link</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{$ticket->event->name}}</td>
                                <td>{{$ticket->type->name}}</td>
                                <td>{{$ticket->type->price}}</td>
                                <td><a href="/ticket/print/{{$ticket->id}}" target="_blank">Download Link</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection