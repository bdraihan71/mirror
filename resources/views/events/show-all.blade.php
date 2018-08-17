@extends('layouts.app')

@section('content')
    <div class="overlay">
        <h1 class="font-weight-bold">{{$e->name}}</h1>
        <p>{{$e->location}}</p>
        <a href="/question/answer/{{$e->id}}" class="btn btn-danger btn-radius">Buy Ticket</a>
        <a href="/events/{{$e->id}}" class="btn btn-danger btn-radius">Visit</a>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{$e->img_3}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{$e->img_4}}" alt="Second slide">
            </div>
        </div>
    </div>

    <section id="events" class="events text-center py-5 bg-light white-bg">
        <div class="container-fluid">
            <h1 class="pb-3">All Events</h1>
            <div align="center">
                <a href="/events/all" class="btn btn-outline-danger btn-co">All</a>
                <a href="/events/upcoming" class="btn btn-outline-danger btn-co">Upcoming</a>
                <a href="/events/past" class="btn btn-outline-danger btn-co">Past</a>
                <br>
                <br>
            </div>
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-4 gallery_product filter hdpe">
                        <div class="card rounded-0 border-0">
                            <a href="/events/{{$event->id}}"><img class="card-img-top rounded-0" src="{{$event->img_5}}" alt="Card image cap"></a>
                            <div class="mx-4 pb-5">
                                <p class="card-title font-weight-bold text-left pt-5">{{$event->name}}</p>
                                <p class="card-text text-left">Place: {{$event->location}}<span class="float-right">{{date("d M, Y", strtotime($event->date_start))}}</span></p>
                            </div>
                            <a href="/events/{{$event->id}}" class="btn btn-danger w-100 rounded-0 py-3">REGISTER NOW</a>
                        </div>
                    </div>
                @endforeach

                @if (count($events) == 0)
                    <div class="col-md-12 text-center">
                        <hr>
                        <h1 class="page-title">NO EVENTS</h1>
                        <hr>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection