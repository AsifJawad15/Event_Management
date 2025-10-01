@extends('front.layout.master')

@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('uploads/'.$setting_data->banner ?? 'dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Invoice: {{ $ticket->payment_id }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('attendee.tickets') }}">My Tickets</a></li>
                            <li class="breadcrumb-item active">Invoice: {{ $ticket->payment_id }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="user-section pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="user-sidebar">
                    <div class="card">
                        @include('front.layout.sidebar')
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="invoice-container" id="print_invoice">
                    <div class="invoice-top">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-border-0">
                                        <tbody>
                                            <tr>
                                                <td class="w-50">
                                                    @if(isset($setting->logo))
                                                    <img src="{{ asset('uploads/'.$setting->logo) }}" alt="" class="h_70">
                                                    @else
                                                    <h3>{{ env('APP_NAME', 'Event Management') }}</h3>
                                                    @endif
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
                                                        <p class="mb_0"><strong>{{ env('APP_NAME', 'Event Management') }}</strong></p>
                                                        @if($admin)
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
                
                <div class="print-button mt_25">
                    <a href="{{ route('attendee.tickets') }}" class="btn btn-secondary mr-2">
                        <i class="fa fa-arrow-left"></i> Back to Tickets
                    </a>
                    <a onclick="printInvoice()" href="javascript:;" class="btn btn-primary">
                        <i class="fa fa-print"></i> Print Invoice
                    </a>
                </div>
                
                <script>
                    function printInvoice() {
                        let body = document.body.innerHTML;
                        let data = document.getElementById('print_invoice').innerHTML;
                        document.body.innerHTML = data;
                        window.print();
                        document.body.innerHTML = body;
                    }
                </script>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .user-sidebar,
    .print-button,
    .common-banner,
    .breadcrumb-container {
        display: none !important;
    }
    
    .user-section {
        padding: 0 !important;
    }
    
    .invoice-container {
        margin: 0 !important;
        padding: 20px !important;
    }
    
    body {
        background: white !important;
    }
}

.invoice-container {
    background: white;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 30px;
    margin: 20px 0;
}

.invoice-top-right {
    text-align: right;
}

.invoice-middle-left h4,
.invoice-middle-right h4 {
    color: #333;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
    margin-bottom: 15px;
}

.invoice-item-table th {
    background-color: #007bff;
    color: white;
    border: none;
}

.invoice-total-summary {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
}

.invoice-note h5 {
    color: #007bff;
}

.badge {
    padding: 5px 10px;
    border-radius: 15px;
}

.badge-success {
    background-color: #28a745;
    color: white;
}

.badge-warning {
    background-color: #ffc107;
    color: #212529;
}
</style>
@endsection