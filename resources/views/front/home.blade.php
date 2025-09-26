@extends('front.layout.master')

@section('title', 'Home | SingleEvent')
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
<div class="container-fluid home-banner" style="background-image: url('{{ asset($banner->background) }}'); min-height: 500px; background-size: cover; background-position: center; background-repeat: no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="static-banner-detail">
					<h4>{{ $banner->subheading }}</h4>
					<h2>{{ $banner->heading }}</h2>
					<p>
						{{ $banner->text }}
					</p>
					<div class="counter-area">
						<div class="countDown clearfix">
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
					@if($banner->button_text && $banner->button_url)
					<a href="{{ url($banner->button_url) }}" class="banner_btn video_btn">{{ $banner->button_text }}</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@if($welcome && $welcome->status == 'active')
<section id="about-section" class="pt_70 pb_70 white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><span class="color_green">{{ $welcome->heading }}</span></h2>
                    </div>
                </div>
                <div class="about-details">
                    <p>{{ $welcome->description }}</p>
                    @if(!empty($welcome->button_text) && !empty($welcome->button_link))
                    <div class="global_btn mt_20">
                        <a class="btn_one" href="{{ $welcome->button_link }}">{{ $welcome->button_text }}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-xs-12">
                <div class="about-details-img">
                    @if($welcome->photo)
                        <img src="{{ asset($welcome->photo) }}" alt="{{ $welcome->heading }}">
                    @else
                        <img src="{{ asset('dist-front/images/about.jpg') }}" alt="Welcome">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<div id="speakers" class="pt_70 pb_70 gray team">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_10">
                    <span class="color_green">Speakers</span>
                </h2>
                <p class="heading-space">
                    You will find below the list of our valuable speakers. They are all experts in their field and will share their knowledge with you.
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            @if($speakers && $speakers->count() > 0)
                @foreach($speakers as $speaker)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-img mb_20">
                        <a href="{{ route('front.speaker', $speaker->slug) }}">
                            <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                        </a>
                    </div>
                    <div class="team-info text-center">
                        <h6><a href="{{ route('front.speaker', $speaker->slug) }}">{{ $speaker->name }}</a></h6>
                        <p>{{ $speaker->designation }}</p>
                    </div>
                </div>
                @endforeach
            @else
                {{-- Fallback content if no speakers found --}}
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-img mb_20">
                        <a href="#"><img src="{{ asset('dist-front/images/speaker-1.jpg') }}"></a>
                    </div>
                    <div class="team-info text-center">
                        <h6><a href="#">Danny Allen</a></h6>
                        <p>Founder, AA Company</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-img mb_20">
                        <a href="#"><img src="{{ asset('dist-front/images/speaker-2.jpg') }}"></a>
                    </div>
                    <div class="team-info text-center">
                        <h6><a href="#">John Sword</a></h6>
                        <p>Founder, BB Company</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-img mb_20">
                        <a href="#"><img src="{{ asset('dist-front/images/speaker-3.jpg') }}"></a>
                    </div>
                    <div class="team-info text-center">
                        <h6><a href="#">Steven Gragg</a></h6>
                        <p>Founder, CC Company</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-img mb_20">
                        <a href="#"><img src="{{ asset('dist-front/images/speaker-4.jpg') }}"></a>
                    </div>
                    <div class="team-info text-center">
                        <h6><a href="#">Jordan Parker</a></h6>
                        <p>Founder, DD Company</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@if($homeCounter && $homeCounter->status == 'show')
<div id="counter-section" class="pt_70 pb_70" style="background-image: url({{ asset($homeCounter->background ?: 'dist-front/images/counter-bg.jpg') }});">
    <div class="container">
        <div class="row number-counters text-center">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $homeCounter->item1_icon }}"></i>
                    <strong data-to="{{ $homeCounter->item1_number }}">0</strong>
                    <p>{{ $homeCounter->item1_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $homeCounter->item2_icon }}"></i>
                    <strong data-to="{{ $homeCounter->item2_number }}">0</strong>
                    <p>{{ $homeCounter->item2_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $homeCounter->item3_icon }}"></i>
                    <strong data-to="{{ $homeCounter->item3_number }}">0</strong>
                    <p>{{ $homeCounter->item3_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $homeCounter->item4_icon }}"></i>
                    <strong data-to="{{ $homeCounter->item4_number }}">0</strong>
                    <p>{{ $homeCounter->item4_title }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div id="price-section" class="pt_70 pb_70 gray prices">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_10"><span class="color_green">Pricing</span></h2>
                <p class="heading-space">
                    You will find below the different pricing options for our event. Choose the one that suits you best and register now! You will have access to all sessions, unlimited coffee and food, and the opportunity to meet with your favorite speakers.
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            <div class="col-md-4 col-sm-12">
                <div class="info">
                    <h5 class="event-ti-style">Standard</h5>
                    <h3 class="event-ti-style">$49</h3>
                    <ul>
                        <li><i class="fa fa-check"></i> Access to all sessions</li>
                        <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                        <li><i class="fa fa-times"></i> Lunch Facility</li>
                        <li><i class="fa fa-times"></i> Meet with Speakers</li>
                    </ul>
                    <div class="global_btn mt_20">
                        <a class="btn_two" href="{{ url('/buy') }}">Buy Ticket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="info">
                    <h5 class="event-ti-style">Business</h5>
                    <h3 class="event-ti-style">$99</h3>
                    <ul>
                        <li><i class="fa fa-check"></i> Access to all sessions</li>
                        <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                        <li><i class="fa fa-check"></i> Lunch Facility</li>
                        <li><i class="fa fa-times"></i> Meet with Speakers</li>
                    </ul>
                    <div class="global_btn mt_20">
                        <a class="btn_two" href="{{ url('/buy') }}">Buy Ticket</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="info">
                    <h5 class="event-ti-style">Premium</h5>
                    <h3 class="event-ti-style">$139</h3>
                    <ul>
                        <li><i class="fa fa-check"></i> Access to all sessions</li>
                        <li><i class="fa fa-check"></i> Unlimited Drinkgs & Coffee</li>
                        <li><i class="fa fa-check"></i> Lunch Facility</li>
                        <li><i class="fa fa-check"></i> Meet with Speakers</li>
                    </ul>
                    <div class="global_btn mt_20">
                        <a class="btn_two" href="{{ url('/buy') }}">Buy Ticket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="blog-section" class="pt_70 pb_70 white blog-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_15">
                    <span class="color_green">Latest News</span>
                </h2>
                <p class="heading-space">
                    All the latest news and updates about our event and conference are available here. Stay informed and don't miss any important information!
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="{{ url('/post') }}">
                            <img src="{{ asset('dist-front/images/post-1.jpg') }}" alt="image">
                        </a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="{{ url('/post') }}">Essential Tips for a Successful Virtual Conference</a></h4>
                        <p>
                            Organizing a virtual conference can be challenging. Focus on engaging content, interactive sessions, & reliable technology to ensure a successful event.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="{{ url('/post') }}"><img src="{{ asset('dist-front/images/post-2.jpg') }}" alt="image"></a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="{{ url('/post') }}">Maximizing Your Networking Opportunities at Events</a></h4>
                        <p>
                            Networking at events requires strategic planning. Attend relevant sessions, participate in discussions, and utilize apps to connect with professionals.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="blog-box text-center">
                    <div class="blog-post-images">
                        <a href="{{ url('/post') }}"><img src="{{ asset('dist-front/images/post-3.jpg') }}" alt="image"></a>
                    </div>
                    <div class="blogs-post">
                        <h4><a href="{{ url('/post') }}">How to Choose the Perfect Venue for Your Conference</a></h4>
                        <p>
                            Selecting the ideal venue involves considering location, capacity, and amenities. Ensure it aligns with your goals, and fits within your budget.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="sponsor-section" class="pt_70 pb_70 gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_15">
                    <span class="color_green">Our Sponsers</span>
                </h2>
                <p class="heading-space">
                    If you want to become a sponsor, please contact us. We offer different sponsorship packages that will help you promote your brand and reach a wider audience.
                </p>
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            <div class="col-md-12">
                <div class="owl-carousel">
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-1.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-2.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-3.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-4.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-5.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-6.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-7.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                    <div class="sponsors-logo">
                        <img src="{{ asset('dist-front/images/partner-8.png') }}" class="img-responsive" alt="sponsor logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(".countDown").downCount({
        date: '{{ $banner->countdown_date }}', //month/date/year   HH:MM:SS
        offset: +6 //+GMT+6 (Bangladesh Standard Time)
    });
</script>
@endsection
