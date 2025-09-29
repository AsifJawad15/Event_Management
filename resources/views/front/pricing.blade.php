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
								<a class="nav-link" href="{{ url('/login') }}">
									<i class="fa fa-sign-in"></i> Login
								</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>

<section class="page-header">
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
        <div class="row justify-content-center">
            @if($packages->count() > 0)
                @php
                    // Get all available facilities for comparison
                    $allFacilities = \App\Models\PackageFacility::active()->orderByItemOrder()->get();
                @endphp

                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="pricing-card">
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
                            <a href="#" class="btn-buy">Buy Ticket</a>
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
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

.pricing-card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
}

.pricing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.pricing-header {
    text-align: center;
    padding: 40px 30px 30px;
    background: #ffffff;
    border-bottom: 1px solid #e9ecef;
}

.package-name {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 20px;
    text-transform: capitalize;
}

.package-price {
    font-size: 48px;
    font-weight: 700;
    color: #27ae60;
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
}

.features-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #f1f1f1;
    font-size: 16px;
    color: #6c757d;
}

.feature-item:last-child {
    border-bottom: none;
}

.feature-item i {
    width: 20px;
    text-align: center;
    margin-right: 15px;
    font-size: 16px;
}

.feature-check {
    color: #27ae60;
}

.feature-cross {
    color: #e74c3c;
}

.feature-info {
    color: #3498db;
}

.feature-item span {
    flex: 1;
}

.pricing-footer {
    padding: 30px;
    background: #ffffff;
    text-align: center;
}

.btn-buy {
    display: inline-block;
    background: #27ae60;
    color: white;
    padding: 15px 40px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);
}

.btn-buy:hover {
    background: #229954;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
    text-decoration: none;
    color: white;
}

/* Premium package highlight */
.pricing-card:nth-child(2) {
    position: relative;
    border: 2px solid #27ae60;
    transform: scale(1.05);
}

.pricing-card:nth-child(2):after {
    content: 'POPULAR';
    position: absolute;
    top: 20px;
    right: -30px;
    background: #27ae60;
    color: white;
    padding: 5px 35px;
    font-size: 12px;
    font-weight: 600;
    transform: rotate(45deg);
    letter-spacing: 1px;
    z-index: 10;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .header-content h2 {
        font-size: 36px;
    }

    .package-price {
        font-size: 36px;
    }

    .amount {
        font-size: 42px;
    }

    .currency {
        font-size: 24px;
    }

    .package-name {
        font-size: 24px;
    }

    .pricing-header, .pricing-body, .pricing-footer {
        padding: 20px;
    }

    .pricing-card:nth-child(2) {
        transform: none;
        margin-top: 20px;
    }
}

@media (max-width: 576px) {
    .pricing-section {
        padding: 40px 0;
    }

    .page-header {
        padding: 60px 0 30px;
    }

    .header-content h2 {
        font-size: 28px;
    }

    .container {
        padding: 0 15px;
    }

    .col-md-6 {
        margin-bottom: 30px;
    }
}
</style>
@endsection
