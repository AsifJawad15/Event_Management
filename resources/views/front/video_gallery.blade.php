@extends('front.layout.master')

@section('title', 'Video Gallery | SingleEvent')

@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.video-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.video-hero::before {
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

.video-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.video-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    margin-bottom: 30px;
}

.video-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.video-thumbnail {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.video-card:hover .video-thumbnail img {
    transform: scale(1.1);
}

.video-play-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.video-card:hover .video-play-overlay {
    background: rgba(102, 126, 234, 0.8);
}

.play-button {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 28px;
    transition: all 0.3s ease;
    border: 3px solid rgba(255, 255, 255, 0.5);
    text-decoration: none;
}

.video-card:hover .play-button {
    transform: scale(1.2);
    background: rgba(255, 255, 255, 0.3);
}

.video-info {
    padding: 20px;
}

.video-info h4 {
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}

@media (max-width: 991px) {
    .video-hero h1 { font-size: 36px; }
    .video-thumbnail { height: 220px; }
}
</style>

<div class="video-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Video Gallery</h1>
    </div>
</div>

<section id="videos">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Event Highlights</h2>
            <p>Watch highlights and memorable moments from our events</p>
        </div>

        <div class="row">
            @if($videos->count() > 0)
                @foreach($videos as $video)
                <div class="col-lg-4 col-md-6">
                    <div class="video-card animate-on-scroll">
                        <div class="video-thumbnail">
                            <img src="{{ $video->thumbnail_url }}" alt="{{ $video->caption }}">
                            <div class="video-play-overlay">
                                <a class="play-button" href="{{ $video->watch_url }}" target="_blank">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="video-info">
                            <h4>{{ $video->caption }}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="dark-card text-center p-5">
                        <i class="fas fa-video" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                        <h3 style="color: #fff;">No Videos Yet</h3>
                        <p style="color: rgba(224, 224, 224, 0.8);">Check back later for exciting video content!</p>
                    </div>
                </div>
            @endif
        </div>

        @if($videos->hasPages())
        <div class="row">
            <div class="col-12">
                <div class="pagination-container animate-on-scroll">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
