<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Secured, Reliable & Customer Centric">
    <meta name="author" content="Techynaf">
    <title>Techynaf</title>
    <!-- Custom styles -->
    <link href="/frontend/css/moz-bar.min.css" rel="stylesheet">
    <link href="/frontend/css/style.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/frontend/vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css">
    <!-- Animate CSS -->
    <link href="/frontend/vendor/animate/animate.min.css" rel="stylesheet">
    <!-- Owl CSS -->
    <link href="/frontend/vendor/owl/css/owl.carousel.min.css" rel="stylesheet">
    <!-- Fullpage CSS -->
    <link href="/frontend/vendor/fullpage/fullpage.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="/frontend/img/favicon.png">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">

    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/frontend/css/style.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Start of Async Drift Code -->
    <script>
    "use strict";

    !function() {
    var t = window.driftt = window.drift = window.driftt || [];
    if (!t.init) {
        if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
        t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
        t.factory = function(e) {
        return function() {
            var n = Array.prototype.slice.call(arguments);
            return n.unshift(e), t.push(n), t;
        };
        }, t.methods.forEach(function(e) {
        t[e] = t.factory(e);
        }), t.load = function(t) {
        var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
        o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
        var i = document.getElementsByTagName("script")[0];
        i.parentNode.insertBefore(o, i);
        };
    }
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('2mzt9tikhavm');
    </script>
    <!-- End of Async Drift Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145375324-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-145375324-1');
    </script>
</head>

<body class="white-bg">
        <script>
            let elShown = true;

            function showMenu (id) {
                console.log(elShown);

                if (elShown) {
                    document.getElementById(id).style.display = 'block';
                } else {
                    document.getElementById(id).style.display = 'none';
                }

                elShown = !elShown;

                console.log(elShown, document.getElementById(id).style.height);
            }
        </script>

    <div class="container-fluid p-0">
        @include('flash::message')
        
        @if (Request::segment(1) != 'api')
            @include('layouts.messages')
        @endif

        @if (Request::is('/'))
            @yield('content')
        @else
            @include('layouts.nav')
            @yield('content')
            @include('layouts.footer')
        @endif
       
        @include('layouts.scripts')
    </div>
</body>
</html>
