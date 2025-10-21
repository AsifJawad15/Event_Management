@extends('front.layout.master')

@section('title', 'Sponsors | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.sponsors-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.sponsors-hero::before {
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

.sponsors-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.sponsor-category-section {
    padding: 60px 0;
}

.category-header {
    text-align: center;
    margin-bottom: 50px;
}

.category-title {
    font-size: 36px;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 15px;
}

.category-description {
    color: rgba(224, 224, 224, 0.8);
    font-size: 16px;
    line-height: 1.6;
}

.sponsor-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 30px;
}

.sponsor-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.sponsor-card a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    text-decoration: none;
}

.sponsor-card img {
    max-width: 100%;
    max-height: 120px;
    width: auto;
    height: auto;
    transition: all 0.4s ease;
    filter: brightness(0.9);
}

.sponsor-card:hover img {
    filter: brightness(1.1);
    transform: scale(1.05);
}

.sponsor-placeholder {
    background: rgba(102, 126, 234, 0.1);
    padding: 40px;
    text-align: center;
    border-radius: 10px;
    border: 2px dashed rgba(102, 126, 234, 0.3);
}

.sponsor-placeholder h6 {
    color: #fff;
    font-size: 18px;
    font-weight: 600;
}

@media (max-width: 991px) {
    .sponsors-hero h1 { font-size: 36px; }
    .category-title { font-size: 28px; }
    .sponsor-card { height: 150px; padding: 30px; }
}
</style>

<div class="sponsors-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Our Sponsors</h1>
    </div>
</div>

<section id="sponsors">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Thank You to Our Sponsors</h2>
            <p>We are grateful for the support from our amazing sponsors who make this event possible</p>
        </div>

        @foreach($sponsor_categories as $category)
            @if($category->sponsors->count() > 0)
                <div class="sponsor-category-section">
                    <div class="category-header animate-on-scroll">
                        <h3 class="category-title">{{ $category->name }} Sponsors</h3>
                        <p class="category-description">
                            All the {{ strtolower($category->name) }} sponsors of the event are listed here. If you are interested in becoming a {{ strtolower($category->name) }} sponsor, please contact us.
                        </p>
                    </div>

                    <div class="row">
                        @foreach($category->sponsors as $sponsor)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="sponsor-card animate-on-scroll">
                                    <a href="{{ route('front.sponsor.detail', $sponsor->slug) }}">
                                        @if($sponsor->logo)
                                            <img src="{{ asset('uploads/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}">
                                        @else
                                            <div class="sponsor-placeholder">
                                                <h6>{{ $sponsor->name }}</h6>
                                            </div>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        @if($sponsor_categories->sum(function($category) { return $category->sponsors->count(); }) == 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="dark-card text-center p-5">
                        <i class="fas fa-handshake" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                        <h3 style="color: #fff;">No Sponsors Yet</h3>
                        <p style="color: rgba(224, 224, 224, 0.8);">We are looking for amazing sponsors. Please check back later for updates.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
