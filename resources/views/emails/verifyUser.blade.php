<!DOCTYPE html>
<html>
<head>
    <title>Ecube Entertainment || Email Verification</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Events. Entertainment. Experience.">
    <meta name="author" content="Techynaf">
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
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100" rel="stylesheet">
</head>
<body>
    <h2>Welcome to Ecube Entertainment {{$user->profile->f_name.' '.$user->profile->l_name}}</h2>
    <br>
    Your registered email address is {{$user->email}}, please click on the link below to verify this email:
    <br>
    <a href="/user/verify/{{$user->token}}" class="btn btn-primary w-100">Verify Email</a>
</body>
</html>