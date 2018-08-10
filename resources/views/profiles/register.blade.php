@extends('layouts.app')

@section('content')
    <div class=" black-bg container black-bg">
        <div class=" black-bg row justify-content-center black-bg">
            <div class=" black-bg col-md-8">
                <div class=" black-bg card">
                    <div class=" black-bg card-body">
                        <form method="POST" action="/register">
                            @csrf

                            <div class=" black-bg form-group row">
                                <label for="name" class=" black-bg col-md-4 col-form-label text-md-right">First Name*</label>

                                <div class=" black-bg col-md-6">
                                    <input type="text" class="input-container black-bg form-control" name="f_name" required autofocus>
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="name" class=" black-bg col-md-4 col-form-label text-md-right">Middle Name</label>

                                <div class=" black-bg col-md-6">
                                    <input type="text" class="input-container black-bg form-control" name="m_name" autofocus>
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="name" class=" black-bg col-md-4 col-form-label text-md-right">Last Name*</label>

                                <div class=" black-bg col-md-6">
                                    <input type="text" class="input-container black-bg form-control" name="l_name" required autofocus>
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="email" class=" black-bg col-md-4 col-form-label text-md-right">Email-address*</label>

                                <div class=" black-bg col-md-6">
                                    <input id="email" type="email" class="input-container black-bg form-control " name="email" required>
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="password" class=" black-bg col-md-4 col-form-label text-md-right">Password*</label>

                                <div class=" black-bg col-md-6">
                                    <input id="password" type="password" class="input-container black-bg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class=" black-bg invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="password-confirm" class=" black-bg col-md-4 col-form-label text-md-right">Confirm Password*</label>

                                <div class=" black-bg col-md-6">
                                    <input id="password-confirm" type="password" class="input-container black-bg form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <button type="submit" class="black-bg btn btn-reg">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <br>

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <a href="{{url('/redirect')}}" class="black-bg btn-facebook btn">Login with Facebook</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection