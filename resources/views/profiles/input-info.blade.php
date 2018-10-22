@extends('layouts.app')

@section('content')
<br><br><br><br><br>
    <div class=" black-bg container black-bg">
        <div class=" black-bg row justify-content-center black-bg">
            <div class=" black-bg col-md-8">
                <div class=" black-bg card">
                    <div class=" black-bg card-body">
                        <form method="POST" action="/social-register">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            
                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>First Name *</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="input-container black-bg form-control" name="f_name" placeholder="First Name" required autofocus>
                                </div>
                            </div>

                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>Middle Name *</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="input-container black-bg form-control" name="m_name" placeholder="Middle Name" autofocus>
                                </div>
                            </div>

                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>Last Name *</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="text" class="input-container black-bg form-control" name="l_name" placeholder="Last Name" required autofocus>
                                </div>
                            </div>

                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>Phone number</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="number" class="input-container black-bg form-control" name="phone" placeholder="+880**********" required autofocus>
                                </div>
                            </div>

                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>Date of Birth *</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <input type="date" class="input-container form-control contact-form" name="dob" placeholder="Date of Birth" required>
                                </div>
                            </div>

                            <div class="form-row text-white">
                                <div class="form-group col-md-4">
                                    <label>Gender *</label>
                                </div>
                                <div class="form-group col-md-8">
                                    <select name="gender" class="input-container form-control contact-form" required>
                                        <option value="">Please select a gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="black-bg btn register-btn btn-reg">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection