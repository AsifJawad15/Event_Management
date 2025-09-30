@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Invoice - Order #{{ $ticket->payment_id }}</h1>
            <div class="ml-auto">
                <button onclick="window.print()" class="btn btn-primary">
                    <i class="fas fa-print"></i> Print Invoice
                </button>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="invoice-content">
                            <div class="invoice">
                                <div class="invoice-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-number">
                                                <h2>INVOICE</h2>
                                                <p>Order ID: <strong>{{ $ticket->payment_id }}</strong></p>
                                                <p>Invoice Date: {{ $ticket->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <div class="invoice-company">
                                                <h4>Event Management</h4>
                                                <p>123 Event Street<br>
                                                Dhaka, Bangladesh<br>
                                                Phone: +880 123 456 789<br>
                                                Email: info@eventmanagement.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-billing">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-billing-from">
                                                <h5>Bill From:</h5>
                                                <p><strong>Event Management</strong><br>
                                                123 Event Street<br>
                                                Dhaka, Bangladesh - 1000<br>
                                                Phone: +880 123 456 789</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-billing-to">
                                                <h5>Bill To:</h5>
                                                <p><strong>{{ $ticket->billing_name }}</strong><br>
                                                {{ $ticket->billing_address }}<br>
                                                {{ $ticket->billing_city }}, {{ $ticket->billing_state }} - {{ $ticket->billing_zip }}<br>
                                                {{ $ticket->billing_country }}<br>
                                                Phone: {{ $ticket->billing_phone }}<br>
                                                Email: {{ $ticket->billing_email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-items">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Package Details</th>
                                                    <th>Qty</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <strong>{{ $ticket->package->name }}</strong><br>
                                                        <small class="text-muted">{{ $ticket->package->description ?? 'Event Package' }}</small>
                                                    </td>
                                                    <td>{{ $ticket->total_tickets }}</td>
                                                    <td>৳{{ number_format($ticket->per_ticket_price, 2) }}</td>
                                                    <td>৳{{ number_format($ticket->total_price, 2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="invoice-summary">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-payment-method">
                                                <h5>Payment Information:</h5>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td><strong>Payment Method</strong></td>
                                                            <td>{{ $ticket->payment_method }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Transaction ID</strong></td>
                                                            <td>{{ $ticket->transaction_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Payment Status</strong></td>
                                                            <td>
                                                                @if($ticket->payment_status == 'Completed')
                                                                <span class="badge badge-success">Paid</span>
                                                                @else
                                                                <span class="badge badge-warning">Pending</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Payment Date</strong></td>
                                                            <td>{{ $ticket->created_at->format('M d, Y h:i A') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-total">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td><strong>Sub Total</strong></td>
                                                            <td class="text-right">৳{{ number_format($ticket->total_price, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Tax (0%)</strong></td>
                                                            <td class="text-right">৳0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Discount</strong></td>
                                                            <td class="text-right">৳0.00</td>
                                                        </tr>
                                                        <tr class="bg-light">
                                                            <td><strong>Total Amount</strong></td>
                                                            <td class="text-right"><strong>৳{{ number_format($ticket->total_price, 2) }}</strong></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-footer">
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

                                <div class="invoice-qr mt-4">
                                    <div class="text-center">
                                        <p><small class="text-muted">Scan QR code for event details</small></p>
                                        <!-- QR Code placeholder - you can integrate a QR code generator here -->
                                        <div class="qr-placeholder" style="width: 100px; height: 100px; border: 2px dashed #ccc; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                                            <small>QR Code</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
@media print {
    .main-sidebar,
    .navbar,
    .section-header .btn,
    .footer {
        display: none !important;
    }

    .main-content {
        margin-left: 0 !important;
        padding: 0 !important;
    }

    .invoice {
        margin: 0;
        padding: 20px;
    }

    .card {
        border: none !important;
        box-shadow: none !important;
    }

    body {
        background: white !important;
    }

    .qr-placeholder {
        border: 1px solid #000 !important;
    }
}

.invoice {
    background: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 30px;
    margin: 20px 0;
}

.invoice-header {
    border-bottom: 2px solid #6777ef;
    padding-bottom: 20px;
    margin-bottom: 30px;
}

.invoice-number h2 {
    color: #6777ef;
    margin-bottom: 10px;
}

.invoice-company h4 {
    color: #333;
    margin-bottom: 10px;
}

.invoice-billing {
    margin-bottom: 30px;
}

.invoice-billing h5 {
    color: #6777ef;
    border-bottom: 1px solid #eee;
    padding-bottom: 5px;
    margin-bottom: 15px;
}

.invoice-items {
    margin-bottom: 30px;
}

.invoice-items .table th {
    background-color: #6777ef;
    color: white;
    border: none;
}

.invoice-summary {
    border-top: 2px solid #eee;
    padding-top: 20px;
}

.invoice-total .table tr.bg-light {
    background-color: #f8f9fa !important;
}

.invoice-footer {
    border-top: 1px solid #eee;
    padding-top: 20px;
    margin-top: 30px;
}

.invoice-note h5 {
    color: #6777ef;
}

.qr-placeholder {
    background-color: #f8f9fa;
}
</style>
@endsection
