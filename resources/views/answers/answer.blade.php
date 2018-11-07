@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class=" black-bg container black-bg">
        <div class=" black-bg row justify-content-center black-bg">
            <div class=" black-bg col-md-8">
                <div class=" black-bg card">
                    <h3 class="page-title">Please answer the following questions to purchase the ticket</h3>
                    <div class=" black-bg card-body">
                        <form method="POST" action="/question/answer/{{$id}}">
                            @csrf

                            @foreach($questions as $question)
                                <input type="hidden" name="qid[]" value="{{$question->id}}">
                                <div class=" black-bg form-group">
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                            <label for="answer[]" class="black-bg col-form-label text-md-right">{{$question->question}}*</label>
                                        </div>
                                    </div>
    
                                        <div class="row black-bg">
                                            <div class="col-md-12">
                                                <input type="text" class="input-container black-bg form-control" name="answer[]" value="{{old('answer'.$loop->index)}}" required maxlength="1000" autofocus>
                                            </div>
                                        </div>
                                </div>
                            @endforeach

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <button type="submit" class="black-bg btn btn-reg" style="width: 722px">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>

                            <br>

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <a href="/events/{{$id}}" class="btn btn-google" style="width: 722px">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection