@extends('front.layout.master')

@section('title', 'Pricing | SingleEvent')
@section('content')
<div class="container main-menu" id="navbar">
	<div class="row">
		<div class="col-lg-2 col-sm-12">
			<a href="{{ url('/') }}" id="logo" class="grid_2"> <img src="{{ asset('dist-front/images/logo.png') }}"> </a>
		</div>
		<div class="col-lg-10 col-sm-12">
			<nav class="navbar navbar-expand-lg navbar-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul id="navContent" class="navbar-nav mr-auto navigation">
						<li>
							<a class="nav-link" href="{{ route('front.home') }}">Home</a>
						</li>
						<li>
							<a class="nav-link" href="{{ route('front.speakers') }}">Speakers</a>
						</li>
						<li>
							<a class="nav-link" href="{{ route('front.schedule') }}">Schedule</a>
						</li>
						<li>
							<a class="nav-link active" href="{{ route('front.pricing') }}">Pricing</a>
						</li>
						<li>
							<a class="nav-link" href="{{ route('front.blog') }}">Blog</a>
						</li>
						<li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
							<div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('front.sponsors') }}">Sponsors</a>
								<a class="dropdown-item" href="{{ route('front.organisers') }}">Organisers</a>
								<a class="dropdown-item" href="{{ route('front.accommodations') }}">Accommodations</a>
								<a class="dropdown-item" href="{{ url('/photo-gallery') }}">Photo Gallery</a>
								<a class="dropdown-item" href="{{ url('/video-gallery') }}">Video Gallery</a>
								<a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
								<a class="dropdown-item" href="{{ route('front.testimonials') }}">Testimonials</a>
							</div>
						</li>
						<li>
							<a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
						</li>
						<li class="member-login-button">
							<div class="inner">
								@if(Auth::guard('web')->check())
								<a class="smooth-scroll nav-link" href="{{ route('user.dashboard') }}">
									<i class="fa fa-user"></i> Dashboard
								</a>
								@else
								<a class="nav-link" href="{{ url('/login') }}">
									<i class="fa fa-sign-in"></i> Login
								</a>
								@endif
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>

<section class="page-header" style="background-image: url('{{ asset($banner->background) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="header-content">
                    <h2>Pricing</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <h2 class="section-title">Pricing</h2>
                    <p class="section-description">You will find below the different pricing options for our event. Choose the one that suits you best and register now! You will have access to all sessions, unlimited coffee and food, and the opportunity to meet with your favorite speakers.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @if($packages->count() > 0)
                @php
                    // Get all available active facilities for comparison
                    $allFacilities = \App\Models\PackageFacility::active()->orderByItemOrder()->get();
                @endphp

                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="pricing-card {{ $loop->iteration == 2 ? 'popular' : '' }}">
                        @if($loop->iteration == 2)
                            <div class="popular-badge">POPULAR</div>
                        @endif
                        <div class="pricing-header">
                            <h3 class="package-name">{{ $package->name }}</h3>
                            <div class="package-price">
                                <span class="currency">$</span><span class="amount">{{ number_format($package->price, 0) }}</span>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="features-list">
                                @foreach($allFacilities as $facility)
                                    <li class="feature-item">
                                        @if($package->facilities->contains($facility->id))
                                            <i class="fas fa-check feature-check"></i>
                                        @else
                                            <i class="fas fa-times feature-cross"></i>
                                        @endif
                                        <span>{{ $facility->name }}</span>
                                    </li>
                                @endforeach

                                @if($package->maximum_tickets)
                                    <li class="feature-item">
                                        <i class="fas fa-info-circle feature-info"></i>
                                        <span>Maximum {{ $package->maximum_tickets }} tickets</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            @if($setting_data->ticket_purchase_expire_date < date('Y-m-d'))
                                <a href="javascript:void(0);" class="btn-buy" style="background-color:#c03030;color:#fff;cursor:not-allowed;">TICKET PURCHASE EXPIRED</a>
                            @else
                                @auth
                                    <a href="{{ route('front.buy_ticket', $package->id) }}" class="btn-buy">Buy Ticket</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn-buy">Login to Buy</a>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="text-center">
                        <h3>No Packages Available</h3>
                        <p>We're currently updating our pricing packages. Please check back later.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
.page-header {
    padding: 100px 0 50px;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

.header-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.header-content h2 {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
}

.breadcrumb {
    background: transparent;
    margin-bottom: 0;
    justify-content: center;
}

.breadcrumb-item a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
}

.breadcrumb-item.active {
    color: white;
}

.pricing-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.section-header {
    margin-bottom: 60px;
}

.section-title {
    font-size: 42px;
    font-weight: 700;
    color: #4CAF50;
    margin-bottom: 20px;
    text-align: center;
}

.section-description {
    font-size: 18px;
    color: #6c757d;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
    text-align: center;
}

.pricing-card {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    border: 2px solid transparent;
}

.pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.pricing-card.popular {
    border: 2px solid #4CAF50;
    transform: scale(1.05);
}

.popular-badge {
    position: absolute;
    top: 20px;
    right: -30px;
    background: #4CAF50;
    color: white;
    padding: 5px 35px;
    font-size: 12px;
    font-weight: 600;
    transform: rotate(45deg);
    letter-spacing: 1px;
    z-index: 10;
}

.pricing-header {
    text-align: center;
    padding: 40px 30px 30px;
    background: #ffffff;
    border-bottom: 1px solid #e9ecef;
}

.package-name {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 20px;
}

.package-price {
    font-size: 56px;
    font-weight: 700;
    color: #4CAF50;
    line-height: 1;
}

.currency {
    font-size: 32px;
    vertical-align: top;
}

.amount {
    font-size: 56px;
}

.pricing-body {
    flex: 1;
    padding: 30px;
    background: #ffffff;
}

.features-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #f1f1f1;
    font-size: 16px;
    color: #555;
}

.feature-item:last-child {
    border-bottom: none;
}

.feature-item i {
    width: 20px;
    text-align: center;
    margin-right: 15px;
    font-size: 16px;
    font-weight: bold;
}

.feature-check {
    color: #4CAF50;
}

.feature-cross {
    color: #f44336;
}

.feature-info {
    color: #2196F3;
}

.feature-item span {
    flex: 1;
    font-weight: 500;
}

.pricing-footer {
    padding: 30px;
    background: #ffffff;
    text-align: center;
}

.btn-buy {
    display: inline-block;
    background: #4CAF50;
    color: white !important;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 25px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
    width: 100%;
    max-width: 200px;
}

.btn-buy:hover {
    background: #45a049;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
    text-decoration: none;
    color: white !important;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .header-content h2 {
        font-size: 36px;
    }

    .section-title {
        font-size: 32px;
    }

    .section-description {
        font-size: 16px;
        padding: 0 20px;
    }

    .package-price {
        font-size: 42px;
    }

    .amount {
        font-size: 48px;
    }

    .currency {
        font-size: 28px;
    }

    .package-name {
        font-size: 28px;
    }

    .pricing-header, .pricing-body, .pricing-footer {
        padding: 25px 20px;
    }

    .pricing-card.popular {
        transform: none;
        margin-top: 20px;
    }
}

@media (max-width: 576px) {
    .pricing-section {
        padding: 60px 0;
    }

    .page-header {
        padding: 80px 0 40px;
    }

    .header-content h2 {
        font-size: 28px;
    }

    .section-title {
        font-size: 28px;
    }

    .container {
        padding: 0 15px;
    }

    .col-md-6 {
        margin-bottom: 30px;
    }

    .popular-badge {
        font-size: 10px;
        padding: 3px 25px;
    }
}
</style>
@endsection
