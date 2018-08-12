@extends('layouts.app')

@section('content')
    <div class="card black-bg">
        <div class="card-body black-bg">
            <form action="/add-q" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group row">
                    <label for="question" class="col-md-2 col-form-label text-md-right">Question</label>

                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="{{ old('question') }}" placeholder="Question to be asked to the users" required autofocus>
                    </div>
                </div>

                <div class="black-bg form-group row ml-1">
                    <div class="col-2"></div>
                    <div class="black-bg">
                        <button type="submit" class="black-bg btn btn-reg" style="width: 900px">
                            {{ __('Add') }}
                        </button>
                    </div>
                </div>

                <div class="black-bg form-group row ml-1">
                    <div class="col-2"></div>
                    <div class="black-bg">
                        <a href="/events/{{$id}}" class="black-bg btn btn-google" style="width: 900px">No more additional information</a>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection