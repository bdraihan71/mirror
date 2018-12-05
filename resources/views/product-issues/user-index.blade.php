@extends('layouts.app')

@section('content')
<br><br><br><br>
    <section class="filter-btn my-5 black-font">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6">
					<h5 class="text-primary"><a href="/home/#top"><i class="fas fa-arrow-alt-circle-left"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Product Status <span>({{ count($purchases) }})</span></h5>
				</div>
				@if (count($purchases) != 0)
					<div class="col-md-6">
						<select class="filter custom-select float-right w-25" data-tableId="table1">
							<option selected>Filter</option>
							<option value="purchased">Purchased</option>
							<option value="sent">Sent</option>
							<option value="delivered">Delivered</option>
							<option value="cancel">Cancel</option>
						</select>
					</div>
				@endif
			</div>

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
                    if (document.getElementById('issue').value != '') {
                        document.getElementById('new-issue').value = document.getElementById('issue').value;
						document.getElementById('cart_id').value = id;
                        document.getElementById('issueSubmit').click();
                    } else {
						alert('Please state what the issue is.');
					}
                }
            </script>

            <form action="/issue" method="POST" id="issues-form">
                @csrf
				<input type="hidden" name="new_issue" id="new-issue" value="">
				<input type="hidden" name="cart_id" id="cart_id" value="">
                <button class="hidden" type="submit" id="issueSubmit"></button>
            </form>
			@if (count($purchases) != 0)
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


				<table id="table1">
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
															@if ($item->delivered_at == null && $item->cancelled_at == null)
																<button class="btn {{ count($item->issues->where('responded_at', null)) == 0 ? 'btn-danger' : 'btn-primary' }} w-100" onclick="showIssues('{{$item->id}}')" id="issue-btn-{{$item->id}}">Report Issues</button>
															@endif
														</div>
														<div class="col-md-2 my-auto">
															@if ($item->cancelled_at != null)
																<button type="button" class="btn btn-outline-danger"><i class="fas fa-times"></i> Cancel</button>
															@elseif ($item->delivered_at != null)
																<button type="button" class="btn btn-outline-success"><i class="fas fa-download"></i> Delivered</button>
															@elseif ($item->sent_at != null)
																<button type="button" class="btn btn-outline-info"><i class="fas fa-check"></i> Sent</button>
															@elseif ($item->confirmed_at != null)
																<button type="button" class="btn btn-outline-primary"><i class="fas fa-credit-card"></i> Purchased</button>
															@else
																<button type="button" class="btn btn-outline-secondary"><i class="fas fa-credit-card"></i> Unconfrimed</button>
															@endif
														</div>
													</div>
													<div class="row hidden" id="issue-{{$item->id}}" style="display: none">
														<div class="col-md-12">
															<br><hr>
															<div class="row">
																<div class="col-md-10">
																	<input type="text" name="issue" id="issue" class="form-control" placeholder="Submit new issue">
																</div>
																<div class="col-md-2">
																	<button class="btn btn-danger w-100" onclick="submitResponse('{{ $item->id }}')">Submit Issue</button>
																</div>
															</div>
															<hr>
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
																			{{ $issue->response }}
																		</div>
																		<div class="col-md-2">
																			{{ $issue->responded_at != null ? Carbon\Carbon::parse($issue->responded_at)->format('H:i').' on '.Carbon\Carbon::parse($issue->responded_at)->format('d M Y') : 'Not reponsed yet' }}
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
			@else
				<div class="row">
					<div class="col-md-12">
						<h3 class="text-center">No purchases made yet</h3>
					</div>
				</div>
			@endif
		</div>
	</section>
@endsection