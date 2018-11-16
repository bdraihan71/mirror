@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <h3 class="page-title"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EVENTS ANALYTICS</h3>
        </div>

        <div class="row">
            <div class="col-md-3">Event Name</div>
            <div class="col-md-2">Ticket Types</div>
            <div class="col-md-1">Price</div>
            <div class="col-md-2">Number of Tickets</div>
            <div class="col-md-2">Tickets Sold</div>
            <div class="col-md-2">Revenue</div>
        </div>

        @foreach($events as $event)
            <div class="row bor-b bor-t">
                <div class="col-md-3"><a href="/analytics/events/{{$event->id}}">{{$event->name}}</a></div>
                <div class="col-md-2">
                    @foreach($event->types as $type)
                        <div class="row bor-b">
                            <div class="col-md-12">{{$type->name}}</div>
                        </div>
                    @endforeach
                    <div class="row"></div>
                </div>
                <div class="col-md-1">
                    @foreach($event->types as $type)
                        <div class="row bor-b">
                            <div class="col-md-12">{{$type->price}}</div>
                        </div>
                    @endforeach
                    <div class="row"></div>
                </div>
                <div class="col-md-2">
                    @foreach($event->types as $type)
                        <div class="row bor-b">
                            <div class="col-md-12">{{ $type->tickets->count() }}</div>
                        </div>
                    @endforeach
                    <div class="row"></div>
                </div>
                <div class="col-md-2">
                    @foreach($event->types as $type)
                        <div class="row bor-b">
                            <div class="col-md-12">{{ count($type->tickets->where('user_id', '!=', null)) }}</div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">&ensp;</div>
                    </div>
                </div>
                <div class="col-md-2">
                    @foreach($event->types as $type)
                        <div class="row bor-b">
                            <div class="col-md-12">{{ count($type->tickets->where('user_id', '!=', null)) * $type->price }}</div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">{{ $x[$loop->index] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection