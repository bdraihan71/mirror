@extends('layouts.app')

@section('content')
<br><br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h4 class="text-center">Please enter the YouTube embedded link</h4>
            <br><br>
            <form action="/media/video/add" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="event" class="form-label-control">Video for</label>
                    </div>
                    <div class="col-md-9">
                        <select name="event" class="form-control" required>
                            <option value="">Please select an event to add the videos to</option>
                            @foreach ($events as $event)
                                <option value="{{$event->id}}">{{$event->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="url" class="form-label-control">YouTube Embedded link</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="url" class="form-control" required placeholder="Please provide provide the embedded link">
                    </div>
                </div>
                <button class="btn btn-danger w-100" type="submit">Submit</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection