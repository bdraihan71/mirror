@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
<br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/export/ticket">
                        @csrf
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Event</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select name="event" class="input-container form-control contact-form" required>
                                    <option value="">Please select an event</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-danger register-btn">Select</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection