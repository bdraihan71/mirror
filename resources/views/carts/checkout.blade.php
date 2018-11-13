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
                            <a href="/shop" class="btn btn-info w-100">Continue Shopping</a>
                            <hr>
                            <div class="shopping_cart">
                                <form class="" role="form" action="" method="post" id="payment-form">
                                    <div class="panel-group" id="accordion">
                                        <div class="card">
                                            <div class="font-black card-header">
                                                <h4 class="card-title">Review Your Delivery and Payment Details</h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse show">
                                                <div class="card-body font-black">
                                                    <div class="items">
                                                        <div class="col-lg-12">
                                                            <form action="/checkout" method="POST">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label for="address">Street Address</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input type="text" class="form-control" name="address" maxlength="300" value="{{old('address')}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label for="division">Division</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select name="division" class="form-control" required>
                                                                                    <option value="">Please select a division</option>
                                                                                    <option value="Dhaka">Dhaka</option>
                                                                                    <option value="Khulna">Khulna</option>
                                                                                    <option value="Barisal">Barisal</option>
                                                                                    <option value="Chittagong">Chittagong</option>
                                                                                    <option value="Mymensingh">Mymensingh</option>
                                                                                    <option value="Rajshahi">Rajshahi</option>
                                                                                    <option value="Rangpur">Rangpur</option>
                                                                                    <option value="Sylhet">Sylhet</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label for="phone">Contact Number</label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <input type="number" class="form-control" name="phone" value="{{old('phone')}}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-3">Payment Method</div>
                                                                    <div class="col-md-3">
                                                                        <input type="radio" name="meth" id="cash" autocomplete="off" value="cash" {{old('meth') == null ? 'checked' : (old('meth') == "cash" ? 'checked' : "")}}>
                                                                        <label for="cash">Cash on delivery</label>
                                                                    </div>
                                                                    <div class="col-md-2"></div>
                                                                    <div class="col-md-3">
                                                                        <input type="radio" name="meth" id="online" autocomplete="off" value="online" {{(old('meth') == "cash" ? 'checked' : "")}}>
                                                                        <label for="online">Pay online</label>
                                                                    </div>
                                                                    <div class="col-md-1"></div>
                                                                </div>
                                                                <hr>
                                                                <button type="submit" class="btn btn-primary w-100">Continue Checkout</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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