@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class=" black-bg container black-bg">
        <div class=" black-bg row justify-content-center black-bg">
            <div class=" black-bg col-md-8">
                <div class=" black-bg card">
                    <div class=" black-bg card-body">
                        <form method="POST" action="/social-register">
                            @csrf
                            <input type="hidden" name="name" value="{{$name}}">
                            <input type="hidden" name="id" value="{{$id}}">

                            <div class=" black-bg form-group row">
                                <label for="phone" class=" black-bg col-md-4 col-form-label text-md-right">Phone number</label>

                                <div class=" black-bg col-md-6">
                                    <input type="number" class="input-container black-bg form-control" name="phone" placeholder="+880**********" required autofocus>
                                </div>
                            </div>

                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>Date of Birth *</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="date" class="input-container form-control contact-form" name="dob" placeholder="Date of Birth" required>
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="address" class=" black-bg col-md-4 col-form-label text-md-right">Address</label>

                                <div class=" black-bg col-md-6">
                                    <input type="text" class="input-container black-bg form-control" name="address" required autofocus>
                                </div>
                            </div>
                            <button type="submit" class="black-bg btn register-btn btn-reg">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection