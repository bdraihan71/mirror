@extends('layouts.app')

@section('content')
    <div class=" black-bg container black-bg">
        <div class=" black-bg row justify-content-center black-bg">
            <div class=" black-bg col-md-8">
                <div class=" black-bg card">
                    <div class=" black-bg card-body">
                        <form method="POST" action="/ticket/buy/{{$id}}">
                            @csrf

                            <div class=" black-bg form-group row">
                                <label for="type" class=" black-bg col-md-4 col-form-label text-md-right">Select Ticket Type</label>

                                <div class=" black-bg col-md-6">
                                    <select name="type" class="form-control" required autofocus>
                                        <option value="">Please select a ticket</option>
                                        @foreach($types as $type)
                                            <option value="{{$type->id}}">{{$type->name.' - '.$type->price.' BDT '}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <button type="submit" class="black-bg btn btn-reg">
                                        {{ __('Buy') }}
                                    </button>
                                </div>
                            </div>

                            <br>

                            <div class="black-bg form-group row mb-0">
                                <div class="black-bg">
                                    <a href="/cancel/purchase/{{$id}}" class="btn btn-google">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection