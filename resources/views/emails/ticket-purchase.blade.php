<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Events. Entertainment. Experience.">
	<meta name="author" content="Techynaf">
	<title>Ecube Entertainment</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            Congratulations!! You have purchased the ticket for {{$ticket->event->name}}.
        </div>
        <div class="row">
            Click <a href="{{ env('APP_URL') }}/ticket/print/{{$ticket->id}}">here</a> to view the ticket invoice.
        </div>
    </div>
    <!-- Scripts for Bootstrap-4 -->
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
</body>
</html>