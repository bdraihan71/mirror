<?php $footer = App\Http\Controllers\Controller::footer()?>

<section id="footer" class="footer text-center white-bg">
    <div class="container white-bg">
        <div class="row footer-padding-top">
            <div class="col-md-3">
            <br>
                <img class="logo" width="150px" src="/frontend/img/techynaf-logo.png" alt="Logo">
            </div>
            <div class="col-md-3">
                <h4 class="footer-header font-weight-bold">Head Office</h4><br>
                <div class="white-bg">
                    {!!$footer[0]->content!!}
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-header font-weight-bold">Contact Us</h4><br>
                <div class="white-bg">
                    {!!$footer[1]->content!!}
                    {!!$footer[2]->content!!}
                </div>
                
            </div>
            <div class="col-md-3">
                <h4 class="footer-header font-weight-bold">Stay Connected</h4><br>
                <a class="sc-links" target="_blank" href="{{ config('social.FACEBOOK_LINK') }}"><i class="fab fa-facebook-square fa-2x facebook"></i></a>&ensp;
                        <a class="sc-links" target="_blank" href="{{ config('social.TWITTER_LINK') }}"><i class="fab fa-twitter fa-2x twitter"></i></a>&ensp;
                        <a class="sc-links" target="_blank" href="{{ config('social.LINKEDIN_LINK') }}"><i class="fab fa-linkedin fa-2x linkedin"></i></a>&ensp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-2 w-100">
                @if (auth()->user() != null)
                    @if (!App\Http\Controllers\Controller::notAdmin())
                        <a href="/alter/footer" class="btn btn-primary w-100">Edit</a>
                    @endif
                @endif
            </div>
            <div class="col-md-5"></div>
        </div>
    </div>
</section>