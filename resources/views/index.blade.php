@extends('layouts.app')

@section('content')
    <div id="fullpage">
        <div class="section">
            <header id="home">
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark header">
                    <div class="container">
                        <a class="navbar-brand" href="/"><img class="logo" src="/frontend/img/logo.png" alt="Logo"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                            <div class="navbar-nav font-weight-bold nav-back">
                                <a class="nav-item nav-link mt-1" href="/">HOME</a>
                                <a class="nav-item nav-link mt-1" href="#">ABOUT US</a>
                                <a class="nav-item nav-link mt-1" href="/events/create">PARTNERS</a>
                                <a class="nav-item nav-link mt-1" href="/events/create">EVENTS</a>
                                <a class="nav-item nav-link mt-1" href="#">MEDIA</a>
                                <a class="nav-item nav-link mt-1" href="#">MUSIC</a>
                                @if(auth()->user() != null)
                                    <a class="nav-item nav-link mt-1" href="/logout">LOGOUT</a>
                                @else
                                    <a class="nav-item nav-link mt-1" href="/register">REGISTER</a>
                                    <a class="nav-item nav-link mt-1" href="/login">LOGIN</a>
                                @endif
                                <a class="nav-item nav-link mt-1" href="#">CONTACT US</a>
                                <a class="nav-item nav-link" href="#"><i class="fas fa-cart-plus fa-2x"></i></a>
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
                        <div class="carousel-item item active">
                            <img class="d-block w-100" src="/frontend/img/carousel1.jpeg" alt="First slide">
                        </div>
                        <div class="carousel-item item">
                            <img class="d-block w-100" src="/frontend/img/carousel2.jpeg" alt="Second slide">
                        </div>
                        <div class="carousel-item item">
                            <img class="d-block w-100" src="/frontend/img/carousel3.jpeg" alt="Third slide">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <a href="#feature" class="mouse-hover">
                        <div class="mouse"></div>
                    </a>
                </div>
                <div class="title">
                    <h1>EVENTS. ENTERTAINMENT. EXPERIENCE.</h1>
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
                    <img class="parallax-img" src="/frontend/img/parallax6.png">
                    <h1 class="text-danger parallax-text">Ecube Entertainment</h1>
                    <p>Lorem ipsum elit. Odit, voluptas, optio, libero, quam fugit vero voluptates dolores atque praesentium! Dolorum, nulla, placeat commodi deserunt amet corrupti dignissimos vel similique laudantium debitis ab at quas alias sunt harum minima nobis est deleniti aperiam earum?<div class="d-none d-sm-block"> Distinctio, vel, odio, repudiandae excepturi nostrum numquam voluptatem consequatur
                    <br><br>quasi quibusdam et porro assumenda nesciunt ipsam facere mollitia quam esse beatae optio dolorem fugiat culpa? Itaque, nam, error, officia ab dolor nulla voluptatum veniam omnis suscipit aut exercitationem natus tenetur pariatur. Earum, magni, aliquam autem natus fugiat odio error laudantium nam temporibus placeat! Omnis.</div></p>
                </header>
            </div>
        </div>

        <div class="section">
            <div class="container-fluid what-we-do d-none d-sm-block">
                <div class="row text-white">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 wwd">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <h5>EVENTS</h5>
                                <p>Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3">
                                <h5>DESIGN & PRODUCTION</h5>
                                <p>Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam?</p>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                        <div class="row pt-5">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <h5>INTERNATIONAL ARTISTS</h5>
                                <p>Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3">
                                <h5>PR & <br>DATABASE</h5>
                                <p>Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa? quod delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3">
                                <h5>BRAND BUILDING</h5>
                                <p>Lorem ipsum dolor sit amet. Facilis, ullam velit quod delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            
            
            <div class="container-fluid what-we-do-xs d-block d-sm-none">
                <div class="row text-white">
                    <div class="col-md-1"></div>
                    <div class="col-md-10 wwd text-center">
                        <div class="row">
                            <h5 class="wdwd-text-xs pt-0 pb-3">What Do We Do</h5>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <h6>EVENTS</h6>
                                <p>Lorem ipsum dolor sit amet. Facilis,  delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3">
                                <h6>DESIGN & PRODUCTION</h6>
                                <p>Lorem ipsum dolor sit amet velit quod delectus beatae quia nam?</p>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <h6>INTERNATIONAL ARTISTS</h6>
                                <p>Lorem ipsum dolor sit lectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3">
                                <h6>PR & DATABASE</h6>
                                <p>Lorem ipsum dolor delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3">
                                <h6>BRAND BUILDING</h6>
                                <p>Lorem ipsum dolor  velit quod delectus beatae quia nam culpa?</p>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>





        <div class="section">
            <section id="partners" class="partners py-1 text-center d-none d-sm-block">
                <h1 class="text-danger">Partners</h1>
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel partners-carousel">
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel3.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel3.jpeg" alt="Service Image"></a>
                            </div><div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel3.jpeg" alt="Service Image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="partners" class="partners py-5 text-center d-none d-sm-block">
                <h1 class="text-danger">International Partners</h1>
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel partners-carousel">
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel3.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel3.jpeg" alt="Service Image"></a>
                            </div><div class="card">
                            <a href="#"><img class="card-img-top" src="/frontend/img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel3.jpeg" alt="Service Image"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>	

            <section id="partners" class="partners py-1 text-center d-block d-sm-none">
                <h1 class="text-danger partner-xs-text">Local & International Partners</h1>
                <div class="container">
                    <div class="row">
                        <div class="owl-carousel partners-carousel">
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel3.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel3.jpeg" alt="Service Image"></a>
                            </div><div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel1.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel2.jpeg" alt="Service Image"></a>
                            </div>
                            <div class="card">
                            <a href="#"><img class="card-img-top" src="img/carousel3.jpeg" alt="Service Image"></a>
                            </div>
                        </div>
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
                            <img class="logo" src="img/logo.png" alt="Logo">
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-danger font-weight-bold">Head Office</h4><br>
                            <p>Banani, Dhaka, Bangladesh</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-danger font-weight-bold">Contact Us</h4><br>
                            <p>Call Us : 017*******, <br>019********<br> 
                            Email: ecube@gmail.com</p>	
                        </div>
                        <div class="col-md-3">
                            <h4 class="text-danger font-weight-bold">Stay Connected</h4><br>
                            <i class="fab fa-facebook-square fa-2x facebook"></i>&ensp;
                            <i class="fab fa-twitter-square fa-2x twitter"></i>&ensp;
                            <i class="fab fa-youtube fa-2x youtube"></i>&ensp;
                            <i class="fab fa-instagram fa-2x instagram"></i>&ensp;
                            <i class="fab fa-google-plus-g fa-2x google"></i>&ensp;
                        </div>
                    </div>
                </div>
                <p class="copyright text-center">ECUBE Entertainment &copy; 2018, <a href="http://www.techynaf.com/" class="text-danger font-weight-bold">Techynaf</a></p>
            </section>

        </div>
    </div> <!-- Fullpage div end -->
    @include('layouts.scripts')
@endsection
