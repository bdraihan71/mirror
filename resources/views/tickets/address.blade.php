@extends('layouts.app')

@section('content')
    <br><br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <h3 class="page-title">Please enter delivery address</h3>
        </div>

        <br><br>
        <form action="/delivery" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3"><label for="street">Street Address</label></div>
                        <div class="col-md-9"><input type="text" maxlength="300" name="street" class="form-control" required></div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-3"><label for="street">Division</label></div>
                        <div class="col-md-9">
                            <select name="division" class="form-control" required>
                                <option value="">Please select a division</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Barisal">Barisal</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Sylhet">Sylhet</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-danger w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
    </div>
@endsection