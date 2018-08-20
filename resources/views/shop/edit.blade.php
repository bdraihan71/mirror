@extends('layouts.app')

@section('content')
    <section id="shop" class="shop black-bg">
        <div class="container text-white text-center">
            <div class="row pt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="POST" action="/shop/edit/{{$product->id}}">
                        @csrf
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Name *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form input-container" name="name" placeholder="Name of the product" value="{{$product->name}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Price in BDT *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="number" class="input-container form-control contact-form" name="price" placeholder="Price of the product" value="{{$product->price}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Quantity *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form" name="quantity" placeholder="Quantity of the product" value="{{$product->quantity}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Description *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" id="article-ckeditor" class="form-control contact-form" name="description" value="{!!$product->description!!}">
                            </div>
                        </div>
                        
                        <div class="form-row text-white">
                            <div class="form-group col-md-2">
                                <label>Product Image *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="file" class="form-control" name="img" placeholder="address">
                            </div>
                        </div>
                        
                        <br>

                        <button type="submit" class="btn btn-danger register-btn">Save</button>
                        <br><br><br>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
@endsection