@extends('front.layout.master')

@section('title', 'Blog | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.blog-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.blog-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.blog-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    height: 100%;
    margin-bottom: 30px;
}

.blog-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.blog-image {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.blog-card:hover .blog-image img {
    transform: scale(1.15);
}

.blog-content {
    padding: 30px;
    text-align: left;
}

.blog-content h4 {
    font-size: 22px;
    margin-bottom: 15px;
}

.blog-content h4 a {
    color: #fff;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    display: block;
}

.blog-content h4 a:hover {
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blog-content p {
    color: rgba(224, 224, 224, 0.8);
    line-height: 1.7;
    margin-bottom: 20px;
}

.read-more {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #667eea;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: #764ba2;
    gap: 12px;
    text-decoration: none;
}

.pagination-container {
    margin-top: 50px;
    display: flex;
    justify-content: center;
}

.pagination-container .pagination {
    display: flex;
    gap: 10px;
    list-style: none;
    padding: 0;
}

.pagination-container .pagination li {
    display: inline-block;
}

.pagination-container .pagination li a,
.pagination-container .pagination li span {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    background: rgba(26, 31, 58, 0.8);
    border: 1px solid rgba(102, 126, 234, 0.3);
    border-radius: 10px;
    color: rgba(224, 224, 224, 0.9);
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
}

.pagination-container .pagination li a:hover,
.pagination-container .pagination li.active span {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    border-color: transparent;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.pagination-container .pagination li.disabled span {
    opacity: 0.5;
    cursor: not-allowed;
}

@media (max-width: 991px) {
    .blog-hero h1 { font-size: 36px; }
    .blog-image { height: 220px; }
}
</style>

<div class="blog-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Our Blog</h1>
    </div>
</div>

<section id="blog">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Latest Articles</h2>
            <p>Stay updated with our latest news, insights, and event highlights</p>
        </div>

        <div class="row">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card animate-on-scroll">
                        <div class="blog-image">
                            <a href="{{ route('front.post', $post->slug) }}">
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h4><a href="{{ route('front.post', $post->slug) }}">{{ $post->title }}</a></h4>
                            <p>{{ Str::limit($post->short_description, 100) }}</p>
                            <a href="{{ route('front.post', $post->slug) }}" class="read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="dark-card text-center p-5">
                        <i class="fas fa-newspaper" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                        <h3 style="color: #fff;">No Blog Posts Yet</h3>
                        <p style="color: rgba(224, 224, 224, 0.8);">Check back soon for our latest articles and updates.</p>
                    </div>
                </div>
            @endif
        </div>

        @if($posts->hasPages())
        <div class="row">
            <div class="col-md-12">
                <div class="pagination-container animate-on-scroll">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
