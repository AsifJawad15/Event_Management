@extends('front.layout.master')

@section('title', 'bKash Payment | SingleEvent')
@section('main_content')
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

<div class="pt_50 pb_70" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- bKash Authentic Payment Interface -->
                <div class="bkash-payment-container">
                    <!-- Header -->
                    <div class="bkash-header">
                        <div class="bkash-logo-section">
                            <span class="bkash-logo-text">bKash</span>
                            <span class="payment-text">Payment</span>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="bkash-body">
                        <div class="merchant-info">
                            <p class="merchant-label">Merchant: <strong>{{ config('app.name') }}</strong></p>
                            <p class="invoice-label">Invoice no: <strong>{{ 'INV-' . time() }}</strong></p>
                            <p class="amount-label">Amount: <strong>BDT {{ number_format($price * 85, 2) }}</strong></p>
                        </div>

                        <div class="account-input-section">
                            <label class="account-label">Your bKash account number</label>
                            <input type="text" class="bkash-input" placeholder="e.g. 01XXXXXXXXX" maxlength="11">

                            <div class="terms-section">
                                <label class="terms-checkbox">
                                    <input type="checkbox" required>
                                    <span class="checkmark"></span>
                                    I agree to the <a href="#" class="terms-link">terms and conditions</a>
                                </label>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('bkash_success') }}" class="btn-proceed">PROCEED</a>
                            <a href="{{ route('bkash_cancel') }}" class="btn-close">CLOSE</a>
                        </div>

                        <!-- Footer -->
                        <div class="bkash-footer">
                            <span class="powered-by">Powered by bKash</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bkash-payment-container {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    overflow: hidden;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.bkash-header {
    background: linear-gradient(90deg, #e2136e 0%, #e2136e 100%);
    padding: 15px 20px;
    border-bottom: 3px solid #d1116a;
}

.bkash-logo-section {
    display: flex;
    align-items: center;
    gap: 10px;
}

.bkash-logo-text {
    color: white;
    font-size: 24px;
    font-weight: bold;
    position: relative;
}

.bkash-logo-text::before {
    content: '';
    position: absolute;
    right: -8px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 8px solid white;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
}

.payment-text {
    color: white;
    font-size: 16px;
    font-weight: 500;
}

.bkash-body {
    padding: 25px 20px;
    background: #e2136e;
    color: white;
}

.merchant-info {
    margin-bottom: 25px;
}

.merchant-info p {
    margin: 8px 0;
    font-size: 14px;
    line-height: 1.4;
}

.merchant-label, .invoice-label, .amount-label {
    color: rgba(255,255,255,0.9);
}

.account-input-section {
    margin-bottom: 25px;
}

.account-label {
    display: block;
    margin-bottom: 10px;
    font-size: 14px;
    color: rgba(255,255,255,0.9);
}

.bkash-input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 4px;
    background: rgba(255,255,255,0.1);
    color: white;
    font-size: 16px;
    margin-bottom: 15px;
}

.bkash-input::placeholder {
    color: rgba(255,255,255,0.6);
}

.bkash-input:focus {
    outline: none;
    border-color: rgba(255,255,255,0.6);
    background: rgba(255,255,255,0.15);
}

.terms-section {
    margin-top: 15px;
}

.terms-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    cursor: pointer;
    font-size: 13px;
    line-height: 1.4;
}

.terms-checkbox input[type="checkbox"] {
    margin: 0;
    opacity: 0;
    position: absolute;
}

.checkmark {
    width: 16px;
    height: 16px;
    border: 2px solid rgba(255,255,255,0.6);
    border-radius: 3px;
    background: transparent;
    flex-shrink: 0;
    margin-top: 2px;
}

.terms-checkbox input[type="checkbox"]:checked + .checkmark {
    background: white;
    border-color: white;
}

.terms-checkbox input[type="checkbox"]:checked + .checkmark::after {
    content: '✓';
    display: block;
    color: #e2136e;
    font-size: 12px;
    font-weight: bold;
    text-align: center;
    line-height: 12px;
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

.bkash-footer {
    text-align: center;
    margin-top: 15px;
}

.powered-by {
    font-size: 12px;
    color: rgba(255,255,255,0.7);
}

@media (max-width: 768px) {
    .col-md-4 {
        padding: 0 15px;
    }

    .bkash-payment-container {
        margin: 0 10px;
    }
}
</style>
@endsection
