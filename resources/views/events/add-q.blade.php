@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="card black-bg">
        <div class="card-body black-bg">
            <form action="/add-q" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$id}}">
                <div class="form-group row">
                    <label for="question" class="col-md-2 col-form-label text-md-right">Question</label>

                    <div class="col-md-8">
                        <input type="text" maxlength="1000" class="form-control" name="question" value="{{ old('question') }}" placeholder="Question to be asked to the users" required autofocus>
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
                        <a href="/ticket/type/{{$id}}" class="black-bg btn btn-google" style="width: 900px">No more additional questions</a>
                    </div>
                </div>
                
            </form>

            @if (count($questions) > 0)
            <br><br>
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <h2 class="page-title ml-5">Previous Questions added</h2>
                </div>

                <br>

                @foreach ($questions as $question)
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-8 ml-2">
                            {{$question->question}}
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
@endsection