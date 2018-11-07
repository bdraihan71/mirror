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
                                <input type="text" maxlength="200" name="name" class="form-control contact-form" id="inputName" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" maxlength="250" name="email" class="form-control contact-form" id="inputEmail4" placeholder="Email" required>
                                </div>
                            </div>
                        @else
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <input type="text" maxlength="200" name="name" class="form-control contact-form" id="inputName" placeholder="Name" value="{{auth()->user()->profile->f_name.' '.auth()->user()->profile->m_name.' '.auth()->user()->profile->l_name}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" maxlength="250" name="email" class="form-control contact-form" id="inputEmail4" placeholder="Email" value="{{auth()->user()->email}}" required>
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
                <div class="col-md-3 text-white">
                    <h6 class="text-danger font-weight-bold">Head Office</h6>
                    {!!$contact[0]->content!!}
                    <h6 class="text-danger font-weight-bold">Phone Numbers</h6>
                    {!!$contact[1]->content!!}
                    <h6 class="text-danger font-weight-bold">Email Address</h6>
                    {!!$contact[2]->content!!}
                    <h6 class="text-danger font-weight-bold">Stay Connected</h6>
                    <a class="sc-links" target="_blank" href="{{ config('social.FACEBOOK_LINK') }}"><i class="fab fa-facebook-square fa-2x facebook"></i></a>&ensp;
                <a class="sc-links" target="_blank" href="{{ config('social.YOUTUBE_LINK') }}"><i class="fab fa-youtube fa-2x youtube"></i></a>&ensp;
                <a class="sc-links" target="_blank" href="{{ config('social.INSTAGRAM_LINK') }}"><i class="fab fa-instagram fa-2x instagram"></i></a>&ensp;
                </div>
            </div>
        </div>
    </section>
@endsection