@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="row pt-3">
        <div class="col-md-4">
            <div class="embed-responsive embed-responsive-16by9">
                {<iframe class="embed-responsive-item" width="560" height="315" src={!!$video->url!!} frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>}
            </div>
            <p class="media-text">Lorem ipsum</p>
        </div>
        <div class="col-md-4">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" src={{$video->url}} frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <p class="media-text">Lorem ipsum</p>
        </div>
        <div class="col-md-4">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" width="560" height="315" src={{$video->url}} frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
            <p class="media-text">Lorem ipsum</p>
        </div>
    </div>
@endsection