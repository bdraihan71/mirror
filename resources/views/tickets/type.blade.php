@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class="card black-bg">
        <div class="card-body black-bg">
            <form action="/tickets/create" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$event->id}}">
                @for ($i = 0; $i < $event->ticket_number; $i++)
                    <div class="form-group row">
                        <label for="type[]" class="col-md-2 col-form-label text-md-right" >Ticket type</label>

                        <div class="col-md-2">
                            <input type="text" class="form-control" name="type[]" required autofocus>
                        </div>

                        <label for="number[]" class="col-md-2 col-form-label text-md-right" >Number of Tickets</label>

                        <div class="col-md-1">
                            <input type="number" class="form-control" name="number[]" required autofocus>
                        </div>

                        <label for="price[]" class="col-md-2 col-form-label text-md-right" >Price of Tickets</label>

                        <div class="col-md-1">
                            <input type="number" class="form-control" name="price[]" required autofocus>
                        </div>
                    </div>
                @endfor

                <div class="black-bg form-group row ml-1">
                    <div class="col-2"></div>
                    <div class="black-bg">
                        <button type="submit" class="black-bg btn btn-reg" style="width: 900px">
                            {{ __('Create Tickets') }}
                        </button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection