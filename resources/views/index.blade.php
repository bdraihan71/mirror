@extends('layouts.app')

@section('content')
<div id="fullpage">
    <div class="section">
    
        <!-- Header -->
        <header id="home">
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark header" id="nav">
                <div class="container">
                    <a class="navbar-brand" href="/"><img class="logo" src="/frontend/img/logo.svg" alt="Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav font-weight-bold nav-back">
                            <a class="nav-item nav-link my-3" href="/#top">HOME</a>
                            <a class="nav-item nav-link my-3" href="/#page2">ABOUT US</a>
                            <a class="nav-item nav-link my-3" href="/#page4">PARTNERS</a>
                            <a class="nav-item nav-link my-3" href="/events/all/#top">EVENTS</a>
                            <a class="nav-item nav-link my-3" href="/shop/#top">SHOP</a>
                            @if(auth()->user() != null)
                                <a class="nav-item nav-link my-3" href="/logout">LOGOUT</a>
                                <a class="nav-item nav-link my-3" href="/home/#top">DASHBOARD</a>
                            @else
                                <a class="nav-item nav-link my-3" href="/register/#top">REGISTER</a>
                                <a class="nav-item nav-link my-3" href="/login/#top">LOGIN</a>
                            @endif
                            <a class="nav-item nav-link my-3" href="/media">MEDIA</a>
                            <a class="nav-item nav-link my-3" href="/music">MUSIC</a>
                            <a class="nav-item nav-link my-3" href="/contact-us/#top">CONTACT US</a>
                            @if (auth()->user() != null)
                                <a class="nav-item nav-link text-dark" href="/cart">
                                    <span class="fa-stack">
                                        <i class="fas fa-cart-plus fa-2x cart-margin-left"></i>
                                        @if (App\Http\Controllers\Controller::cartItems() != 0)
                                            <span class="badge-cart">{{App\Http\Controllers\Controller::cartItems()}}</span>
                                        @endif
                                    </span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
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
                {{-- <a href="#feature" class="mouse-hover">
                  <div class="mouse"></div>
                </a> --}}
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
                        <img class="parallax-img img-sm" src="/frontend/img/parallax6.png">
                        <h1 class="footer-header parallax-text">Ecube Entertainment</h1>
                        <div class="p-scroll" style="height:200px">{!!$description->content!!}</div>
                    </div>	
				</header>
	
			</div>
		
		
		</div>
    
    
    
    
    
    
    
    
    <div class="section">
        <div class="container-fluid what-we-do">
            <div class="row text-white">
                <div class="col-md-3"></div>
                <div class="col-md-8">
                    <div class="owl-carousel wdwd-carousel">
                        @foreach ($wwd as $header)
                            <div>
                                <h1 class="text-danger">{{$header->content}}</h1>
                                <p>{!!$wwds[$loop->index]->content!!}</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section" id="partners">
        <section class="partners py-1 text-center">
            <h1 class="text-danger">Partners</h1>
            <div class="container">
                <div class="row">
                    <div class="owl-carousel partners-carousel">
                        @foreach($local_partners as $partner)
                            <div class="">
                                <img class="card-img-top partner-logo" src="{{$partner->img}}" alt="Partner Logo">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="partners py-5 text-center">
            <h1 class="text-danger">International Partners</h1>
            <div class="container">
                <div class="row">
                    @if (count($int_partners) < 6)
                        @foreach ($int_partners as $partner)
                            <div class="col">
                                <div class="text-center">
                                    <img src="{{$partner->img}}" class="partner-logo partner-img" alt="Partner Logo">
                                </div>
                            </div>
                        @endforeach
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
    </div>
    
    
    
    
    
    <div class="section">
    
        <section id="footer" class="footer text-white text-center">
            <div class="container">
                <div class="row footer-padding-top">
                    <div class="col-md-3">
                    <br>
                        <img class="logo" src="/frontend/img/logo.svg" alt="Logo">
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-header font-weight-bold">Head Office</h4><br>
                        {!!$footer[0]->content!!}
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-header font-weight-bold">Contact Us</h4><br>
                        {!!$footer[1]->content!!}
                        {!!$footer[2]->content!!}	
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-header font-weight-bold">Stay Connected</h4><br>
                        <a class="sc-links" target="_blank" href="{{ config('social.FACEBOOK_LINK') }}"><i class="fab fa-facebook-square fa-2x facebook"></i></a>&ensp;
                        <a class="sc-links" target="_blank" href="{{ config('social.YOUTUBE_LINK') }}"><i class="fab fa-youtube fa-2x youtube"></i></a>&ensp;
                        <a class="sc-links" target="_blank" href="{{ config('social.INSTAGRAM_LINK') }}"><i class="fab fa-instagram fa-2x instagram"></i></a>&ensp;
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
                autoplayTimeout: 2500,
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
