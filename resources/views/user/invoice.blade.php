@extends('front.layout.master')

@section('title', 'Invoice')

@section('main_content')
@include('front.layout.dark-nav')

<style>
/* Modern Invoice Page Styling */
:root {
    --primary: #{{ $setting_data->theme_color ?? '6bc24a' }};
    --secondary: #{{ $setting_data->theme_color ?? '6bc24a' }}dd;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
    --glow: rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.6);
}

.invoice-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 80px 0 60px;
}

/* Hero Banner */
.invoice-hero {
    background: linear-gradient(135deg, rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.1) 0%, rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.05) 100%);
    border-radius: 30px;
    padding: 60px 40px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.2);
    text-align: center;
    animation: slideDown 0.8s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.invoice-hero h2 {
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
.invoice-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 30px;
}

/* Sidebar */
.invoice-sidebar {
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
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.2);
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
    background: rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.2);
    color: #fff;
    padding-left: 30px;
    box-shadow: 0 4px 15px var(--glow);
}

.nav-menu a i {
    font-size: 20px;
    width: 24px;
}

/* Content */
.invoice-content {
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
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.content-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid rgba({{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color ?? '6bc24a', 4, 2)) }}, 0.2);
}

.content-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin: 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.btn {
    padding: 10px 25px;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
}

.btn-success {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
}

.btn-success:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px var(--glow);
    color: white;
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

.btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px var(--glow);
    color: white;
}

/* Invoice Container */
.invoice-container {
    background: white;
    border-radius: 15px;
    padding: 40px;
    color: #333;
}

.h_70 {
    height: 70px;
    object-fit: contain;
}

.invoice-top-right {
    text-align: right;
}

.invoice-top-right h4 {
    font-size: 32px;
    color: var(--primary);
    margin-bottom: 10px;
}

.invoice-top-right h5 {
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
}

.invoice-middle-left h4,
.invoice-middle-right h4 {
    color: #333;
    border-bottom: 3px solid var(--primary);
    padding-bottom: 8px;
    margin-bottom: 15px;
    font-size: 18px;
}

.table-border-0 td {
    border: none !important;
}

.invoice-item-table th {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    padding: 15px;
}

.invoice-item-table td {
    padding: 15px;
}

.invoice-total-summary {
    background-color: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.invoice-total-summary p {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 15px;
}

.invoice-total-summary hr {
    border-top: 2px solid var(--primary);
    margin: 15px 0;
}

.invoice-note h5 {
    color: var(--primary);
    margin-bottom: 10px;
}

.invoice-note p {
    color: #666;
    line-height: 1.6;
}

.invoice-signature {
    text-align: right;
}

.badge {
    padding: 6px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 11px;
    text-transform: uppercase;
}

.badge-success {
    background: linear-gradient(135deg, #10b981, #059669);
    color: white;
}

.badge-warning {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
}

/* Action Buttons */
.print-button {
    display: flex;
    gap: 15px;
    margin-top: 30px;
}

/* Invoice Company Name */
.invoice-company-name h3 {
    color: var(--primary);
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.invoice-company-name h3 i {
    font-size: 32px;
}

.company-tagline {
    color: #666;
    font-size: 14px;
    margin: 0;
    font-style: italic;
}

/* Responsive */
@media (max-width: 1024px) {
    .invoice-grid {
        grid-template-columns: 1fr;
    }

    .sidebar-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .invoice-hero {
        padding: 40px 20px;
    }

    .invoice-hero h2 {
        font-size: 36px;
    }

    .content-card {
        padding: 25px;
    }

    .invoice-container {
        padding: 20px;
    }

    .content-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .print-button {
        flex-direction: column;
    }
}

/* Print Styles */
@media print {
    .invoice-wrapper {
        background: white !important;
        padding: 0 !important;
        min-height: auto !important;
    }

    .invoice-hero,
    .invoice-sidebar,
    .content-header,
    .print-button,
    nav,
    footer,
    .no-print {
        display: none !important;
    }

    body {
        background: white;
        padding: 0;
        margin: 0;
    }

    .invoice-grid {
        display: block !important;
        grid-template-columns: none !important;
    }

    .invoice-content {
        animation: none;
        display: block !important;
    }

    .content-card {
        background: white;
        border: none;
        box-shadow: none;
        padding: 0;
        display: block !important;
    }

    .invoice-container {
        border: none;
        padding: 20px;
        box-shadow: none;
        display: block !important;
        background: white !important;
    }

    .invoice-top,
    .invoice-middle,
    .invoice-item,
    .invoice-bottom,
    .invoice-footer {
        display: block !important;
    }

    table {
        page-break-inside: avoid;
    }
}
</style>

<div class="invoice-wrapper">
    <div class="container">
        <!-- Hero Banner -->
        <div class="invoice-hero">
            <h2><i class="fas fa-file-invoice"></i> Invoice</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>/</li>
                <li><a href="{{ route('attendee.tickets') }}">My Tickets</a></li>
                <li>/</li>
                <li>Invoice</li>
            </ul>
        </div>

        <!-- Main Grid -->
        <div class="invoice-grid">
            <!-- Sidebar -->
            <div class="invoice-sidebar">
                <div class="sidebar-card">
                    <ul class="nav-menu">
                        <li>
                            <a href="{{ route('user.dashboard') }}">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('attendee.tickets') }}">
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
            <div class="invoice-content">
                <div class="content-card">
                    <div class="content-header">
                        <h2>
                            <i class="fas fa-receipt"></i>
                            Invoice - Order #{{ $ticket->payment_id }}
                        </h2>
                        <button onclick="window.print()" class="btn btn-success no-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </button>
                    </div>

                    <div class="invoice-container" id="print_invoice">
                            <div class="invoice-top">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-border-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-50">
                                                    <div class="invoice-company-name">
                                                        <h3><i class="fas fa-calendar-alt"></i> Evento</h3>
                                                        <p class="company-tagline">Professional Event Management</p>
                                                    </div>
                                                </td>
                                                <td class="w-50">
                                                    <div class="invoice-top-right">
                                                        <h4>Invoice</h4>
                                                        <h5>Order No: {{ $ticket->payment_id }}</h5>
                                                        <h5>Date: {{ $ticket->created_at->format('Y-m-d') }}</h5>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-middle">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-border-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-50">
                                                    <div class="invoice-middle-left">
                                                        <h4>Invoice To:</h4>
                                                        <p class="mb_0"><strong>{{ $ticket->user->name }}</strong></p>
                                                        <p class="mb_0">{{ $ticket->user->email }}</p>
                                                        <p class="mb_0">{{ $ticket->user->phone ?? 'N/A' }}</p>
                                                        <p class="mb_0">{{ $ticket->user->address ?? 'N/A' }}</p>
                                                        @if($ticket->user->state || $ticket->user->city || $ticket->user->zip)
                                                        <p class="mb_0">{{ $ticket->user->state }}, {{ $ticket->user->city }}, {{ $ticket->user->zip }}</p>
                                                        @endif
                                                        <p class="mb_0">{{ $ticket->user->country ?? 'N/A' }}</p>
                                                    </div>
                                                </td>
                                                <td class="w-50">
                                                    <div class="invoice-middle-right">
                                                        <h4>Invoice From:</h4>
                                                        <p class="mb_0"><strong>Evento</strong></p>
                                                        @if(isset($admin) && $admin)
                                                        <p class="mb_0 color_6d6d6d">{{ $admin->name }}</p>
                                                        <p class="mb_0">{{ $admin->email }}</p>
                                                        @endif
                                                        <p class="mb_0">Event Management Company</p>
                                                        <p class="mb_0">Dhaka, Bangladesh</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered invoice-item-table">
                                        <tbody>
                                            <tr>
                                                <th>SL</th>
                                                <th>Ticket Package</th>
                                                <th>Payment Status</th>
                                                <th class="text-center">Per Ticket Price</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-right">Subtotal</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $ticket->package->name ?? $ticket->package_name }}</td>
                                                <td>
                                                    @if($ticket->payment_status == 'Completed')
                                                    <span class="badge badge-success">{{ $ticket->payment_status }}</span>
                                                    @else
                                                    <span class="badge badge-warning">{{ $ticket->payment_status }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">৳{{ number_format($ticket->per_ticket_price, 2) }}</td>
                                                <td class="text-center">{{ $ticket->total_tickets }}</td>
                                                <td class="text-right">৳{{ number_format($ticket->total_price, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-bottom">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-border-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-70 invoice-bottom-payment">
                                                    <h4>Payment Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4"><strong>Payment Method:</strong></div>
                                                        <div class="col-md-8">{{ $ticket->payment_method }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4"><strong>Transaction ID:</strong></div>
                                                        <div class="col-md-8">{{ $ticket->transaction_id }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-md-4"><strong>Payment Currency:</strong></div>
                                                        <div class="col-md-8">{{ $ticket->payment_currency }}</div>
                                                    </div>
                                                    @if($ticket->bank_transaction_info)
                                                    <div class="row mb-2">
                                                        <div class="col-md-4"><strong>Bank Info:</strong></div>
                                                        <div class="col-md-8">{{ $ticket->bank_transaction_info }}</div>
                                                    </div>
                                                    @endif
                                                </td>
                                                <td class="w-30 tar invoice-bottom-total-box">
                                                    <div class="invoice-total-summary">
                                                        <p class="mb_0">Subtotal: <span>৳{{ number_format($ticket->total_price, 2) }}</span></p>
                                                        <p class="mb_0">Tax (0%): <span>৳0.00</span></p>
                                                        <p class="mb_0">Discount: <span>৳0.00</span></p>
                                                        <hr>
                                                        <p class="mb_0"><strong>Total Price: <span>৳{{ number_format($ticket->total_price, 2) }}</span></strong></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-footer mt-4">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="invoice-note">
                                    <h5>Note:</h5>
                                    <p>Thank you for purchasing tickets for our event. Please bring this invoice along with a valid ID for event entry. For any queries, please contact our support team.</p>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <div class="invoice-signature">
                                    <p>____________________<br>
                                    <strong>Authorized Signature</strong><br>
                                    Event Management Team</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="print-button">
                        <a href="{{ route('attendee.tickets') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Tickets
                        </a>
                        <button onclick="printInvoice()" class="btn btn-primary">
                            <i class="fa fa-print"></i> Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printInvoice() {
        window.print();
    }
</script>

@endsection
