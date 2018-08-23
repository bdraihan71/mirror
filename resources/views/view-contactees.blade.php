@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title pl-5 bor-b">Contact Attempts</h3>
            </div>
        </div>

        <br><br>

        @if (count($contacts) > 0)
            @foreach($contacts as $contact)
            <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 bor-b">
                        <div class="row">
                            <div class="col-md-12 bor-b">
                                {{$contact->name}}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                {{$contact->email}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 bor-b"></div>
                    <div class="col-md-5 bor-b">
                        {{$contact->body}}
                    </div>
                    <div class="col-md-1"></div>
                </div>
            @endforeach

            {{ $contacts->links() }}
        @else
        <br><br><br>
            <hr>
            <h4 class="text-center page-tile">NO CONTACT ATTEMPTS YET</h4>
            <hr>
        @endif
    </div>
@endsection