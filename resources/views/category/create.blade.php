@extends('layouts.app')

@section('content')
    <div class="row" id="top"></div>
    <br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/categories" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="firstname" maxlength="80" class="form-control contact-form input-container" name="name" value="{{ old('f_name') }}" placeholder="Production Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Type *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <select class="form-control" id="exampleFormControlSelect1" name="type">
                                    <option selected>Select Your Category </option>
                                    <option value="Production">Production</option>
                                    <option value="service">Service</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Image *</label>
                            </div>
                            <div class="col-md-8">
                                <input required type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label> Call To Action *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="firstname" maxlength="80" class="form-control contact-form input-container" name="call_to_action" value="{{ old('f_name') }}" placeholder="Call To Action" required>
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