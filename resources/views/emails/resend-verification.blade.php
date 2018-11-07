@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="/resend" method="POST">
                @csrf
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <label for="email" class="form-label-control">Registered Email Address</label> <br>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                </div>
                <div class="col-md-4"></div>

                <button class="w-100" type="submit">Send</button>
            </form>
        </div>
    </div>
@endsection