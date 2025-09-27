@extends('front.layout.master')

@section('content')
<div class="container main-menu" id="navbar">
    <div class="row">
        <div class="col-lg-2 col-sm-12">
            <a href="{{ route('front.home') }}" id="logo" class="grid_2"> <img src="{{ asset('dist-front/images/logo.png') }}"> </a>
        </div>
        <div class="col-lg-10 col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="navContent" class="navbar-nav mr-auto navigation">
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.speakers') }}">Speakers</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.schedule') }}">Schedule</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ url('/pricing') }}">Pricing</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ url('/blog') }}">Blog</a>
                        </li>
                        <li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
                            <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('front.sponsors') }}">Sponsors</a>
                                <a class="dropdown-item" href="{{ route('front.organisers') }}">Organisers</a>
                                <a class="dropdown-item" href="{{ route('front.accommodations') }}">Accommodations</a>
                                <a class="dropdown-item" href="{{ route('front.photo_gallery') }}">Photo Gallery</a>
                                <a class="dropdown-item" href="{{ url('/video-gallery') }}">Video Gallery</a>
                                <a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
                                <a class="dropdown-item" href="{{ url('/testimonials') }}">Testimonials</a>
                            </div>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                        <li class="member-login-button">
                            <div class="inner">
                                <a class="smooth-scroll nav-link" href="{{ route('login') }}">
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

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">ends('front.layout.master')

@section('content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Photo Gallery</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Photo Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="gallery-section" class="pt_50 pb_50 gray projects">
    <div class="container">
        <div class="row gallery_item">
            @foreach($photos as $photo)
            <div class="col-lg-4 col-sm-6 col-xs-12 main-gallery">
                <div class="project-single">
                    <div class="project-inner">
                        <div class="project-head">
                            <img src="{{ asset('uploads/'.$photo->photo) }}" alt="{{ $photo->caption }}">
                        </div>
                        <div class="project-bottom">
                            <h4>{{ $photo->caption }}</h4>
                        </div>
                        <div class="button">
                            <a class="gallery_img btn" href="{{ asset('uploads/'.$photo->photo) }}">
                                <i class="fa fa-picture-o"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($photos->hasPages())
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    {{ $photos->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
