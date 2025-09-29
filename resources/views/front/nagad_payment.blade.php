@extends('front.layout.master')

@section('title', 'Nagad Payment | SingleEvent')
@section('content')
@include('front.layout.navigation')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner-home.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Nagad Payment</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.pricing') }}">Pricing</a></li>
                            <li class="breadcrumb-item active">Nagad Payment</li>
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
                    <div class="card-header text-center" style="background-color: #ec1f26; color: white;">
                        <h3><i class="fas fa-mobile-alt"></i> Nagad Payment</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <img src="data:image/png;base64,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" alt="Nagad" style="height: 60px;">
                        </div>
                        <h4>Payment Amount: ৳{{ number_format($price * 85, 2) }}</h4>
                        <p class="text-muted">This is a demo payment gateway for testing purposes</p>

                        <form class="mt-4">
                            <div class="form-group">
                                <label>Enter your Nagad Mobile Number</label>
                                <input type="text" class="form-control" placeholder="01XXXXXXXXX" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Enter PIN</label>
                                <input type="password" class="form-control" placeholder="****" required>
                            </div>
                        </form>

                        <div class="mt-4">
                            <a href="{{ route('nagad_success') }}" class="btn btn-success btn-lg mr-3">
                                <i class="fas fa-check"></i> Pay Now
                            </a>
                            <a href="{{ route('nagad_cancel') }}" class="btn btn-danger btn-lg">
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
