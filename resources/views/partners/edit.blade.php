@extends('layouts.app')

@section('content')
    <section id="shop" class="shop black-bg">
        <div class="container text-white text-center">
            <div class="row pt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="POST" action="/partner/edit/{{$partner->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Name *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form input-container" name="name" placeholder="Name of the product" value="{{$partner->name}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Partner Type *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <select name="type" class="form-control" required>
                                    @if($partner->type == 'local')
                                        <option value="local">Local Partner</option>
                                        <option value="international">International Partner</option>
                                    @else
                                        <option value="international">International Partner</option>
                                        <option value="local">Local Partner</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Partner Logo *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <div>Please upload image of 231 x 231 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url">
                                <img src="{{$partner->img}}" class="img-fluid" alt="Partner logo">
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