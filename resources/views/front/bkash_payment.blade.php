@extends('front.layout.master')

@section('title', 'bKash Payment | SingleEvent')
@section('content')
@include('front.layout.navigation')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner-home.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>bKash Payment</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.pricing') }}">Pricing</a></li>
                            <li class="breadcrumb-item active">bKash Payment</li>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #e91e63; color: white;">
                        <h3><i class="fas fa-mobile-alt"></i> bKash Payment</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="data:image/png;base64,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" alt="bKash" style="height: 60px;">
                        </div>
                        <h4>Payment Amount: ৳{{ number_format($price * 85, 2) }}</h4>
                        <p class="text-muted">This is a demo payment gateway for testing purposes</p>

                        <form class="mt-4">
                            <div class="form-group">
                                <label>Enter your bKash Mobile Number</label>
                                <input type="text" class="form-control" placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Enter PIN</label>
                                <input type="password" class="form-control" placeholder="****" required>
                            </div>
                        </form>

                        <div class="mt-4">
                            <a href="{{ route('bkash_success') }}" class="btn btn-success btn-lg mr-3">
                                <i class="fas fa-check"></i> Pay Now
                            </a>
                            <a href="{{ route('bkash_cancel') }}" class="btn btn-danger btn-lg">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>

                        <div class="mt-3">
                            <small class="text-muted">This is a sandbox environment. No actual money will be charged.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
