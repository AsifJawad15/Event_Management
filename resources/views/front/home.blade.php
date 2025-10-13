@extends('front.layout.master')

@section('title', 'Home | SingleEvent')
@section('main_content')

<style>
/* Modern Dynamic Styles */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --card-shadow: 0 10px 40px rgba(0,0,0,0.1);
    --hover-transform: translateY(-10px) scale(1.02);
}

/* Modern Glassmorphism Navigation */
.modern-header {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 32px rgba(0,0,0,0.08);
    position: sticky;
    top: 0;
    z-index: 999;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(255,255,255,0.18);
}

.modern-header.scrolled {
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 12px 40px rgba(0,0,0,0.12);
}

.modern-header .navbar-nav .nav-link {
    position: relative;
    font-weight: 500;
    padding: 8px 16px !important;
    transition: all 0.3s ease;
    color: #333 !important;
}

.modern-header .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.modern-header .navbar-nav .nav-link:hover::after {
    width: 80%;
}

.modern-header .dropdown-menu {
    border: none;
    box-shadow: 0 10px 40px rgba(0,0,0,0.15);
    border-radius: 12px;
    padding: 10px;
    margin-top: 10px;
}

.modern-header .dropdown-item {
    border-radius: 8px;
    padding: 10px 16px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.modern-header .dropdown-item:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    transform: translateX(5px);
}

.modern-header .member-login-button .nav-link {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    border-radius: 25px;
    padding: 10px 24px !important;
    margin-left: 10px;
}

.modern-header .member-login-button .nav-link::after {
    display: none;
}

.modern-header .member-login-button .nav-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
}

/* Enhanced Hero Banner */
.hero-banner-modern {
    position: relative;
    min-height: 700px;
    display: flex;
    align-items: center;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    overflow: hidden;
}

.hero-banner-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.85) 100%);
    z-index: 1;
}

.hero-banner-modern .container {
    position: relative;
    z-index: 2;
}

.hero-content-animated {
    animation: fadeInUp 1s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hero-content-animated h4 {
    font-size: 20px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 20px;
    animation: fadeInUp 1s ease-out 0.2s both;
}

.hero-content-animated h2 {
    font-size: 56px;
    color: #fff;
    font-weight: 700;
    margin-bottom: 25px;
    line-height: 1.2;
    animation: fadeInUp 1s ease-out 0.4s both;
    text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
}

.hero-content-animated > p {
    font-size: 18px;
    color: rgba(255,255,255,0.95);
    margin-bottom: 40px;
    line-height: 1.8;
    animation: fadeInUp 1s ease-out 0.6s both;
}

/* Modern Countdown */
.modern-countdown {
    animation: fadeInUp 1s ease-out 0.8s both;
}

.modern-countdown .count-down-bg {
    gap: 20px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.modern-countdown .single-count {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 30px 20px;
    min-width: 150px;
    transition: all 0.4s ease;
}

.modern-countdown .single-count:hover {
    transform: translateY(-10px) rotate(2deg);
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
}

.modern-countdown .single-count h1 {
    font-size: 48px;
    color: #fff;
    font-weight: 700;
    margin-bottom: 10px;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
}

.modern-countdown .single-count p {
    color: rgba(255,255,255,0.9);
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.banner_btn.video_btn {
    animation: fadeInUp 1s ease-out 1s both;
    background: white;
    color: #667eea;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 16px;
    display: inline-block;
    margin-top: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(255,255,255,0.3);
}

.banner_btn.video_btn:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(255,255,255,0.4);
    background: #f8f9fa;
}
</style>

<!-- Modern Navigation Bar -->
<header class="header modern-header">
    <div class="container main-menu" id="navbar">
        <div class="row">
            <div class="col-lg-2 col-sm-12">
                <a href="{{ route('front.home') }}" id="logo" class="grid_2"> <img src="{{ asset('uploads/'.$setting_data->logo) }}" style="max-width: 200px;"> </a>
            </div>
            <div class="col-lg-10 col-sm-12 menu-area">
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
                            <a class="smooth-scroll nav-link" href="{{ route('front.pricing') }}">Pricing</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.blog') }}">Blog</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                            <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('front.sponsors') }}">Sponsors</a>
                                <a class="dropdown-item" href="{{ route('front.organisers') }}">Organizers</a>
                                <a class="dropdown-item" href="{{ route('front.accommodations') }}">Accommodations</a>
                                <a class="dropdown-item" href="{{ route('front.photo_gallery') }}">Photo Gallery</a>
                                <a class="dropdown-item" href="{{ route('front.video_gallery') }}">Video Gallery</a>
                                <a class="dropdown-item" href="{{ route('front.faq') }}">FAQ</a>
                            </div>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                        <li class="member-login-button">
                            <div class="inner">
                                @if(Auth::guard('web')->check())
                                <a class="smooth-scroll nav-link" href="{{ route('user.dashboard') }}">
                                    <i class="fa fa-user"></i> Dashboard
                                </a>
                                @else
                                <a class="smooth-scroll nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    </div>
</header>

<div class="container-fluid hero-banner-modern" style="background-image: url('{{ asset($home_banner->background) }}');">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="hero-content-animated text-center">
					<h4>{{ $home_banner->subheading }}</h4>
					<h2>{{ $home_banner->heading }}</h2>
					<p>
						{{ $home_banner->text }}
					</p>
					<div class="counter-area">
						<div class="countDown clearfix modern-countdown">
							<div class="row count-down-bg">
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="single-count day">
										<h1 class="days">46</h1>
										<p class="days_ref">days</p>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="single-count hour">
										<h1 class="hours">09</h1>
										<p class="hours_ref">hours</p>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="single-count min">
										<h1 class="minutes">55</h1>
										<p class="minutes_ref">minute</p>
									</div>
								</div>
								<div class="col-lg-3 col-sm-6 col-xs-12">
									<div class="single-count second">
										<h1 class="seconds">02</h1>
										<p class="seconds_ref">seconds</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@if($home_banner->button_text && $home_banner->button_url)
					<a href="{{ url($home_banner->button_url) }}" class="banner_btn video_btn">{{ $home_banner->button_text }}</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@if($home_welcome && $home_welcome->status == 'Show')
<style>
.modern-welcome-section {
    background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
    position: relative;
    overflow: hidden;
}

.modern-welcome-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
    border-radius: 50%;
}

.welcome-content-card {
    animation: slideInLeft 1s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.welcome-content-card h2 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 30px;
    position: relative;
    display: block;
    text-align: left;
}

.welcome-content-card h2 span {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.welcome-content-card h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    border-radius: 2px;
}

.welcome-content-card p {
    font-size: 16px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 30px;
}

.welcome-content-card .btn_one {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 14px 35px;
    border-radius: 50px;
    font-weight: 600;
    display: inline-block;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    border: none;
}

.welcome-content-card .btn_one:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
}

.welcome-image-wrapper {
    position: relative;
    animation: slideInRight 1s ease-out;
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.welcome-image-wrapper::before {
    content: '';
    position: absolute;
    top: -20px;
    right: -20px;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
    z-index: -1;
    opacity: 0.2;
}

.welcome-image-wrapper img {
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
    transition: all 0.4s ease;
    width: 100%;
    height: auto;
}

.welcome-image-wrapper:hover img {
    transform: scale(1.03) rotate(1deg);
    box-shadow: 0 25px 70px rgba(0,0,0,0.2);
}
</style>

<section id="about-section" class="pt_70 pb_70 white modern-welcome-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-sm-12 col-xs-12">
                <div class="welcome-content-card">
                    <h2><span>{{ $home_welcome->heading }}</span></h2>
                    <p>{{ $home_welcome->description }}</p>
                    @if(!empty($home_welcome->button_text) && !empty($home_welcome->button_link))
                    <div class="global_btn mt_20">
                        <a class="btn_one" href="{{ $home_welcome->button_link }}">{{ $home_welcome->button_text }}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-xs-12">
                <div class="welcome-image-wrapper">
                    @if($home_welcome->photo)
                        <img src="{{ asset($home_welcome->photo) }}" alt="{{ $home_welcome->heading }}">
                    @else
                        <img src="{{ asset('dist-front/images/about.jpg') }}" alt="Welcome">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($home_speaker && $home_speaker->status == 'Show')
<style>
.modern-speakers-section {
    background: #f8f9fa;
    position: relative;
}

.section-title-modern {
    margin-bottom: 60px;
    text-align: center;
}

.section-title-modern h2 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 15px;
    text-align: center;
}

.section-title-modern h2 span {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.section-title-modern p {
    font-size: 16px;
    color: #666;
    line-height: 1.8;
    text-align: center;
}

.speaker-card-modern {
    margin-bottom: 30px;
    transition: all 0.4s ease;
}

.speaker-card-modern .speaker-image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    margin-bottom: 20px;
}

.speaker-card-modern .speaker-image-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(102, 126, 234, 0.9) 100%);
    opacity: 0;
    transition: all 0.4s ease;
    z-index: 1;
}

.speaker-card-modern:hover .speaker-image-wrapper::before {
    opacity: 1;
}

.speaker-card-modern .speaker-image-wrapper img {
    width: 100%;
    height: auto;
    transition: all 0.4s ease;
    display: block;
}

.speaker-card-modern:hover .speaker-image-wrapper img {
    transform: scale(1.1);
}

.speaker-info-modern {
    text-align: center;
    padding: 0 15px;
}

.speaker-info-modern h6 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 8px;
}

.speaker-info-modern h6 a {
    color: #333;
    transition: all 0.3s ease;
    text-decoration: none;
}

.speaker-info-modern h6 a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.speaker-info-modern p {
    color: #666;
    font-size: 14px;
    margin-bottom: 0;
}

.speaker-card-modern:hover {
    transform: translateY(-10px);
}
</style>

<div id="speakers" class="pt_70 pb_70 gray team modern-speakers-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center section-title-modern">
                <h2>
                    <span>{{ $home_speaker->heading }}</span>
                </h2>
                @if($home_speaker->description)
                <p class="heading-space">
                    {{ $home_speaker->description }}
                </p>
                @endif
            </div>
        </div>
        <div class="row pt_40">
            @if($speakers && $speakers->count() > 0)
                @foreach($speakers as $speaker)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="speaker-card-modern">
                        <div class="speaker-image-wrapper">
                            <a href="{{ route('front.speaker', $speaker->slug) }}">
                                <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                            </a>
                        </div>
                        <div class="speaker-info-modern">
                            <h6><a href="{{ route('front.speaker', $speaker->slug) }}">{{ $speaker->name }}</a></h6>
                            <p>{{ $speaker->designation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                {{-- Fallback content if no speakers found --}}
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="speaker-card-modern">
                        <div class="speaker-image-wrapper">
                            <a href="#"><img src="{{ asset('dist-front/images/speaker-1.jpg') }}"></a>
                        </div>
                        <div class="speaker-info-modern">
                            <h6><a href="#">Danny Allen</a></h6>
                            <p>Founder, AA Company</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="speaker-card-modern">
                        <div class="speaker-image-wrapper">
                            <a href="#"><img src="{{ asset('dist-front/images/speaker-2.jpg') }}"></a>
                        </div>
                        <div class="speaker-info-modern">
                            <h6><a href="#">John Sword</a></h6>
                            <p>Founder, BB Company</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="speaker-card-modern">
                        <div class="speaker-image-wrapper">
                            <a href="#"><img src="{{ asset('dist-front/images/speaker-3.jpg') }}"></a>
                        </div>
                        <div class="speaker-info-modern">
                            <h6><a href="#">Steven Gragg</a></h6>
                            <p>Founder, CC Company</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="speaker-card-modern">
                        <div class="speaker-image-wrapper">
                            <a href="#"><img src="{{ asset('dist-front/images/speaker-4.jpg') }}"></a>
                        </div>
                        <div class="speaker-info-modern">
                            <h6><a href="#">Jordan Parker</a></h6>
                            <p>Founder, DD Company</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endif
@if($home_counter && $home_counter->status == 'show')
<style>
.modern-counter-section {
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
}

.modern-counter-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.7) 0%, rgba(118, 75, 162, 0.7) 100%);
    z-index: 1;
}

.modern-counter-section .container {
    position: relative;
    z-index: 2;
}

.counter-card-modern {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 40px 20px;
    margin-bottom: 30px;
    transition: all 0.4s ease;
}

.counter-card-modern:hover {
    background: rgba(255, 255, 255, 0.25);
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
}

.counter-card-modern i {
    font-size: 50px;
    color: #fff;
    margin-bottom: 20px;
    display: inline-block;
    transition: all 0.4s ease;
}

.counter-card-modern:hover i {
    transform: rotateY(360deg);
}

.counter-card-modern strong {
    font-size: 48px;
    color: #fff;
    font-weight: 700;
    display: block;
    margin-bottom: 10px;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
}

.counter-card-modern p {
    color: rgba(255, 255, 255, 0.95);
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 0;
}
</style>

<div id="counter-section" class="pt_70 pb_70 modern-counter-section" style="background-image: url({{ asset($home_counter->background ?: 'dist-front/images/counter-bg.jpg') }});">
    <div class="container">
        <div class="row number-counters text-center">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counter-card-modern">
                    <i class="{{ $home_counter->item1_icon }}"></i>
                    <strong data-to="{{ $home_counter->item1_number }}">0</strong>
                    <p>{{ $home_counter->item1_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counter-card-modern">
                    <i class="{{ $home_counter->item2_icon }}"></i>
                    <strong data-to="{{ $home_counter->item2_number }}">0</strong>
                    <p>{{ $home_counter->item2_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counter-card-modern">
                    <i class="{{ $home_counter->item3_icon }}"></i>
                    <strong data-to="{{ $home_counter->item3_number }}">0</strong>
                    <p>{{ $home_counter->item3_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counter-card-modern">
                    <i class="{{ $home_counter->item4_icon }}"></i>
                    <strong data-to="{{ $home_counter->item4_number }}">0</strong>
                    <p>{{ $home_counter->item4_title }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($home_pricing && $home_pricing->status == 'Show')
<style>
.modern-pricing-section {
    background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
}

.pricing-card-modern {
    background: white;
    border-radius: 20px;
    padding: 40px 30px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.pricing-card-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #667eea, #764ba2);
    transform: scaleX(0);
    transition: all 0.4s ease;
}

.pricing-card-modern:hover::before {
    transform: scaleX(1);
}

.pricing-card-modern:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25);
}

.pricing-card-modern h5 {
    font-size: 24px;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.pricing-card-modern h3 {
    font-size: 48px;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 30px;
}

.pricing-card-modern ul {
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}

.pricing-card-modern ul li {
    padding: 12px 0;
    font-size: 15px;
    color: #555;
    border-bottom: 1px solid #f0f0f0;
    transition: all 0.3s ease;
}

.pricing-card-modern ul li:last-child {
    border-bottom: none;
}

.pricing-card-modern ul li:hover {
    padding-left: 10px;
    color: #667eea;
}

.pricing-card-modern ul li i {
    margin-right: 10px;
    font-size: 16px;
}

.pricing-card-modern .btn_two {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white !important;
    padding: 14px 35px;
    border-radius: 50px;
    font-weight: 600;
    display: inline-block;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    border: none;
    text-decoration: none;
}

.pricing-card-modern .btn_two:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
}
</style>

<div id="price-section" class="pt_70 pb_70 gray prices modern-pricing-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center section-title-modern">
                <h2><span>{{ $home_pricing->heading }}</span></h2>
                @if($home_pricing->description)
                <p class="heading-space">
                    {{ $home_pricing->description }}
                </p>
                @endif
            </div>
        </div>
        <div class="row pt_40">
            @if($packages && $packages->count() > 0)
                @php
                    // Get all available active facilities for comparison
                    $allFacilities = \App\Models\PackageFacility::active()->orderByItemOrder()->get();
                @endphp

                @foreach($packages as $package)
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card-modern">
                        <h5>{{ $package->name }}</h5>
                        <h3>${{ number_format($package->price, 0) }}</h3>
                        <ul>
                            @foreach($allFacilities->take(4) as $facility)
                                <li>
                                    @if($package->facilities->contains($facility->id))
                                        <i class="fa fa-check" style="color: #4CAF50;"></i>
                                    @else
                                        <i class="fa fa-times" style="color: #f44336;"></i>
                                    @endif
                                    {{ $facility->name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="global_btn mt_20">
                            @auth
                                <a class="btn_two" href="{{ route('front.buy_ticket', $package->id) }}">Buy Ticket</a>
                            @else
                                <a class="btn_two" href="{{ route('login') }}">Login to Buy</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <!-- Fallback content if no packages -->
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card-modern">
                        <h5>Standard</h5>
                        <h3>$49</h3>
                        <ul>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Access to all sessions</li>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Unlimited Drinks & Coffee</li>
                            <li><i class="fa fa-times" style="color: #f44336;"></i> Lunch Facility</li>
                            <li><i class="fa fa-times" style="color: #f44336;"></i> Meet with Speakers</li>
                        </ul>
                        <div class="global_btn mt_20">
                            <a class="btn_two" href="{{ route('login') }}">Login to Buy</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card-modern">
                        <h5>Business</h5>
                        <h3>$99</h3>
                        <ul>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Access to all sessions</li>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Unlimited Drinks & Coffee</li>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Lunch Facility</li>
                            <li><i class="fa fa-times" style="color: #f44336;"></i> Meet with Speakers</li>
                        </ul>
                        <div class="global_btn mt_20">
                            <a class="btn_two" href="{{ route('login') }}">Login to Buy</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="pricing-card-modern">
                        <h5>Premium</h5>
                        <h3>$139</h3>
                        <ul>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Access to all sessions</li>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Unlimited Drinks & Coffee</li>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Lunch Facility</li>
                            <li><i class="fa fa-check" style="color: #4CAF50;"></i> Meet with Speakers</li>
                        </ul>
                        <div class="global_btn mt_20">
                            <a class="btn_two" href="{{ route('login') }}">Login to Buy</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endif
@if($home_blog && $home_blog->status == 'Show')
<style>
.modern-blog-section {
    background: #f8f9fa;
}

.blog-card-modern {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    margin-bottom: 30px;
    transition: all 0.4s ease;
}

.blog-card-modern:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.blog-image-wrapper {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.blog-image-wrapper::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.7) 100%);
    opacity: 0;
    transition: all 0.4s ease;
}

.blog-card-modern:hover .blog-image-wrapper::after {
    opacity: 1;
}

.blog-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.4s ease;
}

.blog-card-modern:hover .blog-image-wrapper img {
    transform: scale(1.1);
}

.blog-content-wrapper {
    padding: 30px 25px;
}

.blog-content-wrapper h4 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.4;
}

.blog-content-wrapper h4 a {
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}

.blog-content-wrapper h4 a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.blog-content-wrapper p {
    color: #666;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 0;
}
</style>

<div id="blog-section" class="pt_70 pb_70 white blog-section modern-blog-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center section-title-modern">
                <h2>
                    <span>{{ $home_blog->heading }}</span>
                </h2>
                @if($home_blog->description)
                <p class="heading-space">
                    {{ $home_blog->description }}
                </p>
                @endif
            </div>
        </div>
        <div class="row pt_40">
            @if($posts && $posts->count() > 0)
                @foreach($posts as $post)
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog-card-modern">
                        <div class="blog-image-wrapper">
                            <a href="{{ route('front.post', $post->slug) }}">
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="blog-content-wrapper">
                            <h4><a href="{{ route('front.post', $post->slug) }}">{{ $post->title }}</a></h4>
                            <p>
                                {{ Str::limit($post->short_description, 120) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endif
@if($home_sponsor && $home_sponsor->status == 'Show')
<style>
.modern-sponsor-section {
    background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
}

.sponsor-logo-wrapper {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    transition: all 0.4s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 120px;
}

.sponsor-logo-wrapper:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
}

.sponsor-logo-wrapper img {
    max-width: 100%;
    height: auto;
    filter: grayscale(100%);
    opacity: 0.7;
    transition: all 0.4s ease;
}

.sponsor-logo-wrapper:hover img {
    filter: grayscale(0%);
    opacity: 1;
}
</style>

<div id="sponsor-section" class="pt_70 pb_70 gray modern-sponsor-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 text-center section-title-modern">
                <h2>
                    <span>{{ $home_sponsor->heading }}</span>
                </h2>
                @if($home_sponsor->description)
                <p class="heading-space">
                    {{ $home_sponsor->description }}
                </p>
                @endif
            </div>
        </div>
        <div class="row pt_40">
            <div class="col-md-12">
                <div class="owl-carousel">
                    @if($sponsors && $sponsors->count() > 0)
                        @foreach($sponsors as $sponsor)
                        <div class="sponsor-logo-wrapper">
                            <img src="{{ asset('uploads/'.$sponsor->logo) }}" class="img-responsive" alt="{{ $sponsor->name }}">
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('scripts')
<script>
    // Countdown Timer
    $(".countDown").downCount({
        date: '{{ $home_banner->countdown_date }}', //month/date/year   HH:MM:SS
        offset: +6 //+GMT+6 (Bangladesh Standard Time)
    });

    // Modern Header Scroll Effect
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.modern-header').addClass('scrolled');
        } else {
            $('.modern-header').removeClass('scrolled');
        }
    });

    // Smooth Scroll for Navigation Links
    $('.smooth-scroll').on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 80
            }, 800);
        }
    });

    // Add Animation on Scroll
    function revealOnScroll() {
        var reveals = document.querySelectorAll('.speaker-card-modern, .pricing-card-modern, .blog-card-modern, .counter-card-modern');

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].style.opacity = '1';
                reveals[i].style.transform = 'translateY(0)';
            }
        }
    }

    // Initial setup for scroll animations
    var styleElement = document.createElement('style');
    styleElement.innerHTML = `
        .speaker-card-modern, .pricing-card-modern, .blog-card-modern, .counter-card-modern {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
    `;
    document.head.appendChild(styleElement);

    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Initial check
</script>
@endsection
