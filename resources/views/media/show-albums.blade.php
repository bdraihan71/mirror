@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>All Photograph Albums</h2>
            </div>
        </div>

        <br>

        <div class="row">
            @foreach ($events as $event)
                @if (count($event->album) != 0)
                    <div class="col-md-6">
                        <h4 class="text-center">{{$event->name}}</h4>
                        <br>
                        <div class="row text-center">
                            <div class="col-md-6">
                                <img src="{{$event->album[0]->url}}" alt="Image 1" class="img-fluid">
                                <br><br>
                                {{$event->album[0]->caption}}
                            </div>
                            <div class="col-md-6">
                                <img src="{{$event->album[1]->url}}" alt="Image 2" class="img-fluid">
                                <br><br>
                                {{$event->album[1]->caption}}
                            </div>
                        </div>
                        <br><br>
                        <div class="row text-center">
                            <div class="col-md-6">
                                <img src="{{$event->album[2]->url}}" alt="Image 3" class="img-fluid">
                                <br><br>
                                {{$event->album[2]->caption}}
                            </div>
                            <div class="col-md-6">
                                <img src="{{$event->album[3]->url}}" alt="Image 4" class="img-fluid">
                                <br><br>
                                {{$event->album[3]->caption}}
                            </div>
                        </div>
                        <br><br>
                        <div class="row text-center">
                            <div class="col-md-6">
                                <img src="{{$event->album[4]->url}}" alt="Image 5" class="img-fluid">
                                <br><br>
                                {{$event->album[4]->caption}}
                            </div>
                            <div class="col-md-6">
                                <img src="{{$event->album[5]->url}}" alt="Image 6" class="img-fluid">
                                <br><br>
                                {{$event->album[5]->caption}}
                            </div>
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach
        </div>
    </div>
@endsection