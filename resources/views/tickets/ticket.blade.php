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
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendor/font-awesome/css/all.css" rel="stylesheet" type="text/css">
	<!-- Animate CSS -->
	<link href="vendor/animate/animate.min.css" rel="stylesheet">
	<!-- Owl CSS -->
	<link href="vendor/owl/css/owl.carousel.min.css" rel="stylesheet">
	<!-- Fullpage CSS -->
	<link href="vendor/fullpage/fullpage.min.css" rel="stylesheet">
	<!-- Favicon -->
	<link rel="icon" href="img/favicon.png">
	<!-- Custom styles -->
	<link href="css/style.css" rel="stylesheet">
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
                    <p>{{$user->profile->address}}</p>
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
                    <h1>bdt 5,000.00</h1>
                    <p>Thank you for your purchase</p>
                </div>
            </div>
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
                            <td>{{$ticket->type->price}}</td>
                            <td>1</td>
                            <td>{{$ticket->type->price}}</td>
                            </tr>
                        </tbody>
                    </table><hr>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-6 ticket-text-line-height">
                    
                </div>
                <div class="col-md-6 ticket-text-line-height">
                    <p>Subtotal <span class="float-right">{{$ticket->type->price}}</span></p>
                    <p>Shipping <span class="float-right">bdt 00.00</span></p>
                    <hr>
                    <p>Total <span class="float-right text-danger">{{$ticket->type->price}}</span></p>
                </div>
            </div>
            <p class="text-danger">Items will be hipped within 2 days.</p>
            <div class="row pt-5">
                <div class="col-md-6 ticket-text-line-height">
                    <br>
                    <br>
                    <p class="text-danger">This is your order barcode</p>
                </div>
                <div class="col-md-6 ticket-text-line-height">
                    {!! Milon\Barcode\Facades\DNS1DFacade::getBarcodeHTML($ticket->invoice->barcode, "PHARMA2T") !!}
                </div>
            </div>
        </div>      
    </section>
    <!-- Scripts for Bootstrap-4 -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Scripts for WOW -->
    <script src="vendor/animate/wow.min.js"></script>
    <!-- Scripts for OWL -->
    <script src="vendor/owl/js/owl.carousel.min.js"></script>
	<!-- Scripts for Fullpage -->
    <script src="vendor/fullpage/fullpage.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
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
</body>
</html>