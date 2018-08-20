@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title pl-5">Contact Attempts</h3>
            </div>
        </div>

        @if (count($contacts) > 0)
            @foreach($contacts as $contact)
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                {{$contact->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{$contact->email}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        {{$contact->body}}
                    </div>
                </div>
            @endforeach
        @else
        <br><br><br>
            <hr>
            <h4 class="text-center page-tile">NO CONTACT ATTEMPTS YET</h4>
            <hr>
        @endif
    </div>
@endsection