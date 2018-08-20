@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="page-title">Contact Attemts</h3>

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
            <hr>
            <h4 class="text-center page-tile">NO CONTACT ATTEMPTS YET</h4>
            <hr>
        @endif
    </div>
@endsection