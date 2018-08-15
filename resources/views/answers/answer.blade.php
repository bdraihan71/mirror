@extends('layouts.app')

@section('content')
    <div class=" black-bg container black-bg">
        <div class=" black-bg row justify-content-center black-bg">
            <div class=" black-bg col-md-8">
                <div class=" black-bg card">
                    <div class=" black-bg card-body">
                        <form method="POST" action="/question/answer/{{$id}}">
                            @csrf

                            @foreach($questions as $question)
                                <input type="hidden" name="qid[]" value="{{$question->id}}">
                                <div class=" black-bg form-group row">
                                    <label for="answer[]" class=" black-bg col-md-4 col-form-label text-md-right">{{$question->question}}*</label>
    
                                    <div class=" black-bg col-md-6">
                                        <input type="text" class="input-container black-bg form-control" name="answer[]" required autofocus>
                                    </div>
                                </div>
                            @endforeach

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