@extends('layouts.app')

@section('content')
    <style>
        .album-background {
            background-image: url({{ $album->featured->url }});
        }
    </style>
    <div class="album-background">
        <div class="overlay-album" id="album-bkg">
            <h1 class="font-weight-bold text-left ml-5">Evening with DIPLO Live in Dhaka</h1>
            <p class="text-left ml-5 mt-3">{{ count($album->photos).' PHOTOS' }}</p>
    
            <p class="text-left ml-5 album-padding-top album-text-size">Release Date<span class="float-right mr-5">{{ $album->event_id != null ? 'Location' : '' }}</span></p>
            <h4 class="text-left ml-5 album-text-size font-weight-bold">{{ Carbon\Carbon::parse($album->created_at)->format('d M Y') }}<span class="float-right mr-5">{{ $album->event_id != null ? $album->event->location : '' }}</span></h4>
        </div>
    </div>

    <section id="album" class="album-pics text-center py-5">
        <div class="container">
            <div class="row">
    
                @foreach ($album->photos as $photo)
                    <div class="col-md-3 my-3">
                        <div class="card rounded border-0 zoom">
                            <img class="card-img-top rounded" src="{{ $photo->url }}" id="{{ 'myImg'.$photo->id }}" onclick="modalImage({{ $photo->id }})" alt="{{ $photo->caption }}">
                        </div>
                    </div>
                @endforeach
    
            </div>
        </div>
    </section>

    @include('templates.modal')
@endsection