@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <form action="/album/create " method="POST">
        @csrf
        <script>
            function alter () {
                if (document.getElementById('new').checked == true) {
                    document.getElementById('new-album').style.display = 'block';
                    document.getElementById('old-album').style.display = 'none';
                    document.getElementById('album-select').required = false;
                    document.getElementById('album-name').required = true;
                    document.getElementById('submit-btn').innerHTML = 'Create Album';
                } else {
                    document.getElementById('new-album').style.display = 'none';
                    document.getElementById('old-album').style.display = 'block';
                    document.getElementById('album-select').required = true;
                    document.getElementById('album-name').required = false;
                    document.getElementById('submit-btn').innerHTML = 'Add to Album';
                }
            }
        </script>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-danger active">
                        <input type="radio" name="options" id="new" onchange="alter()" value="1" autocomplete="off" checked> New Album
                    </label>
                    <label class="btn btn-danger">
                        <input type="radio" name="options" id="old" onchange="alter()" value="0" autocomplete="off"> Select Album
                    </label>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" id="new-album">
                <div class="form-group">
                    <select name="event" class="form-control">
                        <option value="">Please select an event</option>
                        @foreach (App\Event::all() as $event)
                            <option value="{{$event->id}}">{{$event->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name of Album" id="album-name" required>
                </div>
                <br><br>
            </div>
            <div class="col-md-10" id="old-album" style="display: none">
                <div class="form-group">
                    <select name="album" class="form-control" id="album-select">
                        <option value="">Please select an album</option>
                        @foreach (App\PhotoAlbum::all() as $event)
                            <option value="{{$event->id}}">{{$event->name}}</option>
                        @endforeach
                    </select>
                    <br><br><br><br>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button class="btn btn-danger w-100" type="submit" id="submit-btn">Create Album</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
@endsection