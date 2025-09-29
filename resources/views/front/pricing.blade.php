@extends('front.layout.app')

@section('main_content')
<div class="page-banner" style="background-image: url('{{ asset('dist-front/images/banner.jpg') }}')">
    <div class="bg-page"></div>
    <div class="text">
        <h1>Pricing</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pricing</li>
            </ol>
        </nav>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            @if($packages->count() > 0)
                @foreach($packages as $package)
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h2>{{ $package->name }}</h2>
                            <h1>${{ number_format($package->price, 2) }}</h1>
                        </div>
                        <div class="pricing-body">
                            <ul>
                                @if($package->facilities->count() > 0)
                                    @foreach($package->facilities as $facility)
                                    <li><i class="fas fa-check-circle"></i> {{ $facility->name }}</li>
                                    @endforeach
                                @else
                                    <li><i class="fas fa-check-circle"></i> Basic Package Features</li>
                                @endif
                                
                                @if($package->maximum_tickets)
                                    <li><i class="fas fa-info-circle"></i> Maximum {{ $package->maximum_tickets }} tickets</li>
                                @else
                                    <li><i class="fas fa-infinity"></i> Unlimited tickets available</li>
                                @endif
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="btn btn-primary">Buy Ticket</a>
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
</div>

<style>
.pricing-item {
    background: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 30px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.pricing-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.pricing-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    text-align: center;
    padding: 40px 30px;
}

.pricing-header h2 {
    font-size: 24px;
    margin-bottom: 10px;
    font-weight: 600;
}

.pricing-header h1 {
    font-size: 48px;
    margin: 0;
    font-weight: 700;
}

.pricing-body {
    padding: 30px;
}

.pricing-body ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pricing-body ul li {
    padding: 12px 0;
    border-bottom: 1px solid #f5f5f5;
    font-size: 16px;
    display: flex;
    align-items: center;
}

.pricing-body ul li:last-child {
    border-bottom: none;
}

.pricing-body ul li i {
    margin-right: 12px;
    color: #28a745;
    font-size: 18px;
}

.pricing-body ul li i.fa-info-circle {
    color: #17a2b8;
}

.pricing-body ul li i.fa-infinity {
    color: #6c757d;
}

.pricing-footer {
    padding: 30px;
    text-align: center;
    background: #f8f9fa;
}

.pricing-footer .btn {
    padding: 12px 40px;
    font-size: 16px;
    font-weight: 600;
    border-radius: 25px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.pricing-footer .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* Featured package style (optional - can be added via admin) */
.pricing-item.featured {
    border: 2px solid #667eea;
    transform: scale(1.05);
}

.pricing-item.featured .pricing-header {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .pricing-item {
        margin-bottom: 20px;
    }
    
    .pricing-header h1 {
        font-size: 36px;
    }
    
    .pricing-header,
    .pricing-body,
    .pricing-footer {
        padding: 20px;
    }
}
</style>
@endsection