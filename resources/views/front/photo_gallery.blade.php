@extends('front.layout.master')

@section('title', 'Photo Gallery | SingleEvent')

@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.gallery-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.gallery-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    margin-bottom: 30px;
}

.gallery-image {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    height: 300px;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
    filter: brightness(0.9);
}

.gallery-item:hover .gallery-image img {
    transform: scale(1.2);
    filter: brightness(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    opacity: 0;
    transition: all 0.4s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    transform: scale(0);
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.gallery-item:hover .gallery-icon {
    transform: scale(1);
}

.gallery-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 20px;
    background: rgba(26, 31, 58, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 0 0 20px 20px;
    transform: translateY(100%);
    transition: all 0.4s ease;
}

.gallery-item:hover .gallery-caption {
    transform: translateY(0);
}

.gallery-caption h4 {
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    margin: 0;
}

@media (max-width: 991px) {
    .gallery-hero h1 { font-size: 36px; }
    .gallery-image { height: 250px; }
}
</style>

<div class="gallery-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Photo Gallery</h1>
    </div>
</div>

<section id="gallery">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Event Memories</h2>
            <p>Browse through our collection of amazing moments captured during the event</p>
        </div>

        <div class="row">
            @if($photos->count() > 0)
                @foreach($photos as $photo)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item animate-on-scroll">
                        <div class="gallery-image">
                            <img src="{{ asset('uploads/'.$photo->photo) }}" alt="{{ $photo->caption }}">
                            <div class="gallery-overlay">
                                <a class="gallery_img gallery-icon" href="{{ asset('uploads/'.$photo->photo) }}">
                                    <i class="fas fa-search-plus"></i>
                                </a>
                            </div>
                            <div class="gallery-caption">
                                <h4>{{ $photo->caption }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="dark-card text-center p-5">
                        <i class="fas fa-images" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                        <h3 style="color: #fff;">No Photos Yet</h3>
                        <p style="color: rgba(224, 224, 224, 0.8);">Check back soon for event photos.</p>
                    </div>
                </div>
            @endif
        </div>

        @if($photos->hasPages())
        <div class="row">
            <div class="col-12">
                <div class="pagination-container animate-on-scroll">
                    {{ $photos->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
