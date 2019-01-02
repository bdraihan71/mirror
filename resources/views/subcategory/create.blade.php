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
                    <a href='/subcategories' class="btn btn-info">Category</a>
                    <br>
                    <br>
                    <form method="POST" action="/subcategories" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Category Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select class="form-control" id="exampleFormControlSelect1" name="categories_id" required>
                                    <option >Select Your Category </option>
                                    @foreach($categories as $category)
                                    <option value={{$category->id}}>{{$category->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Data *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="data" placeholder="Data Name" >
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Title *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="title" placeholder=" Title" required>
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