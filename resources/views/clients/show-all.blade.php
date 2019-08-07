@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <h3 class="page-title"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALL PARTNERS</h3>
        <h2 class="page-title text-center text-dark">Local Clients</h2>
        <br><br>
        <div class="row">
            @if (count($local_clients) > 0)
                @foreach($local_clients as $client)
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{$client->img}}" height="300" width="300" alt="Partner Logo">
                        </div>
                        <br>
                        <h4 class="text-center text-dark">{{$client->name}}</h4>
                        <h6 class="text-center text-dark">{{$client->feedback}}</h6>
                        <h5 class="text-center text-dark">{{$client->company}}</h5>
                        @if (auth()->user() != null)
                            @if (!App\Http\Controllers\Controller::notAdmin())
                                <br><br>
                                <a href="/clients/edit/{{$client->id}}" class="btn btn-danger w-100">Edit</a>
                                <br><br>
                                <a href="/clients/delete/{{$client->id}}" class="btn black-button w-100">Delete</a>
                            @endif
                        @endif
                        <br><br><br>
                    </div>
                @endforeach
            @else
                <hr>
                <h4 class="page-title text-center">NO KNOWN LOCAL PARTNERS</h4>
                <hr>
            @endif
        </div>

        <hr><hr>

        <h2 class="page-title text-center text-dark">International Partners</h2>
        <br><br>
        <div class="row">
            @if (count($int_clients) > 0)
                @foreach($int_clients as $client)
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{$client->img}}" height="300" width="300" alt="Partner Logo">
                        </div>
                        <br>
                        <h4 class="text-center text-dark">{{$client->name}}</h4>
                        <h6 class="text-center text-dark">{{$client->feedback}}</h6>
                        <h5 class="text-center text-dark">{{$client->company}}</h5>
                        @if (auth()->user() != null)
                            @if (!App\Http\Controllers\Controller::notAdmin())
                                <br><br>
                                <a href="/clients/edit/{{$client->id}}" class="btn btn-danger w-100">Edit</a>
                                <br><br>
                                <a href="/clients/delete/{{$client->id}}" class="btn black-button w-100">Delete</a>
                            @endif
                        @endif
                        <br><br><br>
                    </div>
                @endforeach
            @else
                <hr>
                <h4 class="page-title text-center">NO KNOWN INTERNATIONAL PARTNERS</h4>
                <hr>
            @endif
        </div>

        @if (auth()->user() != null)
            @if (!App\Http\Controllers\Controller::notAdmin())
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="/clients/create" class="btn btn-danger w-100">Add a Partner</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            @endif
        @endif
    </div>
@endsection
