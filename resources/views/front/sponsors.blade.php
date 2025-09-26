@extends('front.layout.master')

@section('title', 'Sponsors | SingleEvent')
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
                            <a class="smooth-scroll nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('front.speakers') }}">Speakers</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ url('/schedule') }}">Schedule</a>
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
                                <a class="dropdown-item" href="{{ url('/organizers') }}">Organizers</a>
                                <a class="dropdown-item" href="{{ url('/accommodations') }}">Accommodations</a>
                                <a class="dropdown-item" href="{{ url('/photo-gallery') }}">Photo Gallery</a>
                                <a class="dropdown-item" href="{{ url('/video-gallery') }}">Video Gallery</a>
                                <a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
                                <a class="dropdown-item" href="{{ url('/testimonials') }}">Testimonials</a>
                            </div>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>
                        <li class="member-login-button">
                            <div class="inner">
                                <a class="smooth-scroll nav-link" href="{{ url('/login') }}">
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
                    <h2>Sponsors</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Sponsors</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="sponsorsectionList" class="pt_50 pb_50 white">
    <div class="container">
        @foreach($sponsor_categories as $category)
            @if($category->sponsors->count() > 0)
                <div class="row">
                    <div class="col-sm-1 col-lg-2"></div>
                    <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                        <h2 class="title-1 mb_10"><span class="color_red">{{ $category->name }} Sponsors</span></h2>
                        <p class="heading-space">
                            All the {{ strtolower($category->name) }} sponsors of the event are listed here. If you are interested in becoming a {{ strtolower($category->name) }} sponsor, please contact us.
                        </p>
                    </div>
                    <div class="col-sm-1 col-lg-2"></div>
                </div>

                <div class="row pt_40 mb_50">
                    @foreach($category->sponsors as $sponsor)
                        <div class="col-md-3">
                            <div class="sponsors-logo">
                                <a href="{{ route('front.sponsor.detail', $sponsor->slug) }}">
                                    @if($sponsor->logo)
                                        <img src="{{ asset('uploads/' . $sponsor->logo) }}" class="img-responsive" alt="{{ $sponsor->name }}" style="max-height: 120px; width: auto;">
                                    @else
                                        <div style="background: #f8f9fa; padding: 40px; text-align: center; border: 1px solid #dee2e6;">
                                            <h6>{{ $sponsor->name }}</h6>
                                        </div>
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach

        @if($sponsor_categories->sum(function($category) { return $category->sponsors->count(); }) == 0)
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>No sponsors available at the moment.</h3>
                    <p>Please check back later for updates.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
