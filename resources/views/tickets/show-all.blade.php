@extends('layouts.app')

@section('content')
    <br><br><br><br><br>

    <div class="section black-bg">
        <div class="container-fluid">
            <div class="row">
                <h3 class="page-title">EVENT TICKETS</h3>
            </div>
            <br><br>
            @if (count($tickets) == 0)
                <h3 class="page-title text-center">You have not purchased any tickets</h3>
            @else
                <h4 class="text-center">After Clicking on the Download Link, please use (Command + p) for mac and (Crtl + p) for other platforms to print the pdf of the ticket</h4>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Ticket Type</th>
                            <th>Ticket Price</th>
                            <th>Purchase Date</th>
                            <th>Ticket Link</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{$ticket->event->name}}</td>
                                <td>{{$ticket->type->name}}</td>
                                <td>{{$ticket->type->price}}</td>
                                <td>{{date("M d, Y", strtotime($ticket->created_at))}}</td>
                                <td><a href="/ticket/print/{{$ticket->id}}" target="_blank">Download Link</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection