@extends('layouts.app')

@section('content')
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
                                <label for="name" class=" black-bg col-md-4 col-form-label text-md-right">Phone number</label>

                                <div class=" black-bg col-md-6">
                                    <input type="number" class="input-container black-bg form-control" name="phone" placeholder="+880**********" required autofocus>
                                </div>
                            </div>

                            <div class=" black-bg form-group row">
                                <label for="name" class=" black-bg col-md-4 col-form-label text-md-right">Address</label>

                                <div class=" black-bg col-md-6">
                                    <input type="text" class="input-container black-bg form-control" name="address" required autofocus>
                                </div>
                            </div>

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <button type="submit" class="black-bg btn btn-reg">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection