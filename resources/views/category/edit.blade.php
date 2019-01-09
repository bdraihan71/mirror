@extends('layouts.app')

@section('content')
    <div class="row" id="top"></div>
    <br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <a href='/home' class="btn btn-primary">Dashboard</a>
                    <a href='/categories' class="btn btn-info">Category</a>
                    <br>
                    <br>
                    <form method="POST" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="name" value ="{{$category->name}}" placeholder="Production Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Type *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select class="form-control" id="exampleFormControlSelect1" name="type">
                                @if ($category->type == 'Production' )
                                    <option value="Production">Production</option>
                                    <option value="Service">Service</option>
                                @elseif ($category->type == 'Service')
                                    <option value="Service">Service</option>
                                    <option value="Production">Production</option>
                                 @else
                                    <option >Select Your Category </option>
                                    <option value="Production">Production</option>
                                    <option value="Service">Service</option>
                                @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Image </label>
                            </div>
                            <div class="col-md-8">
                                <img src="{{ $category->image }}" class="rounded mx-auto d-block" alt="..." style="width:200px; margin-bottom: 12px; border: 2px solid white">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                
                            </div>
                            <div class="col-md-8">
                                <p>Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB</p>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Image *</label>
                            </div>
                            <div class="col-md-8">
                                <input  type="file" class="form-control" name="image"   >
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Call To Action *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="call_to_action" value = {{$category->call_to_action }} placeholder="Call To Action" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger register-btn">Add</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection