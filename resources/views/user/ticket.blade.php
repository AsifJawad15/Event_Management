@extends('front.layout.master')

@section('main_content')
@include('front.layout.dark-nav')

<!-- Banner Section -->
<section class="page-title" style="background-image: url({{ asset('dist-front/images/banner.jpg') }}); background-size: cover; background-position: center; position: relative; padding: 150px 0; text-align: center;">
    <div class="auto-container">
        <h2 style="color: white; font-size: 48px; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">My Tickets</h2>
        <ul class="page-breadcrumb" style="list-style: none; padding: 0; margin: 0; color: white; font-size: 16px;">
            <li style="display: inline; color: #6bc24a;"><a href="{{ route('front.home') }}" style="color: #6bc24a; text-decoration: none; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Home</a></li>
            <li style="display: inline; margin: 0 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);"> / </li>
            <li style="display: inline; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">My Tickets</li>
        </ul>
    </div>
</section>

<div class="user-section pt_70 pb_70">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 mb-4 mb-lg-0">
				<div class="user-sidebar">
					<div class="card">
						@include('front.layout.sidebar')
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="card">
					<div class="card-header bg-white border-0">
						<h5 class="mb-0">Ticket Summary</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead class="thead-light">
									<tr>
										<th scope="col">SL</th>
										<th scope="col">Package</th>
										<th scope="col">Payment ID</th>
										<th scope="col">Method</th>
										<th scope="col">Per Ticket</th>
										<th scope="col">Tickets</th>
										<th scope="col">Total</th>
										<th scope="col">Status</th>
										<th scope="col">Purchased At</th>
										<th scope="col" style="width:150px;">Action</th>
									</tr>
								</thead>
								<tbody>
									@forelse($tickets as $ticket)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ optional($ticket->package)->name ?? $ticket->package_name }}</td>
										<td>{{ $ticket->payment_id }}</td>
										<td>{{ \Illuminate\Support\Str::headline($ticket->payment_method) }}</td>
										<td>{{ number_format($ticket->per_ticket_price, 2) }}</td>
										<td>{{ $ticket->total_tickets }}</td>
										<td>{{ number_format($ticket->total_price, 2) }}</td>
										<td>
											<span class="badge badge-{{ $ticket->payment_status === 'Completed' ? 'success' : 'danger' }}">
												{{ \Illuminate\Support\Str::headline($ticket->payment_status) }}
											</span>
										</td>
										<td>{{ optional($ticket->created_at)->format('d M Y h:i A') }}</td>
										<td>
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ticketModal_{{ $ticket->id }}">
												<i class="fa fa-eye"></i>
											</button>
											<a href="{{ route('attendee.invoice', $ticket->id) }}" class="btn btn-success btn-sm pl_10 pr_10">
												<i class="fa fa-info"></i>
											</a>
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="10" class="text-center">No tickets found.</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						@if(method_exists($tickets, 'links'))
						<div class="mt-3">
							{{ $tickets->links() }}
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@foreach($tickets as $ticket)
<div class="modal fade" id="ticketModal_{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel_{{ $ticket->id }}" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fw600" id="ticketModalLabel_{{ $ticket->id }}">Ticket Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row mb_15">
					<div class="col-md-4">User Name:</div>
					<div class="col-md-8">{{ optional($ticket->user)->name }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">User Email:</div>
					<div class="col-md-8">{{ optional($ticket->user)->email }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing Name:</div>
					<div class="col-md-8">{{ $ticket->billing_name }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing Email:</div>
					<div class="col-md-8">{{ $ticket->billing_email }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing Phone:</div>
					<div class="col-md-8">{{ $ticket->billing_phone }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing Address:</div>
					<div class="col-md-8">{{ $ticket->billing_address }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing Country:</div>
					<div class="col-md-8">{{ $ticket->billing_country }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing State:</div>
					<div class="col-md-8">{{ $ticket->billing_state }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing City:</div>
					<div class="col-md-8">{{ $ticket->billing_city }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Billing Zip:</div>
					<div class="col-md-8">{{ $ticket->billing_zip }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Payment Method:</div>
					<div class="col-md-8">{{ \Illuminate\Support\Str::headline($ticket->payment_method) }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Currency:</div>
					<div class="col-md-8">{{ $ticket->payment_currency }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Transaction ID:</div>
					<div class="col-md-8">{{ $ticket->transaction_id }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Bank Info:</div>
					<div class="col-md-8">{{ $ticket->bank_transaction_info }}</div>
				</div>
				<div class="divider-1"></div>
				<div class="row mb_15">
					<div class="col-md-4">Payment Status:</div>
					<div class="col-md-8">{{ \Illuminate\Support\Str::headline($ticket->payment_status) }}</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
