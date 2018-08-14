<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Events. Entertainment. Experience.">
    <meta name="author" content="Techynaf">
    <title>Ecube Entertainment</title>
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
    <!-- Custom styles -->
    <link href="/frontend/css/style.css" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@if (Request::is('/'))
    <body>
        @include('layouts.messages')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.scripts')
    </body>
@else
    <body class="black-bg">
        <div class="container-fluid">
            @include('layouts.nav')
            @include('layouts.messages')
            @yield('content')
            @include('layouts.footer')
            @include('layouts.scripts')
        </div>
    </body>
@endif
</html>
