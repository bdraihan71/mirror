<div class="section">
    <header id="home">
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img class="logo" src="/frontend/img/logo.svg" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav font-weight-bold nav-back">
                        <a class="nav-item nav-link mt-1" href="/#top">HOME</a>
                        <a class="nav-item nav-link mt-1" href="/#page2">ABOUT US</a>
                        <a class="nav-item nav-link mt-1" href="/#page4">PARTNERS</a>
                        <a class="nav-item nav-link mt-1" href="/events/all/#top">EVENTS</a>
                        <a class="nav-item nav-link mt-1" href="/shop">SHOP</a>
                        @if(auth()->user() != null)
                            <a class="nav-item nav-link mt-1" href="/logout">LOGOUT</a>
                            <a class="nav-item nav-link mt-1" href="/home/#top">DASHBOARD</a>
                        @else
                            <a class="nav-item nav-link mt-1" href="/register/#top">REGISTER</a>
                            <a class="nav-item nav-link mt-1" href="/login/#top">LOGIN</a>
                        @endif
                        <a class="nav-item nav-link mt-1" href="/media">MEDIA</a>
                        <a class="nav-item nav-link mt-1" href="/music">MUSIC</a>
                        <a class="nav-item nav-link mt-1" href="/contact-us/#top">CONTACT US</a>
                        @if (auth()->user() != null && App\Http\Controllers\Controller::notAdmin())
                            <a class="nav-item nav-link" href="/cart"><i class="fas fa-cart-plus fa-2x"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>