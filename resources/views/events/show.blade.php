@extends('layouts.app')

@section('content')
    <div class="overlay-single-event">
        <span class="badge badge-pill badge-light py-2 px-4 text-danger mb-3">HAPPENING NOW</span>
        <h1 class="font-weight-bold">{{$event->name}}</h1>
        <i class="fas fa-map-marker-alt fa-1x"> {{strtoupper($event->location)}}</i>
        <br>
        @if ($flow)
            <a href="/question/answer/{{$event->id}}" class="btn btn-danger btn-radius px-5 py-3">BUY TICKET</a>
        @else
            <button type="button" class="btn btn-default btn-radius px-5 py-3" disabled>
                <strong>SOLD OUT</strong>
            </button>
        @endif
        <br>
        <i class="far fa-calendar-alt"> 
            @if ($event->date_start == $event->date_end)
                {{date("M d, Y", strtotime($event->date_start))}}
            @else
                {{date("M d, Y", strtotime($event->date_start)).' - '.date("M d, Y", strtotime($event->date_end))}}
            @endif
        </i>
        <br>
        <i class="far fa-clock"> 
            {{date("g:i A", strtotime($event->start)).' - '.date("g:i A", strtotime($event->end))}}
        </i>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active d-none d-sm-block"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/frontend/img/carousel2.jpeg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/frontend/img/carousel1.jpeg" alt="Second slide">
            </div>
        </div>
    </div>

    <section id="schedule" class="schedule text-center text-white py-5">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3">
                    <i class="far fa-calendar-alt"> 
                            @if ($event->date_start == $event->date_end)
                            {{date("M d, Y", strtotime($event->date_start))}}
                        @else
                            {{date("M d, Y", strtotime($event->date_start)).' - '.date("M d, Y", strtotime($event->date_end))}}
                        @endif
                    </i>	
                </div>
                <div class="col-md-6">
                    <i class="fas fa-map-marker-alt fa-1x"> {{strtoupper($event->location)}}</i>		
                </div>
                <div class="col-md-3">
                    <i class="far fa-clock"> {{date("g:i A", strtotime($event->start)).' - '.date("g:i A", strtotime($event->end))}} </i>		
                </div>
                
            </div>
            @if ($flow)
                <a href="/question/answer/{{$event->id}}" class="btn btn-danger btn-radius px-5 py-3">BUY TICKET</a>
            @else
                <button type="button" class="btn btn-default btn-radius px-5 py-3" disabled>
                    <strong>SOLD OUT</strong>
                </button>
            @endif
        </div>
    </section>

    <section id="event-details" class="event-details text-white py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <h1>DETAILS</h1>
                    <div class="ml-1">{!!$event->description!!}</div>
                </div>

                <div class="col-md-3">

                </div>
                
            </div>

            <br><br>

            @if (count($event->addInfo) > 0)
                <div class="row">
                    <div class="col-md-9">
                        <h2>ADDITIONAL INFORMATION</h2>
                        @foreach($event->addInfo as $info)
                            <div class="row ml-2">
                                <h3>{{$info->name}}</h3>
                                <div class="col-md-12">
                                    {!!$info->info!!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection