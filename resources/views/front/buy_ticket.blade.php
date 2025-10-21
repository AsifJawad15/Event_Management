@extends('front.layout.master')

@section('title', 'Buy Ticket | SingleEvent')
@section('main_content')
@include('front.layout.dark-nav')

<style>
/* Modern Buy Ticket Page Styles */
:root {
    --primary: #667eea;
    --secondary: #764ba2;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
}

.buy-ticket-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 40px 0 60px;
}

/* Hero Section */
.ticket-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9)),
                url('{{ asset($banner->background) }}') center/cover;
    border-radius: 30px;
    padding: 80px 40px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    text-align: center;
    animation: slideDown 0.8s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.ticket-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: rotateGlow 20s linear infinite;
}

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.ticket-hero-content {
    position: relative;
    z-index: 2;
}

.ticket-hero h1 {
    font-size: 48px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 15px;
    text-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
}

.ticket-breadcrumb {
    display: inline-flex;
    gap: 10px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 50px;
    margin-top: 10px;
}

.ticket-breadcrumb a,
.ticket-breadcrumb span {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    font-weight: 500;
}

.ticket-breadcrumb a:hover {
    color: #fff;
}

/* Form Container */
.ticket-form-container {
    display: grid;
    grid-template-columns: 1fr 400px;
    gap: 30px;
    animation: fadeInUp 0.8s ease;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Billing Card */
.billing-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.card-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid rgba(102, 126, 234, 0.2);
}

.card-header .icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.card-header .icon i {
    font-size: 24px;
    color: white;
}

.card-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin: 0;
}

/* Form Styles */
.form-group {
    margin-bottom: 20px;
}

.form-group label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba(102, 126, 234, 0.2);
    border-radius: 12px;
    padding: 14px 18px;
    color: #fff;
    font-size: 15px;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    background: rgba(15, 23, 42, 0.8);
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.4);
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
}

/* Sidebar Cards */
.sidebar-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.info-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 30px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.info-table {
    width: 100%;
}

.info-table tr {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.info-table tr:last-child {
    border-bottom: none;
}

.info-table td {
    padding: 15px 0;
    color: #fff;
    font-size: 15px;
}

.info-table td:first-child {
    color: rgba(255, 255, 255, 0.7);
    font-weight: 600;
    width: 140px;
}

.info-table td:last-child {
    text-align: right;
    font-weight: 700;
}

.info-table .price-highlight {
    font-size: 24px;
    color: var(--primary);
}

.quantity-input {
    max-width: 100px;
    text-align: center;
}

/* Payment Method */
.payment-select {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba(102, 126, 234, 0.2);
    border-radius: 12px;
    padding: 14px 18px;
    color: #fff;
    font-size: 15px;
    width: 100%;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
}

.payment-select option {
    background: #1e293b;
    color: #fff;
}

/* Submit Button */
.submit-btn {
    width: 100%;
    padding: 18px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border: none;
    border-radius: 15px;
    color: white;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    margin-top: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
}

.submit-btn:active {
    transform: translateY(-1px);
}

/* Responsive */
@media (max-width: 1024px) {
    .ticket-form-container {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .ticket-hero {
        padding: 60px 20px;
    }

    .ticket-hero h1 {
        font-size: 32px;
    }

    .billing-card,
    .info-card {
        padding: 25px;
    }
}
</style>

<div class="buy-ticket-wrapper">
    <div class="container">
        <!-- Hero Section -->
        <div class="ticket-hero">
            <div class="ticket-hero-content">
                <h1>Buy Ticket for {{ $package->name }}</h1>
                <div class="ticket-breadcrumb">
                    <a href="{{ route('front.home') }}">Home</a>
                    <span>/</span>
                    <a href="{{ route('front.pricing') }}">Pricing</a>
                    <span>/</span>
                    <span>Buy Ticket</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <form method="post" action="{{ route('payment') }}">
            @csrf
            <input type="hidden" name="package_id" value="{{ $package->id }}">
            <input type="hidden" name="package_name" value="{{ $package->name }}">

            <div class="ticket-form-container">
                <!-- Billing Information -->
                <div class="billing-card">
                    <div class="card-header">
                        <div class="icon">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <h2>Billing Information</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Full Name *</label>
                            <input name="billing_name" type="text" class="form-control" placeholder="Enter your name" value="{{ Auth::guard('web')->user()->name ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email Address *</label>
                            <input name="billing_email" type="email" class="form-control" placeholder="Enter your email" value="{{ Auth::guard('web')->user()->email ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Phone Number *</label>
                            <input name="billing_phone" type="text" class="form-control" placeholder="Enter your phone" value="{{ Auth::guard('web')->user()->phone ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address *</label>
                            <input name="billing_address" type="text" class="form-control" placeholder="Enter your address" value="{{ Auth::guard('web')->user()->address ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country *</label>
                            <input name="billing_country" type="text" class="form-control" placeholder="Enter your country" value="{{ Auth::guard('web')->user()->country ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State *</label>
                            <input name="billing_state" type="text" class="form-control" placeholder="Enter your state" value="{{ Auth::guard('web')->user()->state ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City *</label>
                            <input name="billing_city" type="text" class="form-control" placeholder="Enter your city" value="{{ Auth::guard('web')->user()->city ?? '' }}" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Zip Code *</label>
                            <input name="billing_zip" type="text" class="form-control" placeholder="Enter zip code" value="{{ Auth::guard('web')->user()->zip ?? '' }}" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Additional Note (Optional)</label>
                            <textarea name="billing_note" class="form-control" placeholder="Any special requests or notes..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sidebar-section">
                    <!-- Ticket Information -->
                    <div class="info-card">
                        <div class="card-header">
                            <div class="icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h2>Ticket Info</h2>
                        </div>

                        <table class="info-table">
                            <tr>
                                <td>Ticket Price</td>
                                <td class="price-highlight">
                                    <i class="fa-solid fa-bangladeshi-taka-sign"></i>{{ number_format($package->price, 0) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Total Tickets</td>
                                <td>
                                    <input type="hidden" name="unit_price" id="ticketPrice" value="{{ $package->price }}">
                                    <input type="number" min="1" max="100" name="quantity" class="form-control quantity-input" value="1" id="numPersons" oninput="calculateTotal()" required>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Total Price</strong></td>
                                <td>
                                    <input type="text" name="total_price" class="form-control" id="totalAmount" value="৳{{ number_format($package->price, 0) }}" readonly style="background: transparent; border: none; text-align: right; color: var(--primary); font-size: 24px; font-weight: 700; padding: 0;">
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Payment Method -->
                    <div class="info-card">
                        <div class="card-header">
                            <div class="icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <h2>Payment</h2>
                        </div>

                        <div class="form-group">
                            <label>Payment Method *</label>
                            <select name="payment_method" class="payment-select" required>
                                <option value="bKash">bKash</option>
                                <option value="Nagad">Nagad</option>
                                <option value="Bank">Bank Transfer</option>
                            </select>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-lock"></i> Complete Purchase
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function calculateTotal() {
    const ticketPrice = parseFloat(document.getElementById('ticketPrice').value);
    const numPersons = parseInt(document.getElementById('numPersons').value) || 1;
    const totalAmount = ticketPrice * numPersons;
    document.getElementById('totalAmount').value = `৳${totalAmount.toLocaleString()}`;
}
</script>

@endsection
