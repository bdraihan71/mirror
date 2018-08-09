<nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-transparent" style="background: black;">
    <a class="navbar-brand" href="/"><img class="logo" src="/frontend/img/logo.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
            <a class="nav-link text-white" href="/">HOME</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">ABOUT US</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white" href="#">PARTNERS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">EVENTS</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white" href="#">MEDIA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">MUSIC</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white" href="#">CONTACT US</a>
        </li>

        @if(auth()->user() != null)
            <li class="nav-item active">
                <a class="nav-link text-white" href="/logout">LOGOUT</a>
            </li>
        @else
            <li class="nav-item active">
                <a class="nav-link text-white" href="/register">REGISTER</a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fas fa-cart-plus fa-2x"></i></a>
        </li>
        </ul>
    </div>
</nav>

<br><br><br><br><br>