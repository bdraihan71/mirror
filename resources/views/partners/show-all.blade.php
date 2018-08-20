@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <h2 class="page-title pl-5">Local Partners</h2>
        <div class="row">
            @if (count($local_partners) > 0)
                @foreach($local_partners as $partner)
                    <div class="col-md-6">
                        <img src="{{$partner->img}}" height="200" width="200" alt="Partner Logo">
                        {{$partner->name}}
                        @if (auth()->user() != null)
                            @if (auth()->user()->role == 'admin')
                                <br><br>
                                <a href="/partner/edit/{{$partner->id}}" class="btn btn-warning w-100">Edit</a>
                                <br><br>
                                <a href="/partner/delete/{{$partner->id}}" class="btn btn-warning w-100">Edit</a>
                            @endif
                        @endif
                    </div>
                @endforeach
            @else
                <hr>
                <h4 class="page-title text-center">NO KNOWN LOCAL PARTNERS</h4>
                <hr>
            @endif
        </div>

        <hr><hr>

        <h2 class="page-title pl-5">International Partners</h2>
        <div class="row">
            @if (count($int_partners) > 0)
                @foreach($int_partners as $partner)
                    <div class="col-md-6">
                        <img src="{{$partner->img}}" height="200" width="200" alt="Partner Logo">
                        {{$partner->name}}
                    </div>
                @endforeach
            @else
                <hr>
                <h4 class="page-title text-center">NO KNOWN INTERNATIONAL PARTNERS</h4>
                <hr>
            @endif
        </div>

        @if (auth()->user() != null)
            @if (auth()->user()->role == 'admin')
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="/partner/add" class="btn btn-danger w-100">Add a Partner</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            @endif
        @endif
    </div>
@endsection