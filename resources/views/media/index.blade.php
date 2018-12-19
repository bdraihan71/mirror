@extends('layouts.app')

@section('content')
<section id="media" class="media">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center media-text pb-5">ALBUMS</h1>
        </div>
    </div>

    <div class="row pt-3">
        @foreach ($albums as $album)
            @if (count($album->photos) != 0)
                <div class="col-md-2 image-block">
                    <a href="/album/show/{{$album->id}}"><img class="media-img" src="{{$album->featured != null ? $album->featured->url : ($album->photos[0] != null ? $album->photos[0]->url : 'no image')}}" alt="{{$album->featured != null ? $album->featured->caption : ($album->photos[0] != null ? $album->photos[0]->caption : 'no image')}}" id="{{'myImg'.$album->featured->id}}" onclick="modalImage({{$album->photos[0]->id}})"></a>
                    <p class="media-text">{{$album->name}}</p>
                    @if (auth()->user() != null)
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'super-admin')
                            <div class="edit">
                                <a href="/media/photo/edit?album={{$album->id}}"><i class="fa far fa-edit float-right"></i></a>
                            </div>
                        @endif
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    <div class="text-center">{{ $albums->links() }}</div>
    @if (auth()->user() != null)
        @if (!App\Http\Controllers\Controller::notAdmin())
        <br>
            <div class="row">
                <div class="col-md-12">
                    <a href="/album/create" class="btn black-button w-100">Add Photos</a>
                </div>
            </div>
            <br>
        @endif
    @endif

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center media-text py-5">YOUTUBE VIDEOS</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($videos as $video)
            @if ($loop->index % 3 == 0 && $loop->index != 0)
                </div>
                <div class="row">
            @endif
            <div class="col-md-4 p-3">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="560" height="315" src="{!!$video->url!!}"></iframe"
                        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center">{{ $videos->links() }}</div>
    @if (auth()->user() != null)
        @if (!App\Http\Controllers\Controller::notAdmin())
            <div class="row">
                <div class="col-md-12">
                    <a href="/media/video/add" class="btn black-button w-100">Add Videos</a>
                </div>
            </div>
            <br>
        @endif
    @endif
</div>
</section>

@include('templates.modal')
@endsection