<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Events. Entertainment. Experience.">
    <meta name="author" content="Techynaf">
    <title>Ecube Entertainment</title>
    <!-- Custom styles -->
    <link href="/frontend/css/moz-bar.min.css" rel="stylesheet">
    <link href="/frontend/css/style.min.css" rel="stylesheet">
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

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="black-bg">
 
    <div class="container-fluid">
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
