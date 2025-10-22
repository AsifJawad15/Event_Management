@extends('front.layout.master')

@section('title', 'My Tickets')

@section('main_content')
@include('front.layout.dark-nav')

<style>
/* Modern Tickets Page Styling */
:root {
    --primary: #{{ $setting_data->theme_color }};
    --secondary: #{{ $setting_data->theme_color }}dd;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
    --glow: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.6);
}

.tickets-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 80px 0 60px;
}

/* Hero Banner */
.tickets-hero {
    background: linear-gradient(135deg, rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1) 0%, rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.05) 100%);
    border-radius: 30px;
    padding: 60px 40px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    text-align: center;
    animation: slideDown 0.8s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.tickets-hero h2 {
    color: white;
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.page-breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0;
    color: white;
    font-size: 16px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.page-breadcrumb li a {
    color: var(--primary);
    text-decoration: none;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
}

.page-breadcrumb li a:hover {
    color: #fff;
}

/* Grid Layout */
.tickets-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 30px;
}

/* Sidebar */
.tickets-sidebar {
    animation: slideInLeft 0.8s ease;
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}

.sidebar-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 30px;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    position: sticky;
    top: 100px;
}

.nav-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-menu li {
    margin-bottom: 8px;
}

.nav-menu a {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    border-radius: 15px;
    transition: all 0.3s ease;
    font-weight: 500;
    position: relative;
}

.nav-menu a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, var(--primary), var(--secondary));
    border-radius: 0 4px 4px 0;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.nav-menu a.active::before,
.nav-menu a:hover::before {
    transform: scaleY(1);
}

.nav-menu a.active,
.nav-menu a:hover {
    background: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    color: #fff;
    padding-left: 30px;
    box-shadow: 0 4px 15px var(--glow);
}

.nav-menu a i {
    font-size: 20px;
    width: 24px;
}

/* Content */
.tickets-content {
    animation: slideInRight 0.8s ease;
}

@keyframes slideInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}

.content-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 40px;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.content-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
}

.content-header .icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px var(--glow);
}

.content-header .icon i {
    font-size: 24px;
    color: white;
}

.content-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin: 0;
}

/* Table Styling */
.table-responsive {
    background: rgba(15, 23, 42, 0.4);
    border-radius: 15px;
    padding: 20px;
    overflow-x: auto;
}

.table {
    color: #fff;
    margin-bottom: 0;
}

.table thead th {
    background: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    color: #fff;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.3);
    padding: 15px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
}

.table tbody td {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
    padding: 15px;
    vertical-align: middle;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
}

.badge {
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.badge-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.badge-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: white;
}

.btn-sm {
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
}

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px var(--glow);
}

.btn-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
}

/* Modal Styling */
.modal-content {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    border-radius: 20px;
    color: #fff;
}

.modal-header {
    border-bottom: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    background: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
}

.modal-footer {
    border-top: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
}

.modal-body .row {
    padding: 10px 0;
}

.modal-body .col-md-4 {
    font-weight: 600;
    color: rgba(255, 255, 255, 0.7);
}

.modal-body .col-md-8 {
    color: #fff;
}

.divider-1 {
    height: 1px;
    background: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
    margin: 10px 0;
}

.close {
    color: #fff;
    opacity: 0.8;
}

.close:hover {
    color: #fff;
    opacity: 1;
}

.btn-secondary {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
}

.btn-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
}

/* Empty State */
.text-center {
    color: rgba(255, 255, 255, 0.7);
    padding: 40px;
    font-size: 16px;
}

/* Responsive */
@media (max-width: 1024px) {
    .tickets-grid {
        grid-template-columns: 1fr;
    }

    .sidebar-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .tickets-hero {
        padding: 40px 20px;
    }

    .tickets-hero h2 {
        font-size: 36px;
    }

    .content-card {
        padding: 25px;
    }

    .table-responsive {
        padding: 10px;
    }
}
</style>

<div class="tickets-wrapper">
    <div class="container">
        <!-- Hero Banner -->
        <div class="tickets-hero">
            <h2><i class="fas fa-ticket-alt"></i> My Tickets</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>/</li>
                <li>My Tickets</li>
            </ul>
        </div>

        <!-- Main Grid -->
        <div class="tickets-grid">
            <!-- Sidebar -->
            <div class="tickets-sidebar">
                <div class="sidebar-card">
                    <ul class="nav-menu">
                        <li>
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('attendee.tickets') }}" class="active">
                                <i class="fas fa-ticket-alt"></i>
                                <span>My Tickets</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.message') }}">
                                <i class="fas fa-envelope"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.profile') }}">
                                <i class="fas fa-user-cog"></i>
                                <span>Profile Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="tickets-content">
                <div class="content-card">
                    <div class="content-header">
                        <div class="icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <h2>Ticket Summary</h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
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
                                    <td>${{ number_format($ticket->per_ticket_price, 2) }}</td>
                                    <td>{{ $ticket->total_tickets }}</td>
                                    <td>${{ number_format($ticket->total_price, 2) }}</td>
                                    <td>
                                        <span class="badge badge-{{ $ticket->payment_status === 'Completed' ? 'success' : 'danger' }}">
                                            {{ \Illuminate\Support\Str::headline($ticket->payment_status) }}
                                        </span>
                                    </td>
                                    <td>{{ optional($ticket->created_at)->format('d M Y h:i A') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ticketModal_{{ $ticket->id }}" title="View Details">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <a href="{{ route('attendee.invoice', $ticket->id) }}" class="btn btn-success btn-sm" title="View Invoice">
                                            <i class="fa fa-file-invoice"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <i class="fas fa-inbox" style="font-size: 48px; opacity: 0.3; display: block; margin-bottom: 15px;"></i>
                                        No tickets found. <a href="{{ route('front.pricing') }}" style="color: var(--primary);">Buy your first ticket!</a>
                                    </td>
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

@foreach($tickets as $ticket)
<div class="modal fade" id="ticketModal_{{ $ticket->id }}" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel_{{ $ticket->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ticketModalLabel_{{ $ticket->id }}">
                    <i class="fas fa-ticket-alt"></i> Ticket Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-user"></i> User Name:</div>
                    <div class="col-md-8">{{ optional($ticket->user)->name }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-envelope"></i> User Email:</div>
                    <div class="col-md-8">{{ optional($ticket->user)->email }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-id-card"></i> Billing Name:</div>
                    <div class="col-md-8">{{ $ticket->billing_name }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-at"></i> Billing Email:</div>
                    <div class="col-md-8">{{ $ticket->billing_email }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-phone"></i> Billing Phone:</div>
                    <div class="col-md-8">{{ $ticket->billing_phone }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-map-marker-alt"></i> Billing Address:</div>
                    <div class="col-md-8">{{ $ticket->billing_address }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-globe"></i> Billing Country:</div>
                    <div class="col-md-8">{{ $ticket->billing_country }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-map"></i> Billing State:</div>
                    <div class="col-md-8">{{ $ticket->billing_state }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-city"></i> Billing City:</div>
                    <div class="col-md-8">{{ $ticket->billing_city }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-mail-bulk"></i> Billing Zip:</div>
                    <div class="col-md-8">{{ $ticket->billing_zip }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-credit-card"></i> Payment Method:</div>
                    <div class="col-md-8">{{ \Illuminate\Support\Str::headline($ticket->payment_method) }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-dollar-sign"></i> Currency:</div>
                    <div class="col-md-8">{{ $ticket->payment_currency }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-hashtag"></i> Transaction ID:</div>
                    <div class="col-md-8">{{ $ticket->transaction_id }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-university"></i> Bank Info:</div>
                    <div class="col-md-8">{{ $ticket->bank_transaction_info }}</div>
                </div>
                <div class="divider-1"></div>
                <div class="row mb_15">
                    <div class="col-md-4"><i class="fas fa-check-circle"></i> Payment Status:</div>
                    <div class="col-md-8">
                        <span class="badge badge-{{ $ticket->payment_status === 'Completed' ? 'success' : 'danger' }}">
                            {{ \Illuminate\Support\Str::headline($ticket->payment_status) }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
