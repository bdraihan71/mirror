@extends('layouts.app')

@section('content')
    <div class="card black-bg">
        <div class="card-body black-bg">
            <form action="/events/create" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name of the event" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tagline" class="col-md-2 col-form-label text-md-right" >Tagline</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="tagline" value="{{ old('tagline') }}" placeholder="Tagline of the event" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date_start" class="col-md-2 col-form-label text-md-right" >Starting Date</label>

                    <div class="col-md-3">
                        <input type="date" class="form-control" name="date_start" value="{{ old('date_start') }}" required autofocus>
                    </div>

                    <label for="date_end" class="col-md-2 col-form-label text-md-right" >Ending Date</label>

                    <div class="col-md-3">
                        <input type="date" class="form-control" name="date_end" value="{{ old('date_end') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start" class="col-md-2 col-form-label text-md-right" >Starting Time</label>

                    <div class="col-md-3">
                        <input type="time" class="form-control" name="start" value="{{ old('start') }}" required autofocus>
                    </div>

                    <label for="end" class="col-md-2 col-form-label text-md-right" >Ending Time</label>

                    <div class="col-md-3">
                        <input type="time" class="form-control" name="end" value="{{ old('end') }}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                    <div class="col-md-8">
                        <textarea id="article-ckeditor" name="description" cols="30" rows="12" class="form-control" required>{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="location" class="col-md-2 col-form-label text-md-right" >Location</label>

                    <div class="col-md-3">
                        <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="Location of the event" required autofocus>
                    </div>

                    <label for="ticket_number" class="col-md-2 col-form-label text-md-right" >Total Ticket Types</label>

                    <div class="col-md-3">
                        <input type="number" class="form-control" name="ticket_number" value="{{ old('ticket_number') }}" placeholder="Total number of ticket types" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url_1" class="col-md-2 col-form-label text-md-right" >Ticket header</label>

                    <div class="custom-file col-md-8 ml-3">
                        <input type="file" name="url_1" class="custom-file-input" accept="image/*" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>

                <div class="form-group row ">
                    <label for="url_2" class="col-md-2 col-form-label text-md-right" >Ticket footer</label>

                    <div class="custom-file col-md-8 ml-3 r-5">
                        <input type="file" name="url_2" class="custom-file-input" accept="image/*" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>

                <div class="black-bg form-group row ml-1">
                    <div class="col-2"></div>
                    <div class="black-bg">
                        <button type="submit" class="black-bg btn btn-reg" style="width: 900px">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection