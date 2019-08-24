@extends('layouts.app')

@section('content')
<div id="fullpage">
    <div class="section">
    
        <!-- Header -->
        <header id="home">
            @include('partials.navbar')
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner back-shadow">
                    @foreach($imgs as $img)
                        @if($loop->iteration == 1)
                            <div class="carousel-item item active">
                                <img class="d-block w-100" src="{{$img->content}}" alt="Slide {{$loop->iteration}}">
                            </div>
                        @else
                            <div class="carousel-item item">
                                <img class="d-block w-100" src="{{$img->content}}" alt="Slide {{$loop->iteration}}">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>

                <a href="#about" class="mouse-hover">
                    <div class="mouse"></div>
                </a>
            </div>

            <div class="title">
                <h1>{{$tagline->content}}</h1>
            </div>
        </header>
    </div>
    
    <div id="about" class="section">
		
			<div id="container">
				<div id="simple3D">
				  <div class="bag-3 d-none d-sm-block"></div>
				  <div class="cup-3 d-none d-sm-block"></div>
				  <div class="bag-2 d-none d-sm-block"></div>
				  <div class="cup-2 d-none d-sm-block"></div>
				  <div class="bag-1 d-none d-sm-block"></div>
				  <div class="cup-1 d-none d-sm-block"></div>
				</div>
			</div>
		
			<div id="content">

				<header id="header">
					<div id="div1" style="display: none">
                        <img class="parallax-img img-sm" src="/frontend/img/techynaf-logo.png">
                        <h1 class="footer-header parallax-text">Techynaf</h1>
                            <div class="p-scroll black-text">{!!$description->content!!}</div>
                    </div>	
				</header>
			</div>
		</div>

       
    
    <div class="section">
        <div class="container-fluid what-we-do">
            <div class="row text-white wwd-margin">
                <div class="col-md-3"></div>
                <div class="col-md-8">
                    <div class="owl-carousel wdwd-carousel">
                        @foreach ($wwd as $header)
                            <div>
                                <h1 class="contact-us-text">{{$header->content}}</h1>
                                <p>{!!$wwds[$loop->index]->content!!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    
    <div class="section" id="partners">
        <section class="partners py-1 text-center">
            <h1 class="contact-us-text mt-5 mb-4">Clients</h1>
            <div class="container">
                <div class="row">
                    <div class="owl-carousel partners-carousel">
                        @foreach($local_partners as $partner)
                            <div class="">
                                <img class="card-img-top partner-logo mx-auto" src="{{$partner->img}}" alt="Partner Logo">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @if (auth()->user() != null)
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'super-admin')
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="/remove/effect/international" class="btn btn-warning w-100 mt-5 text-center">
                                @if (App\WebContent::find(21) == null)
                                    Remove International Partners
                                @else
                                    @if (App\WebContent::find(21)->content == '0')
                                        Remove International Partners
                                    @else
                                        Show International Partners
                                    @endif
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endif
        
        @if (App\WebContent::find(21) == null || App\WebContent::find(21)->content == 0)
            <section class="partners py-5 text-center">
                <h1 class="contact-us-text mb-4">International Partners</h1>
                <div class="container">
                    <div class="row text-center">
                        @if (count($int_partners) < 6)
                        <div class="col-md-4"></div>
                            @foreach ($int_partners as $partner)
                                <div class="col-md-2">
                                    <div class="text-center">
                                        <img src="{{$partner->img}}" class="partner-logo partner-img" alt="Partner Logo">
                                    </div>
                                </div>
                            @endforeach
                        <div class="col-md-4"></div>
                        @else
                            <div class="owl-carousel partners-carousel">
                                @foreach($int_partners as $partner)
                                    <div class="">
                                        <img class="card-img-top" src="{{$partner->img}}" alt="Partner Logo">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    </div>
    
     <!-- Client Logos Section -->
     <div class="section review-sec">
     <section id="client-logos" class="wow faedIn my-5">
        <div class="container">
            <h1 class="text-center">Reviews</h1>
            <div class="owl-carousel testimonial-carousel text-dark text-center">
                @foreach($clients as $client)
                <div class="item">
                    <div class="testimonial">
                        <div class="Container">
                            <div class="row my-4">
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <img src="{{ $client->img }}" class="client-img" alt="Client-Img">
                                </div>
                                <div class="col-md-5"></div>
                            </div>
                        </div>
                        
                        <p class="lead">{{ $client->feedback }}</p>
                        <h6 class="quote-author">{{ $client->name }}, {{$client->company}}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-2">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    @if (auth()->user() != null)
                        @if (!App\Http\Controllers\Controller::notAdmin())
                            <a href="/clients" class="btn btn-primary w-100">Edit Client</a>
                        @endif
                    @endif
                </div>
                <div class="col-md-5"></div>
            </div>
    </section>
</div>
    <!-- End Client Logos Section -->



    <div class="section">
    <section id="footer" class="footer text-center">
        <div class="container">
            <div class="row footer-padding-top">
                <div class="col-md-3">
                <br>
                    <img class="logo" src="/frontend/img/techynaf-logo.png" alt="Logo" width="200px">
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
                <div class="col-md-2">
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
    </div>
</div> <!-- Fullpage div end -->

    <script src="/frontend/vendor/jquery/jquery.min.js"></script>
	<script src="/frontend/vendor/jquery/popper.min.js"></script>
	<script src="/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Scripts for WOW -->
	<script src="/frontend/vendor/animate/wow.min.js"></script>
	<!-- Scripts for OWL -->
	<script src="/frontend/vendor/owl/js/owl.carousel.min.js"></script>
	<!-- Scripts for Fullpage -->
	<script src="/frontend/vendor/fullpage/fullpage.min.js"></script>
	<!-- Custom scripts -->
	<script src="/frontend/js/script.js"></script>



	<script>
		$(document).ready(function () {
			$('#fullpage').fullpage({
				anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
				css3: true,
				scrollingSpeed: 1000,
				navigation: true,
				slidesNavigation: true,
				responsiveHeight: 330,
				dragAndMove: true,
				dragAndMoveKey: 'YWx2YXJvdHJpZ28uY29tX0EyMlpISmhaMEZ1WkUxdmRtVT0wWUc=',
				controlArrows: false,
				autoScrolling: false
			});
		});




		$(document).ready(function () {

			$('.partners-carousel').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				responsive: {
					0: {
						items: 1,
						nav: false,
						autoplay: true
					},
					600: {
						items: 3,
						nav: false,
						autoplay: true
					},
					1000: {
						items: 6,
						nav: true,
						autoplay: true
					}
				}
			});

        });
        
        $(document).ready(function () {

            $('.testimonial-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        autoplay: true
                    },
                    600: {
                        items: 1,
                        nav: false,
                        autoplay: true
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        autoplay: true
                    }
                }
            });

        });

		$(document).ready(function () {
			// Hide the div
			$("#div1").hide();
			// Show the div after 5s
			$("#div1").delay(500).fadeIn(300);
		});
	</script>

	<script>
		$(document).ready(function () {
			$(".mouse-hover").on('click', function (event) {
				if (this.hash !== "") {
					event.preventDefault();
					var hash = this.hash;
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					}, 800, function () {
						window.location.hash = hash;
					});
				}
			});
		});
    </script>
    
    <script>
        $(document).ready(function () {
        
            $('.wdwd-carousel').owlCarousel({
                loop: true,
                margin: 100,
                responsiveClass: true,
                autoplayTimeout: 8000,
                center: true,
    
    
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        autoplay: true
                    },
                    600: {
                        items: 2,
                        nav: false,
                        autoplay: true
                    },
                    1000: {
                        items: 3,
                        nav: false,
                        autoplay: true
                    }
                }
            });
    
        });


    </script>
@endsection
