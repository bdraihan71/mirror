@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="contanier-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center media-text py-5">ALL MUSIC</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($musics as $music)
                @if ($loop->index % 3 == 0 && $loop->index != 0)
                    </div>
                    <div class="row">
                @endif
                <div class="col-md-4 p-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" width="560" height="315" src="{!!$music->url!!}"></iframe"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <p class="media-text">{{$music->name}}</p>

                    @if (auth()->user() != null)
                        @if (!App\Http\Controllers\Controller::notAdmin())
                            <a href="/music/delete/{{$music->id}}" class="btn black-button w-100">Delete</a>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>

        <div class="text-center">{{ $musics->links() }}</div>
        <br>
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if (auth()->user() != null)
                    @if (!App\Http\Controllers\Controller::notAdmin())
                        <a href="/music/create" class="btn btn-danger w-100">Add new Music</a>
                    @endif
                @endif
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection