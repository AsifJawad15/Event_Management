@extends('front.layout.master')

@section('title', 'Pricing | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.pricing-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.pricing-hero::before {
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

.pricing-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.pricing-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px 30px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    position: relative;
    height: 100%;
}

.pricing-card.popular {
    border: 2px solid #667eea;
    transform: scale(1.05);
}

.pricing-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
}

.popular-badge {
    position: absolute;
    top: -15px;
    right: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 8px 25px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 700;
}

.package-name {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
}

.package-price {
    font-size: 48px;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
}

.package-price small {
    font-size: 20px;
    opacity: 0.8;
}

.package-features {
    list-style: none;
    padding: 0;
    margin: 30px 0;
}

.package-features li {
    color: rgba(224, 224, 224, 0.9);
    padding: 12px 0;
    border-bottom: 1px solid rgba(102, 126, 234, 0.2);
}

.package-features li i {
    color: #667eea;
    margin-right: 10px;
}

.btn-buy {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 15px 40px;
    border-radius: 50px;
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
    width: 100%;
}

.btn-buy:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
    color: #fff;
}

@media (max-width: 991px) {
    .pricing-hero h1 { font-size: 36px; }
    .pricing-card.popular { transform: scale(1); }
}
</style>

<div class="pricing-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Event Pricing</h1>
    </div>
</div>

<section id="pricing">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Choose Your Package</h2>
            <p>Select the perfect plan and get access to all sessions, unlimited coffee and food</p>
        </div>

        <div class="row justify-content-center">
            @if($packages->count() > 0)
                @php
                    // Define facility limits per package based on order: Basic=3, Standard=6, VIP=10
                    $facilityLimits = [3, 6, 10];
                @endphp

                @foreach($packages as $index => $package)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card {{ $loop->iteration == 2 ? 'popular' : '' }} animate-on-scroll">
                        @if($loop->iteration == 2)
                            <div class="popular-badge">POPULAR</div>
                        @endif

                        <h3 class="package-name">{{ $package->name }}</h3>
                        <div class="package-price">
                            <i class="fa-solid fa-bangladeshi-taka-sign"></i>{{ number_format($package->price, 0) }}
                            <small>/ticket</small>
                        </div>

                        <ul class="package-features">
                            @if($package->facilities && $package->facilities->count() > 0)
                                @php
                                    $limit = $facilityLimits[$index] ?? 5;
                                @endphp
                                @foreach($package->facilities->sortBy('item_order')->take($limit) as $facility)
                                    <li>
                                        <i class="fas fa-check-circle"></i>
                                        {{ $facility->name }}
                                    </li>
                                @endforeach
                            @else
                                <li><i class="fas fa-check-circle"></i> Full Event Access</li>
                                <li><i class="fas fa-check-circle"></i> All Sessions</li>
                                <li><i class="fas fa-check-circle"></i> Coffee & Snacks</li>
                            @endif
                        </ul>

                        <a href="{{ route('front.buy_ticket', $package->id) }}" class="btn btn-buy">
                            <i class="fas fa-ticket-alt"></i> Buy Ticket
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="dark-card text-center p-5">
                        <i class="fas fa-ticket-alt" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                        <h3 style="color: #fff;">No Packages Available</h3>
                        <p style="color: rgba(224, 224, 224, 0.8);">Check back soon for pricing information.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
