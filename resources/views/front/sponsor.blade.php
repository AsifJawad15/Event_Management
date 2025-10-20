@extends('front.layout.master')

@section('title', $sponsor->name . ' | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.sponsor-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.sponsor-hero h1 {
    font-size: 48px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    margin-bottom: 20px;
}

.sponsor-detail-section {
    padding: 80px 0;
}

.sponsor-logo-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.sponsor-logo-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
}

.sponsor-logo-card img {
    width: 100%;
    max-width: 350px;
    border-radius: 15px;
    transition: all 0.5s ease;
}

.sponsor-logo-card:hover img {
    transform: scale(1.05);
}

.sponsor-placeholder {
    background: rgba(102, 126, 234, 0.1);
    padding: 60px;
    text-align: center;
    border-radius: 15px;
    border: 2px dashed rgba(102, 126, 234, 0.3);
}

.sponsor-placeholder h4 {
    color: #fff;
    font-size: 24px;
}

.sponsor-info-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
}

.sponsor-info-card h2 {
    font-size: 36px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
}

.sponsor-tagline {
    font-size: 18px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
    font-weight: 600;
}

.sponsor-description {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.8;
    margin-bottom: 35px;
    font-size: 16px;
}

.category-badge {
    display: inline-block;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 30px;
}

.info-table {
    margin-top: 30px;
}

.info-table h4 {
    font-size: 24px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.info-table h4::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.info-table table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

.info-table th {
    color: #667eea;
    font-weight: 600;
    padding: 15px 20px;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 10px 0 0 10px;
    width: 150px;
    vertical-align: top;
}

.info-table td {
    color: rgba(224, 224, 224, 0.9);
    padding: 15px 20px;
    background: rgba(26, 31, 58, 0.6);
    border-radius: 0 10px 10px 0;
}

.info-table a {
    color: #667eea;
    transition: all 0.3s ease;
}

.info-table a:hover {
    color: #764ba2;
    text-decoration: none;
}

.social-links {
    display: flex;
    gap: 15px;
    list-style: none;
    padding: 0;
    margin: 0;
    flex-wrap: wrap;
}

.social-links li a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    background: rgba(102, 126, 234, 0.2);
    border-radius: 50%;
    color: #667eea;
    transition: all 0.3s ease;
    border: 1px solid rgba(102, 126, 234, 0.3);
    font-size: 18px;
}

.social-links li a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.map-container {
    margin-top: 10px;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid rgba(102, 126, 234, 0.3);
}

.map-container iframe {
    width: 100%;
    height: 400px;
    border: none;
}

@media (max-width: 991px) {
    .sponsor-hero h1 { font-size: 32px; }
    .sponsor-info-card h2 { font-size: 28px; }
    .info-table th { width: 120px; font-size: 14px; }
}
</style>

<div class="sponsor-hero">
    <div class="container">
        <h1 class="animate-on-scroll">{{ $sponsor->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center" style="background: transparent;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: rgba(255,255,255,0.8);">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('front.sponsors') }}" style="color: rgba(255,255,255,0.8);">Sponsors</a></li>
                <li class="breadcrumb-item active" style="color: #fff;">{{ $sponsor->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="sponsor-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="sponsor-logo-card animate-on-scroll">
                    @if($sponsor->featured_photo)
                        <img src="{{ asset('uploads/' . $sponsor->featured_photo) }}" alt="{{ $sponsor->name }}">
                    @elseif($sponsor->logo)
                        <img src="{{ asset('uploads/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}">
                    @else
                        <div class="sponsor-placeholder">
                            <h4>{{ $sponsor->name }}</h4>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="sponsor-info-card animate-on-scroll">
                    <h2>{{ $sponsor->name }}</h2>

                    @if($sponsor->sponsorCategory)
                        <span class="category-badge">
                            <i class="fas fa-tag"></i> {{ $sponsor->sponsorCategory->name }}
                        </span>
                    @endif

                    @if($sponsor->tagline)
                        <p class="sponsor-tagline">{{ $sponsor->tagline }}</p>
                    @endif

                    @if($sponsor->description)
                        <p class="sponsor-description">{{ $sponsor->description }}</p>
                    @endif

                    <div class="info-table">
                        <h4>Contact Information</h4>
                        <table>
                            @if($sponsor->address)
                            <tr>
                                <th><i class="fas fa-map-marker-alt"></i> Address:</th>
                                <td>{{ $sponsor->address }}</td>
                            </tr>
                            @endif
                            @if($sponsor->email)
                            <tr>
                                <th><i class="fas fa-envelope"></i> Email:</th>
                                <td><a href="mailto:{{ $sponsor->email }}">{{ $sponsor->email }}</a></td>
                            </tr>
                            @endif
                            @if($sponsor->phone)
                            <tr>
                                <th><i class="fas fa-phone"></i> Phone:</th>
                                <td>{{ $sponsor->phone }}</td>
                            </tr>
                            @endif
                            @if($sponsor->website)
                            <tr>
                                <th><i class="fas fa-globe"></i> Website:</th>
                                <td>
                                    <a href="{{ $sponsor->website }}" target="_blank">{{ $sponsor->website }}</a>
                                </td>
                            </tr>
                            @endif
                            @if($sponsor->facebook || $sponsor->twitter || $sponsor->linkedin || $sponsor->instagram)
                            <tr>
                                <th><i class="fas fa-share-alt"></i> Social:</th>
                                <td>
                                    <ul class="social-links">
                                        @if($sponsor->facebook)
                                        <li>
                                            <a href="{{ $sponsor->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif
                                        @if($sponsor->twitter)
                                        <li>
                                            <a href="{{ $sponsor->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($sponsor->linkedin)
                                        <li>
                                            <a href="{{ $sponsor->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        @endif
                                        @if($sponsor->instagram)
                                        <li>
                                            <a href="{{ $sponsor->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>

                    @if($sponsor->map_iframe)
                    <div class="info-table">
                        <h4>Location Map</h4>
                        <div class="map-container">
                            {!! $sponsor->map_iframe !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
