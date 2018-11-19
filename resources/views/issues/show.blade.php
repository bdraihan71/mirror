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
    <section id="ticket" class="ticket pb-5">
        <img class="ticket-image" src="{{$ticket->event->img_1}}">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height">
                    <p>{{$ticket->name}}</p>
                    <p>{{$ticket->email}}</p>
                    <p>{{$ticket->phone}}</p>
                    <br><br>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-6 ticket-text-line-height">
                    <h1>ISSUE NO</h1>
                    <p class="text-danger">{{$ticket->event_id.'-'.$ticket->id.'-'.date("Y", strtotime($ticket->created_at))}}</p>
                    <p>{{date("M d, Y", strtotime($ticket->created_at))}}</p>
                    <br>
                    <p>Order Number: {{$ticket->event_id.'-'.$ticket->id}}</p>
                    <p>Order Date: {{date("M d, Y", strtotime($ticket->created_at))}}</p>
                </div>
                <div class="col-md-6 ticket-text-line-height ticket-price-background text-white my-auto">
                    <h1>COMPLIMENTARY TICKET</h1>
                </div>
            </div>
            <br><br><br><br>

            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height text-center">
                    {!! Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG('2 '.$ticket->event_id.' '.$ticket->id, "C128") !!}
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height text-center">
                    <p class="text-danger text-center">This is your order barcode</p>
                </div>
            </div>
        </div>      
    </section>
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
	<script>
		$(document).ready(function(){
			$('.partners-carousel').owlCarousel({
			loop:true,
			margin:10,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true,
					autoplay:true
				},
				600:{
					items:3,
					nav:false,
					autoplay:true
				},
				1000:{
					items:6,
					nav:true,
					autoplay:true
				}
			}
		});
	});
    </script>
    <script>
        $('.pull-down').each(function() {
            var $this = $(this);
            $this.css('margin-top', $this.parent().height() - $this.height())
        });
    </script>
    <script>
        window.onload = function () {
            var win = window.open('/', '_blank');
            win.focus();
        };
    </script>
</body>
</html>