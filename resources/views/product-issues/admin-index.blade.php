@extends('layouts.app')

@section('content')
	<br><br><br><br>
	<section class="filter-btn my-5 black-font" >
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<h5 class="text-primary">Product Status <span>(9)</span></h5>
				</div>
				<div class="col-md-6">
					<select class="filter custom-select float-right w-25" data-tableId="table1">
						<option selected>Filter</option>
						<option value="purchased">Purchased</option>
						<option value="sent">Sent</option>
						<option value="delivered">Delivered</option>
						<option value="cancel">Cancel</option>
					</select>
				</div>
			</div>


			<div class="row mt-5">
				<div class="col-md-6">
					<p>Listing</p>
				</div>
				<div class="col-md-4">
					Purchase Info
				</div>
				<div class="col-md-2">
					Status
				</div>
			</div>


			<table id="table1" class="black-font">
				<tr id="one" class="filter-row" data-type="purchased">
					<td>
						<div class="row mb-3">
							<div class="col-md-12">
								<div class="card bg-light">
									<div class="card-body">
										<div class="row">
											<div class="col-md-2">
												<a href="#"><img class="product-img" src="/frontend/img/carousel2.jpeg" alt="Card image cap"></a>
											</div>
											<div class="col-md-4 my-auto">
												<h5>Lazer United Tank Tops</h5>
											<small>BDT {{ App\Http\Controllers\Controller::formatMoney(4000) }} x {{ /* quantity */ 10 }}</small>
											</div>
											<div class="col-md-3 my-auto">
												<div class="chip">
													<b>Ecube Admin</b>
												</div>
											</div>
											<div class="col-md-1 my-auto">
												12Pcs
											</div>
											<div class="col-md-2 my-auto">
												<select class="custom-select" id="inputGroupSelect01">
													<option selected>Choose...</option>
													<option value="1">Purchased</option>
													<option value="2">Sent</option>
													<option value="3">Delivered</option>
													<option value="4">Cancel</option>
												</select>
												<!-- <button type="button" class="btn btn-outline-success"><i class="fas fa-download"></i> Delivered</button> -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</section>
@endsection