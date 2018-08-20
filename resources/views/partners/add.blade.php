@extends('layouts.app')

@section('content')
    <section id="shop" class="shop black-bg">
            <div class="container text-white text-center">
                <div class="row pt-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form method="POST" action="/shop/create">
                            @csrf
                            <div class="form-row text-white text-left">
                                <div class="form-group col-md-2">
                                    <label class="">Name *</label>
                                </div>
                                <div class="form-group col-md-10">
                                    <input type="text" class="form-control contact-form input-container" name="name" placeholder="Name of the product" required>
                                </div>
                            </div>
    
                            <div class="form-row text-white text-left">
                                <div class="form-group col-md-2">
                                    <label>Partner Type *</label>
                                </div>
                                <div class="form-group col-md-10">
                                    <select name="type" class="form-control" required>
                                        <option value="">Please select a partner type</option>
                                        <option value="local">Local Partner</option>
                                        <option value="international">International Partner</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-row text-white">
                                <div class="form-group col-md-2">
                                    <label>Partner Logo *</label>
                                </div>
                                <div class="form-group col-md-10">
                                    <input required type="file" class="form-control" name="img" placeholder="address">
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