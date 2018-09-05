@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
    <div class="overlay-single-event">
        <h1 class="font-weight-bold">{{$event->name}}</h1>
        @if ($event->deleted)
            <h1 class="font-weight-bold">Event Deleted</h1>
        @endif
        <i class="fas fa-map-marker-alt fa-1x"> {{strtoupper($event->location)}}</i>
        <br>
        @if ($flow)
            <a href="/question/answer/{{$event->id}}" class="btn btn-danger btn-radius px-5 py-3">BUY TICKET</a>
        @else
            <button type="button" class="btn btn-default btn-radius px-5 py-3" disabled>
                <strong>SOLD OUT</strong>
            </button>
        @endif

        @if (auth()->user() != null)
            @if (!App\Http\Controllers\Controller::notAdmin())
                <a href="/events/edit/{{$event->id}}" class="btn btn-primary btn-radius px-5 py-3">EDIT EVENT</a>
            @endif
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
                <img class="d-block w-100" src="{{$event->img_3}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{$event->img_4}}" alt="Second slide">
            </div>
        </div>
    </div>

    @if (count($album))
        <style>
            .c-hero-flex__item1 {
                background: #222 url("<?php echo $album[0]; ?>") no-repeat center center;
            }
            .c-hero-flex__item2 {
                background: #222 url("<?php echo $album[1]; ?>") no-repeat center center;
            }
            .c-hero-flex__item3 {
                background: #222 url("<?php echo $album[2]; ?>") no-repeat center center;
            }
            .c-hero-flex__item4 {
                background: #222 url("<?php echo $album[3]; ?>") no-repeat center center;
            }
            .c-hero-flex__item5 {
                background: #222 url("<?php echo $album[4]; ?>") no-repeat center center;
            }
            .c-hero-flex__item6 {
                background: #222 url("<?php echo $album[5]; ?>") no-repeat center center;
            }
        </style>

        <section id="gallery" class="gallery">
            <div class="container-fluid d-none d-sm-block">
                <div class="row text-center">
                    <div class="col-md-12 center-gallery">
                        <h1 class="center__text glitch is-glitching" data-text="GALLERY">GALLERY</h1>
                    </div>
                </div>
                <div class="row">
                    <section class="c-hero-flex">
                        <a class="c-hero-flex__item c-hero-flex__item1" target="_blank" href="/">
                            
                        </a>
                        <a class="c-hero-flex__item c-hero-flex__item2" target="_blank" href="/">
                            
                        </a>
                        <a class="c-hero-flex__item c-hero-flex__item3" target="_blank" href="/">

                        </a>
                    </section>
                </div>
                <div class="row">
                    <section class="c-hero-flex">
                        <a class="c-hero-flex__item c-hero-flex__item4" target="_blank" href="/">

                        </a>
                        <a class="c-hero-flex__item c-hero-flex__item5" target="_blank" href="/">

                        </a>
                        <a class="c-hero-flex__item c-hero-flex__item6" target="_blank" href="/">

                        </a>
                    </section>
                </div>
            </div>
        </section>
    @endif

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

    @if ($video != null)
        <section id="event-video" class="event-video text-white py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="560" height="315" src="{!!$video->url!!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

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
                        <h3>ADDITIONAL INFORMATION</h3>
                        @foreach($event->addInfo as $info)
                            <div class="row ml-2">
                                <h4>{{$info->name}}</h4>
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