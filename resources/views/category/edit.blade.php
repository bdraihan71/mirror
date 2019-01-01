@extends('layouts.app')

@section('content')
    <div class="row" id="top"></div>
    <br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/productions" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="firstname" maxlength="80" class="form-control contact-form input-container" name="name" value="{{$production->name }}" placeholder="Production Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Image *</label>
                            </div>
                            <div class="form-group col-md-8" >
                                <input type="file" class="custom-file-input" name="image" value="{{$production->image}}">
                                <label class="custom-file-label btn " >Choose file</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger register-btn">Add</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection