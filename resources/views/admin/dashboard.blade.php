@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

<style>
    .main-content {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .dashboard-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 30px;
        border-radius: 15px;
        color: white;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .dashboard-header h1 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .dashboard-header p {
        font-size: 16px;
        opacity: 0.9;
        margin-bottom: 20px;
    }

    .create-event-btn {
        background: white;
        color: #667eea;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .create-event-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        color: #667eea;
    }

    .upcoming-events-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        color: white !important;
    }

    .upcoming-events-btn:hover {
        color: white !important;
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%) !important;
    }

    .stats-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .stats-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--card-color-start), var(--card-color-end));
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }

    .stats-card.purple {
        --card-color-start: #667eea;
        --card-color-end: #764ba2;
    }

    .stats-card.blue {
        --card-color-start: #4facfe;
        --card-color-end: #00f2fe;
    }

    .stats-card.green {
        --card-color-start: #43e97b;
        --card-color-end: #38f9d7;
    }

    .stats-card.orange {
        --card-color-start: #fa709a;
        --card-color-end: #fee140;
    }

    .stats-card.red {
        --card-color-start: #f093fb;
        --card-color-end: #f5576c;
    }

    .stats-card.teal {
        --card-color-start: #4facfe;
        --card-color-end: #00f2fe;
    }

    .stats-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        margin-bottom: 15px;
        background: linear-gradient(135deg, var(--card-color-start), var(--card-color-end));
        color: white;
    }

    .stats-card h4 {
        font-size: 14px;
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stats-card .stats-number {
        font-size: 32px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    .section-title {
        font-size: 24px;
        font-weight: 700;
        color: #ffffff;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .section-title i {
        color: #ffffff;
    }

    .table-container {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }

    .table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        color: #ffffff !important;
        border: none !important;
        padding: 15px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        font-size: 12px !important;
        letter-spacing: 0.5px !important;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
        transform: scale(1.01);
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 11px;
    }

    .btn-action {
        border-radius: 8px;
        padding: 8px 15px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-action:hover {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .dashboard-header {
            padding: 20px;
        }

        .dashboard-header h1 {
            font-size: 24px;
        }

        .stats-card {
            margin-bottom: 15px;
        }

        .create-event-btn {
            width: 100%;
            justify-content: center;
            margin-bottom: 10px;
        }

        .d-flex.gap-2 {
            gap: 0 !important;
        }
    }
</style>

<div class="main-content">
    <section class="section">
        <!-- Dashboard Header with Create Event Button -->
        <div class="dashboard-header">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12 mb-3 mb-lg-0">
                    <h1><i class="fas fa-tachometer-alt"></i> EVENTO Dashboard</h1>
                    <p>Welcome back! Manage all your events, attendees, and activities from one central hub.</p>
                </div>
                <div class="col-lg-4 col-md-12 text-lg-end text-center">
                    <div class="d-flex flex-wrap gap-2 justify-content-lg-end justify-content-center">
                        <a href="{{ route('admin_event_create') }}" class="create-event-btn">
                            <i class="fas fa-plus-circle"></i>
                            Create New Event
                        </a>
                        <a href="{{ route('admin_upcoming_event_index') }}" class="create-event-btn upcoming-events-btn">
                            <i class="fas fa-calendar-star"></i>
                            Upcoming Events
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row">
            <!-- Posts Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card purple">
                    <div class="stats-icon">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h4>Blog Posts</h4>
                    <p class="stats-number">{{ $total_posts }}</p>
                </div>
            </div>

            <!-- Speakers Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card blue">
                    <div class="stats-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4>Speakers</h4>
                    <p class="stats-number">{{ $total_speakers }}</p>
                </div>
            </div>

            <!-- Schedule Days Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card green">
                    <div class="stats-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h4>Schedule Days</h4>
                    <p class="stats-number">{{ $total_schedule_days }}</p>
                </div>
            </div>

            <!-- Sponsors Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card orange">
                    <div class="stats-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Sponsors</h4>
                    <p class="stats-number">{{ $total_sponsors }}</p>
                </div>
            </div>

            <!-- Organisers Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card red">
                    <div class="stats-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <h4>Organisers</h4>
                    <p class="stats-number">{{ $total_organisers }}</p>
                </div>
            </div>

            <!-- Attendees Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card teal">
                    <div class="stats-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Attendees</h4>
                    <p class="stats-number">{{ $total_attendees }}</p>
                </div>
            </div>

            <!-- Packages Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card purple">
                    <div class="stats-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h4>Packages</h4>
                    <p class="stats-number">{{ $total_packages }}</p>
                </div>
            </div>

            <!-- Tickets Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card blue">
                    <div class="stats-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h4>Tickets Sold</h4>
                    <p class="stats-number">{{ $total_tickets }}</p>
                </div>
            </div>

            <!-- Subscribers Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card green">
                    <div class="stats-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Subscribers</h4>
                    <p class="stats-number">{{ $total_subscribers }}</p>
                </div>
            </div>

            <!-- Photos Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card orange">
                    <div class="stats-icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <h4>Photo Gallery</h4>
                    <p class="stats-number">{{ $total_photos }}</p>
                </div>
            </div>

            <!-- Videos Card -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card red">
                    <div class="stats-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <h4>Video Gallery</h4>
                    <p class="stats-number">{{ $total_videos }}</p>
                </div>
            </div>

            <!-- Active Events Card (Placeholder) -->
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="stats-card teal">
                    <div class="stats-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h4>Active Events</h4>
                    <p class="stats-number">1</p>
                </div>
            </div>
        </div>

        <!-- Recent Tickets Section -->
        <div class="section-title">
            <i class="fas fa-ticket-alt"></i>
            Recent Ticket Purchases
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="table-container">
                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Details</th>
                                            <th>Package</th>
                                            <th>Payment</th>
                                            <th>Tickets</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tickets as $ticket)
                                        <tr>
                                            <td><strong>{{ $loop->iteration }}</strong></td>
                                            <td>
                                                <div style="line-height: 1.6;">
                                                    <strong>{{ $ticket->user->name }}</strong><br>
                                                    <small class="text-muted">{{ $ticket->user->email }}</small><br>
                                                    <a href="{{ route('admin_attendee_index') }}" class="text-primary" style="font-size: 12px;">
                                                        <i class="fas fa-user-circle"></i> View Profile
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_package_index') }}" class="text-decoration-none">
                                                    <span class="badge bg-info text-white" style="font-size: 12px; padding: 8px 12px;">
                                                        <i class="fas fa-box"></i> {{ $ticket->package->name }}
                                                    </span>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary" style="font-size: 11px;">
                                                    {{ $ticket->payment_method }}
                                                </span>
                                            </td>
                                            <td>
                                                <strong style="color: #667eea;">{{ $ticket->total_tickets }}</strong>
                                            </td>
                                            <td>
                                                <strong style="color: #43e97b; font-size: 16px;">${{ number_format($ticket->total_price, 2) }}</strong>
                                            </td>
                                            <td>
                                                @if($ticket->payment_status == 'Pending')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="fas fa-clock"></i> Pending
                                                </span>
                                                @elseif($ticket->payment_status == 'Completed')
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check-circle"></i> Completed
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <small>{{ $ticket->created_at->format('M d, Y') }}</small><br>
                                                <small class="text-muted">{{ $ticket->created_at->format('h:i A') }}</small>
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#modal_{{ $loop->iteration }}" title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <div class="modal fade" id="modal_{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content" style="border-radius: 15px; border: none;">
                                                            <div class="modal-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 15px 15px 0 0;">
                                                                <h5 class="modal-title">
                                                                    <i class="fas fa-receipt"></i> Payment Details
                                                                </h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" style="padding: 30px;">

                                                                <div class="row mb-4">
                                                                    <div class="col-md-12">
                                                                        <h6 style="color: #667eea; font-weight: 700; margin-bottom: 15px; border-bottom: 2px solid #667eea; padding-bottom: 10px;">
                                                                            <i class="fas fa-user"></i> User Information
                                                                        </h6>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">User Name</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->user->name }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">User Email</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->user->email }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col-md-12">
                                                                        <h6 style="color: #667eea; font-weight: 700; margin-bottom: 15px; margin-top: 20px; border-bottom: 2px solid #667eea; padding-bottom: 10px;">
                                                                            <i class="fas fa-file-invoice"></i> Billing Information
                                                                        </h6>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Name</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_name }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Email</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_email }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Phone</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_phone }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Address</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->billing_address }}<br>
                                                                        {{ $ticket->billing_city }}, {{ $ticket->billing_state }} {{ $ticket->billing_zip }}<br>
                                                                        {{ $ticket->billing_country }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col-md-12">
                                                                        <h6 style="color: #667eea; font-weight: 700; margin-bottom: 15px; margin-top: 20px; border-bottom: 2px solid #667eea; padding-bottom: 10px;">
                                                                            <i class="fas fa-credit-card"></i> Payment Information
                                                                        </h6>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Payment Method</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <span class="badge bg-secondary">{{ $ticket->payment_method }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Currency</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->payment_currency }}
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Transaction ID</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <code>{{ $ticket->transaction_id }}</code>
                                                                    </div>
                                                                </div>

                                                                @if($ticket->bank_transaction_info)
                                                                <div class="row mb-3">
                                                                    <div class="col-md-4">
                                                                        <strong style="color: #6c757d;">Bank Info</strong>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $ticket->bank_transaction_info }}
                                                                    </div>
                                                                </div>
                                                                @endif

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
