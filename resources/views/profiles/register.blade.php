@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
<br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/register">
                        @csrf
                        <input type="hidden" name="role" value="normal">
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>First Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="firstname" maxlength="80" class="form-control contact-form input-container" name="f_name" value="{{ old('f_name') }}" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Middle Name</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="m_name" value="{{ old('m_name') }}" placeholder="Middle Name">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Last Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="lastname" maxlength="80" class="input-container form-control contact-form" name="l_name" value="{{ old('l_name') }}" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Date of Birth *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="date" class="input-container form-control contact-form" name="dob" value="{{ old('dob') }}" placeholder="Date of Birth" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Gender *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select name="gender" class="input-container form-control contact-form" required>
                                    @if (old('gender') != null)
                                        <option value="{{old('gender')}}">{{ucfirst(old('gender'))}}</option>
                                    @else
                                        <option value="">Please select a gender</option>
                                    @endif
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Email Address *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="email" maxlength="250" class="form-control contact-form" name="email" value="{{ old('email') }}" placeholder="Email address" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Password *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="password" class="form-control contact-form {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="**********" required>
                                @if ($errors->has('password'))
                                    <span class=" black-bg invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Confirm Password *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input id="password-confirm" type="password" name="confirmed_password" class="form-control contact-form" id="company" placeholder="**********" required>
                            </div>
                        </div>	

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Phone *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="number" minlength="11" maxlength="14" class="form-control contact-form" name="phone" value="{{ old('phone') }}" placeholder="+880**********" required>
                            </div>
                        </div>
                        
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>FB link</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form" name="fb_link" value="{{ old('fb_link') }}" placeholder="">
                            </div>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-danger register-btn">Register</button>
                        <hr>
                        <a href="{{url('/redirect/facebook')}}" class="black-bg btn register-btn btn-facebook">Login with Facebook</a>
                        <hr>
                        <a href="/redirect" class="black-bg btn register-btn btn-google">Login with Gmail</a>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection