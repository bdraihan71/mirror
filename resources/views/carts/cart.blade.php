@extends('layouts.app')

@section('content')
<section id="checkout" class="checkout">
    <div class="container">
        <div class="row checkout-padding">
            <div class="col-lg-12">
                <div id="mainContentWrapper">
                    <div class="col-lg-10 offset-md-1">
                        <h2 class="text-white text-center">Review Your Purchase &amp; Complete Checkout</h2>
                        <hr>
                        
                        <div class="shopping_cart">
                            <form class="" role="form" action="" method="post" id="payment-form">
                                <div class="panel-group" id="accordion">
                                    <div class="card">
                                        <div class="font-black card-header">
                                            <h4 class="card-title">Review Your Purchase</h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse show">
                                            <div class="card-body font-black">
                                                <div class="items">
                                                    <div class="col-lg-12">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th class="text-center">Unit Price (BDT)</th>
                                                                    <th class="text-center">Quantity</th>
                                                                    <th class="text-center">Cumulative (BDT)</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            @foreach ($items as $item)
                                                                <tr>
                                                                    <td>
                                                                        {{$item->product->name}}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{$item->product->price}}
                                                                    </td class="text-center">
                                                                    <td class="text-center">
                                                                        {{$item->quantity}}
                                                                    </td>
                                                                    <td class="text-center"> 
                                                                        <b>{{$item->product->price * $item->quantity}}</b>
                                                                    </td>
                                                                    <td><a href="/cart/remove/{{$item->id}}" class="btn btn-warning"><i class="fas fa-times"></i></a></td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <h3>Order Total</h3>
                                                            <h3><span class="text-success">BDT {{$total}}</span></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="/shop" class="btn btn-info w-100">Continue Shopping</a>
                                        @if (count($items) != 0)
                                            <hr>
                                            <a href="/checkout" class="btn btn-danger w-100">Proceed to Checkout</a>
                                            <br>
                                        @else
                                            <br>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection