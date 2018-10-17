@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
<br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <br>

            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <div class="form-group row black-bg">
                    <label for="email" class="col-sm-4 col-form-label text-md-right black-bg">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6 black-bg">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row black-bg">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row black-bg">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row black-bg">
                    <div class="col-md-6 offset-md-4">
                        <a href="/resend">Resend Verification Email</a>
                    </div>
                </div>

                <button type="submit" class="btn black-bg register-btn btn-reg">{{ __('Login') }}</button>
                <br>
                <br>
                <a href="{{url('/redirect/facebook')}}" class="black-bg btn-facebook register-btn btn">Login with Facebook</a>
                <br>
                <br>
                <a href="/redirect" class="black-bg register-btn btn-google btn">Login with Gmail</a>
            </form>
        </div>
    </div>
</div>
@endsection
