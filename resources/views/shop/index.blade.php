@extends('layouts.app')

@section('content')
    <section id="shop" class="shop">
        <div class="container text-white text-center">
            <div class="row py-5">
                @foreach ($products as $product)
                    @if ($product->quantity == 0)
                        <div class="col-md-4">
                            <a href="/shop/{{$product->id}}"><img class="shop-img" src="{{$product->img}}" alt="Card image cap"></a>
                            <h5>{{$product->name}}</h5>
                            <p>OUT OF STOCK</p>
                        </div>
                    @else
                        <div class="col-md-4">
                            <a href="/shop/{{$product->id}}"><img class="shop-img" src="{{$product->img}}" alt="Card image cap"></a>
                            <h5>{{$product->name}}</h5>
                            <p>{{ App\Http\Controllers\Controller::formatMoney($product->price) }} BDT</p>
                        </div>
                    @endif

                    @if ($loop->iteration % 3 == 0)
                        </div>
                        <div class="row py-5">
                    @endif
                @endforeach
            </div>
        </div>
        <div class="text-center">{{ $products->links() }}</div>
        @if (auth()->user() != null)
            @if (!App\Http\Controllers\Controller::notAdmin())
                <div class="row py-5">
                    <div class="col-md-12"><a href="/shop/create" class="btn btn-custom w-100 h-100"><i class="fas fa-plus-circle fa-5x"></i></a></div>
                </div>
            @endif
        @endif
    </section>
@endsection