@extends('front.layout.master')

@section('title', 'Speakers | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
/* Speakers Page Dark Theme */
.speakers-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%),
                url({{ asset('dist-front/images/banner.jpg') }}) center/cover;
    padding: 120px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.speakers-hero::before {
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

.speakers-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    animation: fadeInUp 0.8s ease;
}

.speakers-hero .breadcrumb {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 12px 24px;
    border-radius: 50px;
    display: inline-flex;
    animation: fadeInUp 1s ease;
}

.speakers-hero .breadcrumb-item {
    color: rgba(255, 255, 255, 0.8);
}

.speakers-hero .breadcrumb-item a {
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.speakers-hero .breadcrumb-item a:hover {
    text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
}

.speakers-hero .breadcrumb-item.active {
    color: #fff;
}

.speakers-hero .breadcrumb-item + .breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.6);
}

/* Speaker Card */
.speaker-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 0;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    margin-bottom: 30px;
    position: relative;
}

.speaker-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.2) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.speaker-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.speaker-card:hover::before {
    opacity: 1;
}

.speaker-img {
    position: relative;
    overflow: hidden;
    border-radius: 20px 20px 0 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.3) 0%, rgba(118, 75, 162, 0.3) 100%);
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.speaker-img img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: all 0.5s ease;
    background-color: #1a1f3a;
    min-width: 100%;
    max-width: 100%;
}

.speaker-img a {
    display: block;
    width: 100%;
    height: 100%;
}

.speaker-card:hover .speaker-img img {
    transform: scale(1.1);
}

.speaker-img::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    background: linear-gradient(to top, rgba(26, 31, 58, 0.9), transparent);
}

.speaker-info {
    padding: 25px;
    text-align: center;
    position: relative;
    z-index: 1;
}

.speaker-info h6 {
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 8px;
}

.speaker-info h6 a {
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.speaker-info h6 a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.speaker-info p {
    color: rgba(224, 224, 224, 0.8);
    font-size: 15px;
    margin: 0;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 80px 20px;
}

.empty-state i {
    font-size: 80px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: #fff;
    margin-bottom: 15px;
}

.empty-state p {
    color: rgba(224, 224, 224, 0.7);
    font-size: 18px;
}

/* Responsive */
@media (max-width: 767px) {
    .speakers-hero h1 {
        font-size: 36px;
    }

    .speaker-img img {
        height: 250px;
    }
}
</style>

<div class="speakers-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Our Speakers</h1>
        <nav aria-label="breadcrumb" class="animate-on-scroll">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active">Speakers</li>
            </ol>
        </nav>
    </div>
</div>

<section id="speakers">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Meet Our Expert Speakers</h2>
            <p>Industry leaders and innovators sharing their knowledge and experience</p>
        </div>

        <div class="row">
            @if($speakers && $speakers->count() > 0)
                @foreach($speakers as $speaker)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 animate-on-scroll">
                    <div class="speaker-card">
                        <div class="speaker-img">
                            <a href="{{ route('front.speaker', $speaker->slug) }}">
                                @if($speaker->photo && file_exists(public_path('uploads/'.$speaker->photo)))
                                    <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}" onerror="this.src='{{ asset('uploads/default-speaker.jpg') }}'">
                                @else
                                    <img src="{{ asset('dist-front/images/default-speaker.jpg') }}" alt="{{ $speaker->name }}">
                                @endif
                            </a>
                        </div>
                        <div class="speaker-info">
                            <h6><a href="{{ route('front.speaker', $speaker->slug) }}">{{ $speaker->name }}</a></h6>
                            <p>{{ $speaker->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="empty-state animate-on-scroll">
                        <i class="fas fa-users"></i>
                        <h3>No Speakers Yet</h3>
                        <p>Stay tuned! We're working on bringing amazing speakers to our event.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
