@extends('layouts.app')

@section('content')
    <section id="shop" class="shop black-bg">
        <div class="container text-white text-center">
            <div class="row pt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="POST" action="/clients/create" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Name *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" maxlength="200" class="form-control contact-form input-container" name="name" value="{{ old('name') }}" placeholder="Name of the client" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Feedback *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" maxlength="200" class="form-control contact-form input-container" name="feedback" value="{{ old('feedback') }}" placeholder="Client feedback" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                                <div class="form-group col-md-2">
                                    <label class="">Company Name *</label>
                                </div>
                                <div class="form-group col-md-10">
                                    <input type="text" maxlength="200" class="form-control contact-form input-container" name="company" value="{{ old('company') }}" placeholder="Client company name" required>
                                </div>
                            </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Client Type *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <select name="type" class="form-control" required>
                                    @if (old('type') == null)
                                        <option value="">Please select a Client type</option>
                                    @else
                                        <option value="{{ old('type') }}">{{ ucfirst(old('type')) }}</option>
                                    @endif

                                    <option value="local">Local Client</option>
                                    <option value="international">International Client</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Partner Logo *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <div>Please upload image of 150 x 150 | max image size is 2 MB</div><br>
                                <input required type="file" class="form-control" name="url" placeholder="Please upload images with ratio of 3:2, e.g. 1920 x 1280 | max image size is 2 MB">
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
