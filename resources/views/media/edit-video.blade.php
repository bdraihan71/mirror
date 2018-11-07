@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <h3>{{$event == null ? "Eventless" : $event->name}}</h3>
        </div>

        <form action="/media/video/edit" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$event == null ? $event : $event->id}}">
            @csrf
            @if ($event == null)
                <div class="row">
                    @foreach (App\Video::where('event_id', 0)->get() as $video)
                        <div class="col-md-4">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" width="560" height="315" src={!!$video->url!!} frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <br>
                            <input type="text" name="url[]" value="{{ old('url'.$loop->index) == null ? $video->url : old('url'.$loop->index) }}" class="form-control">
                            <br>
                            <a href="/media/video/delete/{{$video->id}}" class="btn btn-warning w-100">Delete</a>
                            <br><br><br>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    @foreach ($event->videos as $video)
                        <div class="col-md-4">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" width="560" height="315" src={!!$video->url!!} frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <br>
                            <input type="text" name="url[]" value="{{ old('url'.$loop->index) == null ? $video->url : old('url'.$loop->index) }}" class="form-control">
                            <br>
                            <a href="/media/video/delete/{{$video->id}}" class="btn btn-warning w-100">Delete</a>
                            <br><br><br>
                        </div>
                    @endforeach
                </div>
            @endif

            <h4 class="text-center">PLEASE PASTE THE YOUTUBE EMBED LINK</h4>
            <br>

            <div class="form-group row">
                <div class="col-md-2 pl-5">
                    <label for="all" class="form-label-control">Add video</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="new" placeholder="Embed link">
                </div>
            </div>

            <button class="btn btn-danger w-100" type="submit">Submit</button>
        </form>
    </div>
@endsection