@extends('layouts.app')

@section('content')
    <section id="shop" class="shop black-bg">
        <div class="container text-white text-center">
            <div class="row pt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="POST" action="/shop/edit/{{$product->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Name *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form input-container" name="name" placeholder="Name of the product" value="{{ old('name') == null ? $product->name : old('name') }}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Price in BDT *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="number" class="input-container form-control contact-form" name="price" placeholder="Price of the product" value="{{ old('price') == null ? $product->price : old('price') }}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Quantity *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form" name="quantity" placeholder="Quantity of the product" value="{{ old('quantity') == null ? $product->quantity : old('quantity') }}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Description *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <textarea name="description" id="article-ckeditor" class="form-control" cols="30" rows="10">{!! old('description') == null ? $product->description : old('description') !!}</textarea>
                            </div>
                        </div>
                        
                        <div class="form-row text-white">
                            <div class="form-group col-md-2">
                                <label>Product Image *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <div>Please upload images with ratio of 3:2, e.g. 290 x 193 | max image size is 2 MB</div><br>
                                <input type="file" class="form-control" name="img" accept="image/*">
                                <img src="{{$product->img}}" class="img-fluid" alt="Product Image">
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