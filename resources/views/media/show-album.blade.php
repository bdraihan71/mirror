@extends('layouts.app')

@section('content')
    @if ($album->featured == null)
        @if (count($album->photos) == 0)
            <style>
                .album-background {
                    background-image: linear-gradient(0deg,rgb(255, 0, 0, 0.5),rgb(255, 0, 0, 0.5)),url({{ '/frontend/img/carousel1.jpeg' }});
                }
            </style>
        @else
            <style>
                .album-background {
                    background-image: linear-gradient(0deg,rgb(255, 0, 0, 0.5),rgb(255, 0, 0, 0.5)),url({{ $album->photos[0]->url }});
                }
            </style>
        @endif
    @else
        <style>
            .album-background {
                background-image: linear-gradient(0deg,rgb(255, 0, 0, 0.5),rgb(255, 0, 0, 0.5)),url({{ $album->featured->url }});
            }
        </style>
    @endif
    <div class="album-background">
        <div class="overlay-album" id="album-bkg">
            <h1 class="font-weight-bold text-left ml-5">{{ $album->name }}</h1>
            <p class="text-left ml-5 mt-3">{{ count($album->photos).' PHOTOS' }}</p>
    
            <p class="text-left ml-5 album-padding-top album-text-size">Release Date<span class="float-right mr-5">{{ $album->event_id != null ? 'Location' : '' }}</span></p>
            <h4 class="text-left ml-5 album-text-size font-weight-bold">{{ Carbon\Carbon::parse($album->created_at)->format('d M Y') }}<span class="float-right mr-5">{{ $album->event_id != null ? $album->event->location : '' }}</span></h4>
        </div>
    </div>

    <section id="album" class="album-pics text-center py-5">
        <div class="container">
            <div class="row">
    
                @foreach ($album->photos as $photo)
                    @if ($album->featured_id != $photo->id)
                        <div class="col-md-3 my-3">
                            <div class="card rounded border-0 zoom">
                                <img class="card-img-top rounded" src="{{ $photo->url }}" id="{{ 'myImg'.$photo->id }}" onclick="modalImage({{ $photo->id }})" alt="{{ $photo->caption }}">
                            </div>
                        </div>
                    @endif
                @endforeach
    
            </div>
        </div>
    </section>

    @include('templates.modal')
@endsection