@extends('front.layout.master')

@section('title', 'Nagad Payment | SingleEvent')
@section('main_content')
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

<div class="pt_50 pb_70" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Nagad Authentic Payment Interface -->
                <div class="nagad-payment-container">
                    <!-- Header -->
                    <div class="nagad-header">
                        <div class="nagad-logo-section">
                            <span class="nagad-logo-text">নগদ</span>
                            <span class="sandbox-text">Sandbox Merchant</span>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="nagad-body">
                        <div class="payment-info">
                            <p class="invoice-label">Invoice No: <strong>{{ 'INV-' . time() }}</strong></p>
                            <p class="amount-label">Total Amount: <strong>BDT {{ number_format($price * 85, 2) }}</strong></p>
                            <p class="charge-label">Charge: <strong>BDT 0</strong></p>
                        </div>

                        <div class="account-input-section">
                            <label class="account-label">Your Nagad Account Number</label>
                            <div class="mobile-input-container">
                                <div class="mobile-number-display">
                                    <span class="number-boxes">
                                        <span class="box">0</span>
                                        <span class="box">1</span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                        <span class="box"></span>
                                    </span>
                                </div>
                                <input type="text" class="nagad-input" placeholder="Enter mobile number" maxlength="11">
                            </div>

                            <div class="terms-section">
                                <p class="terms-text">
                                    By clicking "Proceed" you are agreeing to the
                                    <a href="#" class="terms-link">Nagad Terms and Conditions</a>
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('nagad_success') }}" class="btn-proceed">Proceed</a>
                            <a href="{{ route('nagad_cancel') }}" class="btn-close">Close</a>
                        </div>

                        <!-- Footer -->
                        <div class="nagad-footer">
                            <div class="nagad-logo-footer">
                                <span class="footer-logo">নগদ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.nagad-payment-container {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    overflow: hidden;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.nagad-header {
    background: linear-gradient(135deg, #ed1c24 0%, #b71c1c 100%);
    padding: 15px 20px;
    text-align: center;
}

.nagad-logo-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.nagad-logo-text {
    color: white;
    font-size: 24px;
    font-weight: bold;
    font-family: 'SolaimanLipi', Arial, sans-serif;
}

.sandbox-text {
    color: rgba(255,255,255,0.9);
    font-size: 14px;
    font-weight: 500;
}

.nagad-body {
    padding: 25px 20px;
    background: #ed1c24;
    color: white;
}

.payment-info {
    margin-bottom: 25px;
    text-align: left;
}

.payment-info p {
    margin: 8px 0;
    font-size: 14px;
    line-height: 1.4;
}

.invoice-label, .amount-label, .charge-label {
    color: rgba(255,255,255,0.9);
}

.account-input-section {
    margin-bottom: 25px;
}

.account-label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    color: rgba(255,255,255,0.9);
    text-align: center;
}

.mobile-input-container {
    margin-bottom: 20px;
}

.mobile-number-display {
    display: flex;
    justify-content: center;
    margin-bottom: 15px;
}

.number-boxes {
    display: flex;
    gap: 3px;
}

.box {
    width: 25px;
    height: 30px;
    border: 1px solid rgba(255,255,255,0.4);
    background: rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 14px;
    font-weight: bold;
    border-radius: 3px;
}

.nagad-input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 4px;
    background: rgba(255,255,255,0.1);
    color: white;
    font-size: 16px;
    text-align: center;
}

.nagad-input::placeholder {
    color: rgba(255,255,255,0.6);
}

.nagad-input:focus {
    outline: none;
    border-color: rgba(255,255,255,0.6);
    background: rgba(255,255,255,0.15);
}

.terms-section {
    margin-top: 20px;
    text-align: center;
}

.terms-text {
    font-size: 12px;
    line-height: 1.4;
    color: rgba(255,255,255,0.8);
    margin: 0;
}

.terms-link {
    color: rgba(255,255,255,0.9);
    text-decoration: underline;
}

.action-buttons {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.btn-proceed, .btn-close {
    flex: 1;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-proceed {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 1px solid rgba(255,255,255,0.4);
}

.btn-proceed:hover {
    background: rgba(255,255,255,0.3);
    color: white;
    text-decoration: none;
}

.btn-close {
    background: rgba(255,255,255,0.1);
    color: rgba(255,255,255,0.8);
    border: 1px solid rgba(255,255,255,0.3);
}

.btn-close:hover {
    background: rgba(255,255,255,0.2);
    color: white;
    text-decoration: none;
}

.nagad-footer {
    text-align: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,0.2);
}

.footer-logo {
    color: white;
    font-size: 18px;
    font-weight: bold;
    font-family: 'SolaimanLipi', Arial, sans-serif;
    opacity: 0.8;
}

@media (max-width: 768px) {
    .col-md-4 {
        padding: 0 15px;
    }

    .nagad-payment-container {
        margin: 0 10px;
    }

    .number-boxes {
        flex-wrap: wrap;
        justify-content: center;
    }

    .box {
        width: 22px;
        height: 28px;
        font-size: 12px;
    }
}
</style>
@endsection
