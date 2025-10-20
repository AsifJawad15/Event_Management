@extends('front.layout.master')

@section('title', 'Organisers | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.organisers-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.organisers-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.organiser-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    margin-bottom: 30px;
}

.organiser-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.organiser-image {
    position: relative;
    overflow: hidden;
    height: 320px;
}

.organiser-image a {
    display: block;
    width: 100%;
    height: 100%;
}

.organiser-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.organiser-card:hover .organiser-image img {
    transform: scale(1.15);
}

.organiser-placeholder {
    width: 100%;
    height: 100%;
    background: rgba(102, 126, 234, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.organiser-placeholder i {
    font-size: 60px;
    color: rgba(102, 126, 234, 0.5);
    margin-bottom: 15px;
}

.organiser-info {
    padding: 25px;
    text-align: center;
}

.organiser-info h6 {
    font-size: 20px;
    margin-bottom: 10px;
}

.organiser-info h6 a {
    color: #fff;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
}

.organiser-info h6 a:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.organiser-info p {
    color: rgba(224, 224, 224, 0.8);
    font-size: 15px;
    margin: 0;
}

@media (max-width: 991px) {
    .organisers-hero h1 { font-size: 36px; }
    .organiser-image { height: 280px; }
}
</style>

<div class="organisers-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Event Organisers</h1>
    </div>
</div>

<section id="organisers">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Meet Our Team</h2>
            <p>The dedicated people behind this amazing event</p>
        </div>

        <div class="row">
            @forelse($organisers as $organiser)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="organiser-card animate-on-scroll">
                    <div class="organiser-image">
                        <a href="{{ route('front.organiser.detail', $organiser->slug) }}">
                            @if($organiser->photo)
                                <img src="{{ asset('uploads/' . $organiser->photo) }}" alt="{{ $organiser->name }}">
                            @else
                                <div class="organiser-placeholder">
                                    <i class="fas fa-user"></i>
                                    <span style="color: rgba(224, 224, 224, 0.7);">No Photo</span>
                                </div>
                            @endif
                        </a>
                    </div>
                    <div class="organiser-info">
                        <h6><a href="{{ route('front.organiser.detail', $organiser->slug) }}">{{ $organiser->name }}</a></h6>
                        <p>{{ $organiser->designation }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="dark-card text-center p-5">
                    <i class="fas fa-users" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                    <h3 style="color: #fff;">No Organisers Found</h3>
                    <p style="color: rgba(224, 224, 224, 0.8);">Please check back later for updates.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
