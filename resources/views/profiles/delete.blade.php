@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="section black-bg">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card black-bg">
                <div class="card-header black-bg c-header">
                    Confirm delete
                </div>
                <div class="card-body black-bg">
                    Are you sure that you want to delete your account?
                    <br><br>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2"><a href="/profile/delete/confirm" class="btn btn-danger">Yes</a></div>
                        <div class="col-md-2"><a href="home" class="btn btn-warning">Cancel</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection