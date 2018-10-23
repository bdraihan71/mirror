@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <form action="{{$url}}" method="GET">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="event">Please select the event</label>
                        </div>
                        <div class="col-md-9">
                            <select name="event" class="form-control" required>
                                <option value="">Please select an event to edit its album</option>
                                <option value="0">None</option>
                                @foreach($events as $event)
                                    <option value="{{$event->id}}">{{$event->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-danger w-100" type="submit">Submit</button>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </div>
@endsection