@extends('front.layout.master')

@section('title', 'Contact | SingleEvent')

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
                            <a class="smooth-scroll nav-link" href="{{ url('/speakers') }}">Speakers</a>
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

<div class="common-banner" style="background-image: url('{{ asset('dist-front/images/banner.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Contact</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contacts" class="pt_70 pb_50 white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form" method="post" action="{{ route('contact.submit') }}">>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input name="name" class="form-control" placeholder="Name" type="text" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input name="email" class="form-control" placeholder="Email" type="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input name="subject" class="form-control" placeholder="Subject" type="text" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <textarea rows="3" name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="actions">
                                    <input value="Send Message" name="submit" class="btn btn-lg btn-con-bg" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info">
                    <div class="contact-inner-box">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Address: <br><span>43, Park Street, NYC, USA</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact-inner-box">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Email: <br><span>contact@example.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact-inner-box">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Phone: <br><span>234-423-1266</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
