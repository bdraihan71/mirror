<?php $footer = App\Http\Controllers\Controller::footer()?>

<section id="footer" class="footer text-white text-center black-bg">
    <div class="container black-bg">
        <div class="row footer-padding-top">
            <div class="col-md-3">
            <br>
                <img class="logo" src="/frontend/img/logo.png" alt="Logo">
            </div>
            <div class="col-md-3">
                <h4 class="text-danger font-weight-bold">Head Office</h4><br>
                {!!$footer[0]->content!!}
            </div>
            <div class="col-md-3">
                <h4 class="text-danger font-weight-bold">Contact Us</h4><br>
                {!!$footer[1]->content!!}
                {!!$footer[2]->content!!}
            </div>
            <div class="col-md-3">
                <h4 class="text-danger font-weight-bold">Stay Connected</h4><br>
                <a class="sc-links" target="_blank" href="{{ config('social.FACEBOOK_LINK') }}"><i class="fab fa-facebook-square fa-2x facebook"></i></a>&ensp;
                <a class="sc-links" target="_blank" href="{{ config('social.TWITTER_LINK') }}"><i class="fab fa-twitter-square fa-2x twitter"></i></a>&ensp;
                <a class="sc-links" target="_blank" href="{{ config('social.YOUTUBE_LINK') }}"><i class="fab fa-youtube fa-2x youtube"></i></a>&ensp;
                <a class="sc-links" target="_blank" href="{{ config('social.INSTAGRAM_LINK') }}"><i class="fab fa-instagram fa-2x instagram"></i></a>&ensp;
                <a class="sc-links" target="_blank" href="{{ config('social.GOOGLE_LINK') }}"><i class="fab fa-google-plus-g fa-2x google"></i></a>&ensp;
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
    <p class="copyright text-center">ECUBE Entertainment &copy; 2018, <a href="http://www.techynaf.com/" class="text-danger font-weight-bold">Techynaf</a></p>
</section>