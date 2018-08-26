@extends('layouts.app')

@section('content')
<br><br><br><br>
    <section id="register" class="register black-bg">
        <div class="container">
            <div class="row pt-3">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" action="/create/admin">
                        @csrf
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>First Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="firstname" class="form-control contact-form input-container" name="f_name" placeholder="First Name" required>
                            </div>
                        </div>

                        <input type="hidden" name="role" value="admin">

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Middle Name</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form input-container" name="m_name" placeholder="Middle Name">
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Last Name *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="lastname" class="input-container form-control contact-form" name="l_name" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Email Address *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="email" class="form-control contact-form" name="email" placeholder="Email address" required>
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Password *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="password" class="form-control contact-form {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="**********" required>
                                @if ($errors->has('password'))
                                    <span class=" black-bg invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Confirm Password *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input id="password-confirm" type="password" class="form-control contact-form" id="company" placeholder="**********" required>
                            </div>
                        </div>	

                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Phone *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="number" class="form-control contact-form" name="phone" placeholder="+880**********" required>
                            </div>
                        </div>
                        
                        <div class="form-row text-white">
                            <div class="form-group col-md-4">
                                <label>Address *</label>
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control contact-form" name="address" placeholder="" required>
                            </div>
                        </div>
                        
                        
                        
                        
                        <button type="submit" class="btn btn-danger register-btn">Create</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </section>
@endsection