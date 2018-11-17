@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
<br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row">
                <h3 class="page-title"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ISSUE TICKET</h3>
            </div>
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/issue/create">
                        @csrf
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Event *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select name="event" class="form-control" required>
                                    <option value="">Please select a event</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Issued To</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form input-container" name="name" value="{{ old('name') }}" placeholder="Name of the person ticket is being issued to">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Email Address</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="email" class="form-control contact-form input-container" name="email" value="{{ old('email') }}" placeholder="Email address of the person">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Phone</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form input-container" name="phone" value="{{ old('phone') }}" placeholder="Phone number of the person">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Company</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form input-container" name="company" value="{{ old('company') }}" placeholder="Company of employment of the person">
                            </div>
                        </div>
                        
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Designation</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form input-container" name="designation" value="{{ old('designation') }}" placeholder="Designation of the person">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger register-btn">Issue</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection