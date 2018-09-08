@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="row">
                    <h2 class="page-title">Create Add music</h2>
                </div>
                <br>
                <form action="/music/create" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <label for="name" class="form-label-control">Music Name</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="music" class="form-label-control">Music Link</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="music" class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-danger w-100" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection