@extends('layouts.app')

@section('content')
    <br><br><br><br><br><br>
    <form action="/resend" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="text-center h3"><label for="email" class="form-label-control">Registered Email Address</label></div>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-4"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button class="btn btn-danger w-100" type="submit">Resend</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
@endsection