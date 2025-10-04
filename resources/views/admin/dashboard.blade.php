@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-window-restore"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Posts</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_posts }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-th-large"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Testimonials</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_testimonials }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Speakers</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_speakers }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-th-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Schedule Days</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_schedule_days }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Sponsors</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_sponsors }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Organisers</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_organisers }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Attendees</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_attendees }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-tag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Packages</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_packages }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-thumbtack"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Tickets</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_tickets }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-smile"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Subscribers</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_subscribers }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Photos</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_photos }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Videos</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_videos }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-header">
            <h1>Recent Tickets</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>User</th>
                                            <th>Package</th>
                                            <th>Payment Method</th>
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
                                                <a href="{{ route('admin_attendee_index') }}">
                                                    See Detail
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_package_index') }}">
                                                    {{ $ticket->package->name }}
                                                </a>
                                            </td>
                                            <td>{{ $ticket->payment_method }}</td>
                                            <td>{{ $ticket->total_tickets }}</td>
                                            <td>${{ $ticket->total_price }}</td>
                                            <td>
                                                @if($ticket->payment_status == 'Pending')
                                                <span class="badge badge-danger">Pending</span>
                                                @elseif($ticket->payment_status == 'Completed')
                                                <span class="badge badge-success">Completed</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $ticket->created_at }}
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal_{{ $loop->iteration }}"><i class="fas fa-eye"></i></a>
                                                <div class="modal fade" id="modal_{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Payment Detail</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>User Name</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->user->name }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>User Email</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->user->email }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing Name</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_name }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing Email</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_email }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing Phone</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_phone }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing Country</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_country }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing Address</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_address }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing State</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_state }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing City</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_city }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Billing Zip</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_zip }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Payment Method</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->payment_method }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Payment Currency</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->payment_currency }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Transaction Id</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->transaction_id }}
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4">
                                                                        <b>Bank Transaction Info</b>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->bank_transaction_info }}
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
