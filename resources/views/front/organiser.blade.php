@extends('front.layout.master')

@section('title', $organiser->name . ' | SingleEvent')
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
                                <a class="dropdown-item" href="{{ route('front.organisers') }}">Organisers</a>
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
                    <h2>{{ $organiser->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.organisers') }}">Organisers</a></li>
                            <li class="breadcrumb-item active">{{ $organiser->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="speakers" class="pt_70 pb_70 white team speakers-item">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="speaker-detail-img">
                    @if($organiser->photo)
                        <img src="{{ asset('uploads/' . $organiser->photo) }}" alt="{{ $organiser->name }}" style="width: 100%; height: auto;">
                    @else
                        <div style="background: #f8f9fa; padding: 60px; text-align: center; border: 1px solid #dee2e6;">
                            <i class="fas fa-user" style="font-size: 60px; color: #6c757d;"></i>
                            <h4 class="mt-3">{{ $organiser->name }}</h4>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2>{{ $organiser->name }}</h2>
                    <h4 class="mb_20">{{ $organiser->designation }}</h4>

                    @if($organiser->biography)
                        {!! nl2br(e($organiser->biography)) !!}
                    @endif

                    <h4>More Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if($organiser->address)
                            <tr>
                                <th><b>Address:</b></th>
                                <td>{{ $organiser->address }}</td>
                            </tr>
                            @endif
                            @if($organiser->email)
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $organiser->email }}</td>
                            </tr>
                            @endif
                            @if($organiser->phone)
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $organiser->phone }}</td>
                            </tr>
                            @endif
                            @if($organiser->facebook || $organiser->twitter || $organiser->linkedin || $organiser->instagram)
                            <tr>
                                <th><b>Social:</b></th>
                                <td>
                                    <ul class="social-icon">
                                        @if($organiser->facebook)
                                        <li>
                                            <a href="{{ $organiser->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if($organiser->twitter)
                                        <li>
                                            <a href="{{ $organiser->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($organiser->linkedin)
                                        <li>
                                            <a href="{{ $organiser->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if($organiser->instagram)
                                        <li>
                                            <a href="{{ $organiser->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
