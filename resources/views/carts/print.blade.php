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
    <script>
        var viewMode = getCookie("view-mode");
        if(viewMode == "desktop"){
            viewport.setAttribute('content', 'width=1024');
        }else if (viewMode == "mobile"){
            viewport.setAttribute('content', 'width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no');
        }
    </script>
    <section id="ticket" class="ticket pb-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-8 ticket-text-line-height">
                    <br><br><br><br><br><br><br><br>
                    <p>{{$user->profile->f_name.' '.$user->profile->m_name.' '.$user->profile->l_name}}</p>
                    <p>{{$user->email}}</p>
                    <p>{{$user->profile->phone}}</p>
                    <p>{{$purchase->address}}</p>
                    <p>{{$purchase->division}}</p>
                    <p>Delivery Contact: {{$purchase->phone}}</p>
                    <p>Payment Method: {{$purchase->method}}</p>
                </div>
                <div class="col-md-3 ticket-text-line-height">
                    <img class="img-fluid" src="/frontend/img/favicon.png">
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height">
                    <h1 class="shaded">INVOICE</h1>
                    <p>Order Date: {{date("M d, Y", strtotime($purchase->created_at))}}</p>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12 ticket-text-line-height">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchase->carts as $item)
                                <tr>
                                    <th scope="row">{{$item->product->name}}</th>
                                    <td>BDT {{ App\Http\Controllers\Controller::formatMoney($item->product->price) }}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>BDT {{ App\Http\Controllers\Controller::formatMoney($item->product->price * $item->quantity) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><hr>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-6 ticket-text-line-height">
                    
                </div>
                <div class="col-md-6 ticket-text-line-height">
                    <p>Subtotal <span class="float-right">BDT {{ App\Http\Controllers\Controller::formatMoney($total) }}</span></p>
                    <p>Shipping <span class="float-right">BDT {{ App\Http\Controllers\Controller::formatMoney($shipping[0]) }}</span></p>
                    <hr>
                    <p>Total <span class="float-right text-danger">BDT {{ App\Http\Controllers\Controller::formatMoney($shipping[0] + $total) }}</span></p>
                </div>
            </div>
            <p class="text-danger">Items will be shipped within {{$shipping[1]}} days.</p>
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