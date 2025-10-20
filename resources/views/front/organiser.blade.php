@extends('front.layout.master')

@section('title', $organiser->name . ' | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.organiser-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.organiser-hero h1 {
    font-size: 48px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    margin-bottom: 20px;
}

.organiser-detail-section {
    padding: 80px 0;
}

.organiser-profile-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    height: 100%;
}

.organiser-profile-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
}

.organiser-profile-img {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    margin-bottom: 20px;
}

.organiser-profile-img img {
    width: 100%;
    border-radius: 15px;
    transition: all 0.5s ease;
}

.organiser-profile-card:hover .organiser-profile-img img {
    transform: scale(1.1);
}

.organiser-placeholder {
    background: rgba(102, 126, 234, 0.1);
    padding: 60px;
    text-align: center;
    border-radius: 15px;
    border: 2px dashed rgba(102, 126, 234, 0.3);
}

.organiser-placeholder i {
    font-size: 60px;
    color: rgba(102, 126, 234, 0.5);
    margin-bottom: 20px;
}

.organiser-placeholder h4 {
    color: #fff;
    font-size: 20px;
}

.organiser-info-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
}

.organiser-info-card h2 {
    font-size: 36px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
}

.organiser-info-card h4 {
    font-size: 20px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
    font-weight: 600;
}

.organiser-bio {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.8;
    margin-bottom: 35px;
    font-size: 16px;
}

.info-section {
    margin-top: 30px;
}

.info-section-title {
    font-size: 24px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.info-section-title::after {
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

@media (max-width: 991px) {
    .organiser-hero h1 { font-size: 32px; }
    .organiser-info-card h2 { font-size: 28px; }
    .info-table th { width: 120px; font-size: 14px; }
}
</style>

<div class="organiser-hero">
    <div class="container">
        <h1 class="animate-on-scroll">{{ $organiser->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center" style="background: transparent;">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color: rgba(255,255,255,0.8);">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('front.organisers') }}" style="color: rgba(255,255,255,0.8);">Organisers</a></li>
                <li class="breadcrumb-item active" style="color: #fff;">{{ $organiser->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="organiser-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="organiser-profile-card animate-on-scroll">
                    <div class="organiser-profile-img">
                        @if($organiser->photo)
                            <img src="{{ asset('uploads/' . $organiser->photo) }}" alt="{{ $organiser->name }}">
                        @else
                            <div class="organiser-placeholder">
                                <i class="fas fa-user"></i>
                                <h4>{{ $organiser->name }}</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="organiser-info-card animate-on-scroll">
                    <h2>{{ $organiser->name }}</h2>
                    <h4>{{ $organiser->designation }}</h4>

                    @if($organiser->biography)
                        <div class="organiser-bio">
                            {!! nl2br(e($organiser->biography)) !!}
                        </div>
                    @endif

                    <div class="info-section">
                        <h4 class="info-section-title">Contact Information</h4>
                        <div class="info-table">
                            <table>
                                @if($organiser->address)
                                <tr>
                                    <th><i class="fas fa-map-marker-alt"></i> Address:</th>
                                    <td>{{ $organiser->address }}</td>
                                </tr>
                                @endif
                                @if($organiser->email)
                                <tr>
                                    <th><i class="fas fa-envelope"></i> Email:</th>
                                    <td><a href="mailto:{{ $organiser->email }}">{{ $organiser->email }}</a></td>
                                </tr>
                                @endif
                                @if($organiser->phone)
                                <tr>
                                    <th><i class="fas fa-phone"></i> Phone:</th>
                                    <td>{{ $organiser->phone }}</td>
                                </tr>
                                @endif
                                @if($organiser->facebook || $organiser->twitter || $organiser->linkedin || $organiser->instagram)
                                <tr>
                                    <th><i class="fas fa-share-alt"></i> Social:</th>
                                    <td>
                                        <ul class="social-links">
                                            @if($organiser->facebook)
                                            <li>
                                                <a href="{{ $organiser->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            @endif
                                            @if($organiser->twitter)
                                            <li>
                                                <a href="{{ $organiser->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            @endif
                                            @if($organiser->linkedin)
                                            <li>
                                                <a href="{{ $organiser->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            @endif
                                            @if($organiser->instagram)
                                            <li>
                                                <a href="{{ $organiser->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
