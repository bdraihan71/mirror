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
                    <form method="POST" action="/categories" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="name" placeholder="Category Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Type *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select class="form-control" id="exampleFormControlSelect1" name="type" required>
                                    <option value="">Select Your Category </option>
                                    <option value="logistics">Logistics</option>
                                    <option value="services">Services</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Image *</label>
                            </div>
                            <div class="col-md-8">
                                <input required type="file" class="form-control" name="image" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                
                            </div>
                            <div class="col-md-8">
                                <p>Please upload images with ratio of 3:2, e.g. 1193 x 403 | max image size is 2 MB</p>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Call To Action *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" maxlength="80" class="form-control contact-form input-container" name="call_to_action"  placeholder="Call To Action" value="BOOK NOW" required>
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