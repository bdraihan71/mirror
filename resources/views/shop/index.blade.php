@extends('layouts.app')

@section('content')
    <section id="shop" class="shop">
        <div class="container text-white text-center">
            <div class="row py-5">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <a href="/shop/{{$product->id}}"><img class="shop-img" src="{{$product->img}}" alt="Card image cap"></a>
                        <h5>{{$product->name}}</h5>
                        <p>{{$product->price}} BDT</p>
                    </div>

                    @if ($loop->iteration % 3 == 0)
                        </div>
                        <div class="row py-5">
                    @endif
                @endforeach
            </div>
        </div>
        @if (!App\Http\Controllers\Controller::notAdmin())
            <div class="row py-5">
                <div class="col-md-12"><a href="/shop/create" class="btn btn-custom w-100 h-100"><i class="fas fa-plus-circle fa-5x"></i></a></div>
            </div>
        @endif
    </section>
@endsection