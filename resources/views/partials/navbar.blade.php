<nav class="navbar fixed-top navbar-expand-lg navbar-dark header" id="nav">
    @auth
        <a href="/alter/index" class="btn btn-primary">Edit</a>
        @endauth
    <div class="container">
        <a id="techynaf-logo" class="navbar-brand button animated lightSpeedIn" href="/"><img class="logo" src="/frontend/img/techynaf-logo.png" alt="Logo" width="126px"></a>
        <button onclick="showMenu('navbarNavAltMarkup')" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end font-sm" id="navbarNavAltMarkup">
            <div class="navbar-nav font-weight-bold nav-back">
                <a class="nav-item nav-link my-3" href="/#top">HOME</a>
                <a class="nav-item nav-link my-3" href="/software-products">PRODUCTS</a>
                <a class="nav-item nav-link my-3" href="/#page2">ABOUT</a>
                <a class="nav-item nav-link my-3" href="/#page3">WHAT WE DO</a>
                <a class="nav-item nav-link my-3" href="/#page4">CLIENTS</a>
                <a class="nav-item nav-link my-3" href="/#page5">REVIEWS</a>
                <!-- <a class="nav-item nav-link my-3" href="/events/all/#top">EVENTS</a> -->
                <!-- <a class="nav-item nav-link my-3" href="/shop/#top">SHOP</a>
                @if(auth()->user() != null)
                    <a class="nav-item nav-link my-3" href="/logout">LOGOUT</a>
                    <a class="nav-item nav-link my-3" href="/home/#top">DASHBOARD</a>
                @else
                    <a class="nav-item nav-link my-3" href="/register/#top">REGISTER</a>
                    <a class="nav-item nav-link my-3" href="/login/#top">LOGIN</a>
                @endif -->
                <!-- <a class="nav-item nav-link my-3" href="/media">MEDIA</a>
                <a class="nav-item nav-link my-3" href="/music">MUSIC</a>
                <a class="nav-item nav-link my-3" href="/logistics">LOGISTICS</a>
                <a class="nav-item nav-link my-3" href="/services">SERVICES</a> -->
                <a class="nav-item nav-link my-3" href="/team">TEAM</a>
                <a class="nav-item nav-link my-3" href="/contact-us/#top">CONTACT</a>
                <!-- @if (auth()->user() != null)
                    <a class="nav-item nav-link text-dark" href="/cart">
                        <span class="fa-stack">
                            <i class="fas fa-cart-plus fa-2x cart-margin-left"></i>
                            @if (App\Http\Controllers\Controller::cartItems() != 0)
                                <span class="badge-cart">{{App\Http\Controllers\Controller::cartItems()}}</span>
                            @endif
                        </span>
                    </a>
                @endif -->
            </div>
        </div>
    </div>
</nav>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>

$('#techynaf-logo').hover(
       function(){ 
           $(this).addClass('hinge')
            setTimeout(function() {
                $('#techynaf-logo').removeClass("hinge");
            }, 2000);
        }
       
       
       

)
</script>