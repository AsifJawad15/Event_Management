@extends('front.layout.master')

@section('title', 'Blog | SingleEvent')
@section('content')
<div class="container main-menu" id="navbar">
    <div class="row">
        <div class="col-lg-2 col-sm-12">
            <a href="{{ url('/') }}" id="logo" class="grid_2"> <img src="{{ asset('dist-front/images/logo.png') }}"> </a>
        </div>
        <div class="col-lg-10 col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="navContent" class="navbar-nav mr-auto navigation">
                        <li>
                            <a class="nav-link" href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('front.speakers') }}">Speakers</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ url('/schedule') }}">Schedule</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ url('/pricing') }}">Pricing</a>
                        </li>
                        <li>
                            <a class="nav-link active" href="{{ route('front.blog') }}">Blog</a>
                        </li>
                        <li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
                            <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('front.sponsors') }}">Sponsors</a>
                                <a class="dropdown-item" href="{{ route('front.organisers') }}">Organisers</a>
                                <a class="dropdown-item" href="{{ route('front.accommodations') }}">Accommodations</a>
                                <a class="dropdown-item" href="{{ url('/photo-gallery') }}">Photo Gallery</a>
                                <a class="dropdown-item" href="{{ url('/video-gallery') }}">Video Gallery</a>
                                <a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
                                <a class="dropdown-item" href="{{ route('front.testimonials') }}">Testimonials</a>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                        <li class="member-login-button">
                            <div class="inner">
                                <a class="nav-link" href="{{ url('/login') }}">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Blog</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="blog-section" class="pt_50 pb_50 white blog-section">
    <div class="container">
        <div class="row pt_40">
            @foreach($posts as $post)
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="{{ route('front.post', $post->slug) }}">
                            <img src="{{ asset('uploads/'.$post->photo) }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="{{ route('front.post', $post->slug) }}">{{ $post->title }}</a></h4>
                        <p>
                            {{ $post->short_description }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if($posts->hasPages())
        <div class="row">
            <div class="col-md-12">
                <div class="pagination-container">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection