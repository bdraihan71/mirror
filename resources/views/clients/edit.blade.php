@extends('layouts.app')

@section('content')
    <section id="shop" class="shop black-bg">
        <div class="container text-white text-center">
            <div class="row pt-3">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form method="POST" action="/clients/edit/{{$client->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Name *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form input-container" name="name" value="{{ old('name') == null ? $client->name : old('name') }}" placeholder="Name of the client" value="{{ $client }}->name}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Feedback *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form input-container" name="feedback" value="{{ old('feedback') == null ? $client->feedback : old('feedback') }}" placeholder="Client Feedback" value="{{ $client }}->feedback}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label class="">Company Name *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <input type="text" class="form-control contact-form input-container" name="company" value="{{ old('company') == null ? $client->company : old('company') }}" placeholder="Client company" value="{{ $client }}->company}}" required>
                            </div>
                        </div>

                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>Client Type *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <select name="type" class="form-control" required>
                                    @if($client->type == 'local')
                                        <option value="local">Local client</option>
                                        <option value="international">International client</option>
                                    @else
                                        <option value="international">International client</option>
                                        <option value="local">Local client</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row text-white text-left">
                            <div class="form-group col-md-2">
                                <label>client Logo *</label>
                            </div>
                            <div class="form-group col-md-10">
                                <div>Please upload image of 150 x 150 | max image size is 2 MB</div>
                                <input type="file" class="form-control" name="url" accept="image/*">
                                <img src="{{$client->img}}" class="img-fluid" alt="Partner logo">
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
