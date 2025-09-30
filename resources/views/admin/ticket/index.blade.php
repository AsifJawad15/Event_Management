@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Tickets</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>User</th>
                                            <th>Package</th>
                                            <th>Payment Id</th>
                                            <th>Payment Method</th>
                                            <th>Per Ticket Price</th>
                                            <th>Total Tickets</th>
                                            <th>Total Price</th>
                                            <th>Payment Status</th>
                                            <th>Date Time</th>
                                            <th class="w_100">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tickets as $ticket)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $ticket->user->name }}<br>
                                                {{ $ticket->user->email }}<br>
                                                <small class="text-muted">{{ $ticket->user->phone ?? 'N/A' }}</small>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_package_index') }}" class="text-primary">
                                                    {{ $ticket->package->name }}
                                                </a>
                                            </td>
                                            <td>{{ $ticket->payment_id }}</td>
                                            <td>
                                                <span class="badge badge-info">{{ $ticket->payment_method }}</span>
                                            </td>
                                            <td>৳{{ number_format($ticket->per_ticket_price, 2) }}</td>
                                            <td>{{ $ticket->total_tickets }}</td>
                                            <td>৳{{ number_format($ticket->total_price, 2) }}</td>
                                            <td>
                                                @if($ticket->payment_status == 'Pending')
                                                @php
                                                $change_status = 'Completed';
                                                @endphp
                                                <span class="badge badge-warning">Pending</span>
                                                @elseif($ticket->payment_status == 'Completed')
                                                @php
                                                $change_status = 'Pending';
                                                @endphp
                                                <span class="badge badge-success">Completed</span>
                                                @endif
                                                <br>
                                                <a href="{{ route('admin_ticket_change_status',[$ticket->id,$change_status]) }}" class="btn btn-sm btn-outline-primary mt-1">
                                                    Change Status
                                                </a>
                                            </td>
                                            <td>
                                                {{ $ticket->created_at->format('M d, Y') }}<br>
                                                <small class="text-muted">{{ $ticket->created_at->format('h:i A') }}</small>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal_{{ $loop->iteration }}" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin_ticket_invoice',$ticket->id) }}" class="btn btn-success btn-sm" title="View Invoice">
                                                    <i class="fas fa-receipt"></i>
                                                </a>
                                                <a href="{{ route('admin_ticket_delete',$ticket->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete Ticket">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                                <!-- Modal for ticket details -->
                                                <div class="modal fade" id="modal_{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Ticket Payment Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h6 class="text-primary">User Information</h6>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>User Name</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->user->name }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>User Email</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->user->email }}
                                                                            </div>
                                                                        </div>

                                                                        <h6 class="text-primary mt-3">Billing Information</h6>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing Name</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_name }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing Email</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_email }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing Phone</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_phone }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing Country</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_country }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing Address</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_address }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing State</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_state }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing City</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_city }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Billing Zip</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->billing_zip }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h6 class="text-primary">Payment Information</h6>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Payment Method</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <span class="badge badge-info">{{ $ticket->payment_method }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Payment Currency</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->payment_currency }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Transaction Id</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->transaction_id }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Bank Transaction Info</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->bank_transaction_info ?? 'N/A' }}
                                                                            </div>
                                                                        </div>

                                                                        <h6 class="text-primary mt-3">Package Information</h6>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Package Name</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->package->name }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Per Ticket Price</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                ৳{{ number_format($ticket->per_ticket_price, 2) }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Total Tickets</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                {{ $ticket->total_tickets }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Total Price</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                <strong>৳{{ number_format($ticket->total_price, 2) }}</strong>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                            <div class="col-md-5">
                                                                                <b>Payment Status</b>
                                                                            </div>
                                                                            <div class="col-md-7">
                                                                                @if($ticket->payment_status == 'Pending')
                                                                                <span class="badge badge-warning">Pending</span>
                                                                                @else
                                                                                <span class="badge badge-success">Completed</span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
