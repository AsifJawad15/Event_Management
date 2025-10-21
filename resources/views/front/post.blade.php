@extends('front.layout.master')

@section('title', '{{ $post->title }} | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.post-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.post-hero h1 {
    font-size: 48px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    margin-bottom: 20px;
    line-height: 1.3;
}

.post-content-section {
    padding: 80px 0;
}

.post-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 0;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    overflow: hidden;
}

.post-featured-img {
    position: relative;
    overflow: hidden;
    width: 100%;
    max-height: 500px;
}

.post-featured-img img {
    width: 100%;
    height: auto;
    display: block;
}

.post-meta {
    background: rgba(102, 126, 234, 0.1);
    padding: 20px 40px;
    border-bottom: 1px solid rgba(102, 126, 234, 0.2);
}

.post-meta-info {
    display: flex;
    align-items: center;
    gap: 10px;
    color: rgba(224, 224, 224, 0.9);
    font-size: 16px;
}

.post-meta-info i {
    color: #667eea;
    font-size: 18px;
}

.post-meta-info span {
    font-weight: 600;
    color: #667eea;
    margin-right: 5px;
}

.post-content {
    padding: 40px;
}

.post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6 {
    color: #fff;
    margin-top: 30px;
    margin-bottom: 15px;
    font-weight: 700;
}

.post-content h2 {
    font-size: 32px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.post-content h3 {
    font-size: 26px;
    color: #fff;
}

.post-content p {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.9;
    margin-bottom: 20px;
    font-size: 17px;
}

.post-content ul, .post-content ol {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.9;
    margin-bottom: 20px;
    padding-left: 30px;
}

.post-content ul li, .post-content ol li {
    margin-bottom: 10px;
}

.post-content a {
    color: #667eea;
    transition: all 0.3s ease;
}

.post-content a:hover {
    color: #764ba2;
    text-decoration: underline;
}

.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 20px 0;
    box-shadow: 0 5px 20px rgba(0,0,0,0.3);
}

.post-content blockquote {
    background: rgba(102, 126, 234, 0.1);
    border-left: 4px solid #667eea;
    padding: 20px 30px;
    margin: 30px 0;
    border-radius: 0 10px 10px 0;
    font-style: italic;
    color: rgba(224, 224, 224, 0.9);
}

.post-content code {
    background: rgba(102, 126, 234, 0.2);
    color: #667eea;
    padding: 3px 8px;
    border-radius: 5px;
    font-family: 'Courier New', monospace;
}

.post-content pre {
    background: rgba(26, 31, 58, 0.9);
    border: 1px solid rgba(102, 126, 234, 0.3);
    border-radius: 10px;
    padding: 20px;
    overflow-x: auto;
    margin: 20px 0;
}

.post-content pre code {
    background: transparent;
    padding: 0;
    color: rgba(224, 224, 224, 0.9);
}

.post-content table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 20px 0;
    overflow: hidden;
    border-radius: 10px;
}

.post-content table th {
    background: rgba(102, 126, 234, 0.3);
    color: #fff;
    padding: 15px;
    font-weight: 600;
    text-align: left;
}

.post-content table td {
    background: rgba(26, 31, 58, 0.6);
    color: rgba(224, 224, 224, 0.9);
    padding: 15px;
    border-top: 1px solid rgba(102, 126, 234, 0.2);
}

.back-to-blog {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    transition: all 0.3s ease;
    margin-top: 30px;
}

.back-to-blog:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
    color: #fff;
    text-decoration: none;
}

@media (max-width: 991px) {
    .post-hero h1 {
        font-size: 32px;
    }

    .post-content {
        padding: 30px 20px;
    }

    .post-meta {
        padding: 15px 20px;
    }
}
</style>

<div class="post-hero">
    <div class="container">
        <h1 class="animate-on-scroll">{{ $post->title }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center" style="background: transparent;">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}" style="color: rgba(255,255,255,0.8);">Home</a></li>
                <li class="breadcrumb-item active" style="color: #fff;">Post</li>
            </ol>
        </nav>
    </div>
</div>

<div class="post-content-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="post-card animate-on-scroll">
                    <div class="post-featured-img">
                        <img src="{{ asset('uploads/'.$post->photo) }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post-meta">
                        <div class="post-meta-info">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Posted On:</span> {{ $post->created_at->format('F d, Y') }}
                        </div>
                    </div>

                    <div class="post-content">
                        {!! $post->description !!}

                        <a href="{{ route('front.home') }}" class="back-to-blog">
                            <i class="fas fa-arrow-left"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
