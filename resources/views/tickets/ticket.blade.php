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
                    <p>{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}</p>
                    <p>{{$user->email}}</p>
                    <p>{{$user->profile->phone}}</p>
                    <br><br>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-6 ticket-text-line-height">
                    <h1>INVOICE</h1>
                    <p class="text-danger">{{$ticket->invoice->number.'-'.date("Y", strtotime($ticket->created_at))}}</p>
                    <p>{{date("M d, Y", strtotime($ticket->created_at))}}</p>
                    <br>
                    <p>Order Number: {{$ticket->invoice->number}}</p>
                    <p>Order Date: {{date("M d, Y", strtotime($ticket->created_at))}}</p>
                </div>
                <div class="col-md-6 ticket-text-line-height ticket-price-background text-white my-auto">
                    @if ($ticket->type->price == 0)
                    <h1>COMPLIMENTARY TICKET</h1>
                    @else
                        <h1>BDT {{number_format((float)$ticket->type->price, 2, '.', '')}}</h1>
                        <p>Thank you for your purchase</p>
                    @endif
                </div>
            </div>
            <br><br><br><br>
            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Description</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">{{$ticket->event->name}}</th>
                            <td>BDT {{number_format((float)$ticket->type->price, 2, '.', '')}}</td>
                            <td>1</td>
                            <td>BDT {{number_format((float)$ticket->type->price, 2, '.', '')}}</td>
                            </tr>
                        </tbody>
                    </table><hr>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height text-center">
                    {!! Milon\Barcode\Facades\DNS1DFacade::getBarcodeSVG($ticket->invoice->barcode, "C128") !!}
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
        window.print();
    </script>
</body>
</html>