@extends('layouts.app')

@section('content')
<br><br><br><br><br>
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
                                            @if ($type->price == 0)
                                                <option value="{{$type->id}}">Complimentary</option>
                                            @else
                                                <option value="{{$type->id}}">{{ $type->name.' - '.App\Http\Controllers\Controller::formatMoney($type->price) }} BDT</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <button type="submit" class="black-bg btn btn-reg w-100">
                                {{ __('Buy') }}
                            </button>

                            <br><br>

                            <a href="/cancel/purchase/{{$id}}" class="black-bg btn btn-reg w-100">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection