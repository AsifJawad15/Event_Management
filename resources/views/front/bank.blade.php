@extends('front.layout.master')

@section('title', 'Bank Payment | SingleEvent')
@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner-home.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Bank Payment</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.pricing') }}">Pricing</a></li>
                            <li class="breadcrumb-item active">Bank Payment</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pt_50 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #007bff; color: white;">
                        <h3><i class="fas fa-university"></i> Bank Payment</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment Amount: ৳{{ number_format(session()->get('price'), 2) }}</h5>
                                <h6 class="mt-4">Bank Details:</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td><strong>Bank Name:</strong></td>
                                            <td>Demo Bank Limited</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Account Name:</strong></td>
                                            <td>Evento</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Account Number:</strong></td>
                                            <td>1234567890123456</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Branch:</strong></td>
                                            <td>Dhanmondi Branch</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Routing Number:</strong></td>
                                            <td>123456789</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    Please transfer the exact amount and provide the transaction details below.
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form method="post" action="{{ route('bank_success') }}">
                                    @csrf
                                    <h6>Transaction Information:</h6>
                                    <div class="form-group">
                                        <label>Transaction Reference/ID *</label>
                                        <input type="text" name="bank_transaction_info" class="form-control" placeholder="Enter transaction reference number" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Transaction Date</label>
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Amount Transferred</label>
                                        <input type="text" class="form-control" value="৳{{ number_format(session()->get('price'), 2) }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Additional Notes (Optional)</label>
                                        <textarea class="form-control" rows="3" placeholder="Any additional information..."></textarea>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-success btn-lg mr-3">
                                            <i class="fas fa-check"></i> Submit Payment Details
                                        </button>
                                        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary btn-lg">
                                            <i class="fas fa-times"></i> Cancel
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
