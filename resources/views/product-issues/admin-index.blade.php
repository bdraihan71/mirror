@extends('layouts.app')

@section('content')
	<br><br><br><br>
	<script>
		function updateStatus (id) {
			if (document.getElementById(id).value != 'Choose...') {
				document.getElementById('cart_id').value = id;
				document.getElementById('status_id').value = document.getElementById(id).value;
				document.getElementById("ajaxSubmit").click();
			}
		}
	</script>

	<script>
		function showIssues (id) {
			item = 'issue-'+id;
			btn = 'issue-btn-'+id;
			item = document.getElementById(item);

			if (item.style.display == 'none') {
				item.style.display = 'block';
				document.getElementById(btn).innerHTML = 'Hide Issues';
			} else {
				item.style.display = 'none';
				document.getElementById(btn).innerHTML = 'Show Issues';
			}
		}
	</script>

	<script>
		function submitResponse (id) {
			document.getElementById('issue_id').value = id;
			id = 'response-'+id;
			document.getElementById('response_id').value = document.getElementById(id).value;
			document.getElementById("reponseSubmit").click();
		}
	</script>

	<form action="/update-status" method="POST" id="statusUpdateForm">
		@csrf
		<input type="hidden" name="cart_id" value="" id="cart_id">
		<input type="hidden" name="status_id" value="" id="status_id">
		<button class="hidden" type="submit" id="ajaxSubmit"></button>
	</form>

	<form action="/respond" method="POST" id="issueRespondForm">
		@csrf
		<input type="hidden" name="issue_id" id="issue_id" value="">
		<input type="hidden" name="response_id" id="response_id" value="">
		<button class="hidden" type="submit" id="reponseSubmit"></button>
	</form>

	<section class="filter-btn my-5 black-font" >
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
						<h5 class="text-primary"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product Status <span>({{ count($purchases) }})</span></h5>
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
				<div class="col-md-4">
					<p>Listing</p>
				</div>
				<div class="col-md-4">
					Purchase Info
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-2">
					Status
				</div>
			</div>


			<table id="table1" class="black-font">
				@foreach($purchases as $purchase)
					@foreach($purchase->carts as $item)
						<tr id="one" class="filter-row" data-type="purchased">
							<td>
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="card bg-light">
											<div class="card-body">
												<div class="row">
													<div class="col-md-2">
														<a href="#"><img class="product-img" src="{{ $item->product->img }}" alt="Card image cap"></a>
													</div>
													<div class="col-md-2 my-auto">
														<h5>{{ $item->product->name }}</h5>
														<small class="p-0">BDT {{ App\Http\Controllers\Controller::formatMoney($item->product->price) }} x {{ $item->quantity }} pcs</small>
														<hr class="p-0 m-0">
														<small class="p-0">BDT {{ App\Http\Controllers\Controller::formatMoney($item->product->price * $item->quantity) }} </small>
														<hr class="p-0 m-0">
														<small class="p-0">{{ $purchase->method }}</small>
													</div>
													<div class="col-md-2 my-auto">
														<div class="chip">
															<b>{{ App\Http\Controllers\Controller::nameConcatenator($purchase->user) }}</b>
														</div>
														<hr class="p-0 m-0">
														<small class="p-0">{{ $purchase->phone }}</small>
														<hr class="p-0 m-0">
														<small class="p-0">{{ $purchase->address }}, </small>
														<small class="p-0">{{ $purchase->division }}</small>
													</div>
													<div class="col-md-2 my-auto">
														<div class="chip">
															<b>Purchased On</b>
														</div>
														<small class="p-0">{{ Carbon\Carbon::parse($purchase->created_at)->format('d M Y').' at '.Carbon\Carbon::parse($purchase->created_at)->format('H:i') }}</small>
													</div>
													<div class="col-md-2 my-auto">
														<button class="btn {{ count($item->issues->where('responded_at', null)) == 0 ? 'btn-danger' : 'btn-primary' }} w-100" onclick="showIssues('{{$item->id}}')" id="issue-btn-{{$item->id}}">Show Issues</button>
													</div>
													<div class="col-md-2 my-auto">
														<select class="custom-select" id="cart-{{$item->id}}">
															@if ($item->cancelled_at != null)
																<option value="4">Cancel</option>
																<option value="1">Purchased</option>
																<option value="2">Sent</option>
																<option value="3">Delivered</option>
															@elseif ($item->delivered_at != null)
																<option value="3">Delivered</option>
																<option value="2">Sent</option>
																<option value="1">Purchased</option>
																<option value="4">Cancel</option>
															@elseif ($item->sent_at != null)
																<option value="2">Sent</option>
																<option value="3">Delivered</option>
																<option value="4">Cancel</option>
																<option value="1">Purchased</option>
															@elseif ($item->confirmed_at != null)
																<option value="1">Purchased</option>
																<option value="2">Sent</option>
																<option value="3">Delivered</option>
																<option value="4">Cancel</option>
															@else
																<option selected>Choose...</option>
																<option value="1">Purchased</option>
																<option value="2">Sent</option>
																<option value="3">Delivered</option>
																<option value="4">Cancel</option>
															@endif
														</select>
														<br><br>
														<button type="button" onclick="updateStatus('{{ 'cart-'.$item->id }}')" class="btn btn-outline-success w-100"><i class="fas fa-download"></i> Submit</button>
													</div>
												</div>
												<div class="row hidden" id="issue-{{$item->id}}" style="display: none">
													<div class="col-md-12">
														<br><br>
														@if (count($item->issues) == 0)
															<h4 class="text-center">No Issues</h4>
														@else
															<div class="row">
																<div class="col-md-2">
																	Reported on
																</div>
																<div class="col-md-3">
																	Issue
																</div>
																<div class="col-md-5">
																	Response
																</div>
																<div class="col-md-2">
																	Responded on
																</div>
															</div>
															<hr>

															@foreach ($item->issues as $issue)
																<div class="row">
																	<div class="col-md-2">
																		{{ Carbon\Carbon::parse($issue->created_at)->format('H:i').' on '.Carbon\Carbon::parse($issue->created_at)->format('d M Y') }}
																	</div>
																	<div class="col-md-3">
																		{{ $issue->issue }}
																	</div>
																	<div class="col-md-5">
																		@if ($issue->responded_at == null)
																			<input type="text" name="response" class="form-control" id="response-{{ $issue->id }}">
																		@else
																			{{ $issue->response }}
																		@endif
																	</div>
																	<div class="col-md-2">
																		@if ($issue->responded_at == null)
																			<button class="btn btn-warning w-100" onclick="submitResponse('{{ $issue->id }}')">Respond</button>
																		@else
																			{{ Carbon\Carbon::parse($issue->responded_at)->format('H:i').' on '.Carbon\Carbon::parse($issue->responded_at)->format('d M Y') }}
																		@endif
																	</div>
																</div>
																<hr>
															@endforeach
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</td>
						</tr>
					@endforeach
					<tr>
						<td>
							<hr>
						</td>
					</tr>
				@endforeach
			</table>
			{{ $purchases->links() }}
		</div>
	</section>
@endsection