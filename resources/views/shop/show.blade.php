@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
    <section id="shop" class="shop">
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-md-6">
                    <img class="responsive" height="500" width="500" src="{{$product->img}}" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <h1>{{$product->name}}</h1>
                    <hr class="border"><hr class="border">
                    <div class="row">
                        <div class="col-md-12">
                            {!!$product->description!!}
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <form action="/cart/add/{{$product->id}}" method="POST">
                @csrf
                <div class="row">
                    @if (auth()->user() != null)
                        @if (!App\Http\Controllers\Controller::notAdmin())
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a href="/shop/edit/{{$product->id}}" class="btn btn-primary w-100">Edit</a>
                                <br><br>
                                <a href="/shop/delete/{{$product->id}}" class="btn btn-warning w-100">Delete</a>
                                <br><br>
                            </div>
                            <div class="col-md-4"></div>
                        @endif
                    @endif
                </div>
                @if ($product->quantity == 0)
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>OUT OF STOCK</h1>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control" min="1" placeholder="Quantity" required>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <button class="btn btn-warning w-100" type="submit">Add To Cart</button>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                @endif
                <br><br>
            </form>
        </div>
    </section>
@endsection