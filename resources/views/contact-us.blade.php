@extends('layouts.app')

@section('content')
<div class="row" id="top"></div>
    <section id="contact-us" class="contact-us">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center contact-text-padding">
                    <h1 class="center__text contact-text" data-text="CONTACT US">CONTACT US</h1>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-8">
                    <form action="/contact-us" method="POST">
                        @csrf
                        @if (auth()->user() == null)
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <input type="text" maxlength="200" name="name" value="{{ old('name') }}" class="form-control contact-form" id="inputName" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" maxlength="250" name="email" value="{{ old('email') }}" class="form-control contact-form" id="inputEmail4" placeholder="Email" required>
                                </div>
                            </div>
                        @else
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <input type="text" maxlength="200" name="name" value="{{ old('name') }}" class="form-control contact-form" id="inputName" placeholder="Name" value="{{auth()->user()->profile->f_name.' '.auth()->user()->profile->m_name.' '.auth()->user()->profile->l_name}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" maxlength="250" name="email" value="{{ old('email') }}" class="form-control contact-form" id="inputEmail4" placeholder="Email" value="{{auth()->user()->email}}" required>
                                </div>
                            </div>
                        @endif
                        <div class="form-group">
                            <textarea class="form-control contact-form" name="body" id="exampleFormControlTextarea1" rows="3" placeholder="Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger contact-btn">Send</button>
                    </form>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h6 class="font-weight-bold contact-us-text">Head Office</h6>
                    <div class="light-bg">
                        {!!$contact[0]->content!!}
                    </div>
                    
                    <h6 class="font-weight-bold contact-us-text">Phone Numbers</h6>
                    <div class="light-bg">
                        {!!$contact[1]->content!!}
                    </div>
                    <h6 class="font-weight-bold contact-us-text">Email Address</h6>
                    <div class="light-bg">
                        {!!$contact[2]->content!!}
                    </div>
                    <h6 class="font-weight-bold contact-us-text">Stay Connected</h6>
                    <a class="sc-links" target="_blank" href="{{ config('social.FACEBOOK_LINK') }}"><i class="fab fa-facebook-square fa-2x facebook"></i></a>&ensp;
                    <a class="sc-links" target="_blank" href="{{ config('social.TWITTER_LINK') }}"><i class="fab fa-twitter fa-2x twitter"></i></a>&ensp;
                    <a class="sc-links" target="_blank" href="{{ config('social.LINKEDIN_LINK') }}"><i class="fab fa-linkedin fa-2x linkedin"></i></a>&ensp;
                </div>
            </div>
        </div>
    </section>
@endsection