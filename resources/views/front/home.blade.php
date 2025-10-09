@extends('front.layout.master')

@section('title', 'Home | SingleEvent')
@section('main_content')

<!-- Navigation Bar for Home Page -->
<header class="header" style="background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); position: relative; z-index: 999; width: 100%;">
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

<div class="container-fluid home-banner" style="background-image: url('{{ asset($home_banner->background) }}'); min-height: 500px; background-size: cover; background-position: center; background-repeat: no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="static-banner-detail">
					<h4>{{ $home_banner->subheading }}</h4>
					<h2>{{ $home_banner->heading }}</h2>
					<p>
						{{ $home_banner->text }}
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
					@if($home_banner->button_text && $home_banner->button_url)
					<a href="{{ url($home_banner->button_url) }}" class="banner_btn video_btn">{{ $home_banner->button_text }}</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@if($home_welcome && $home_welcome->status == 'Show')
<section id="about-section" class="pt_70 pb_70 white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><span class="color_green">{{ $home_welcome->heading }}</span></h2>
                    </div>
                </div>
                <div class="about-details">
                    <p>{{ $home_welcome->description }}</p>
                    @if(!empty($home_welcome->button_text) && !empty($home_welcome->button_link))
                    <div class="global_btn mt_20">
                        <a class="btn_one" href="{{ $home_welcome->button_link }}">{{ $home_welcome->button_text }}</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-xs-12">
                <div class="about-details-img">
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
<div id="speakers" class="pt_70 pb_70 gray team">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_10">
                    <span class="color_green">{{ $home_speaker->heading }}</span>
                </h2>
                @if($home_speaker->description)
                <p class="heading-space">
                    {{ $home_speaker->description }}
                </p>
                @endif
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
@endif
@if($home_counter && $home_counter->status == 'show')
<div id="counter-section" class="pt_70 pb_70" style="background-image: url({{ asset($home_counter->background ?: 'dist-front/images/counter-bg.jpg') }});">
    <div class="container">
        <div class="row number-counters text-center">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $home_counter->item1_icon }}"></i>
                    <strong data-to="{{ $home_counter->item1_number }}">0</strong>
                    <p>{{ $home_counter->item1_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $home_counter->item2_icon }}"></i>
                    <strong data-to="{{ $home_counter->item2_number }}">0</strong>
                    <p>{{ $home_counter->item2_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
                    <i class="{{ $home_counter->item3_icon }}"></i>
                    <strong data-to="{{ $home_counter->item3_number }}">0</strong>
                    <p>{{ $home_counter->item3_title }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="counters-item">
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
<div id="price-section" class="pt_70 pb_70 gray prices">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_10"><span class="color_green">{{ $home_pricing->heading }}</span></h2>
                @if($home_pricing->description)
                <p class="heading-space">
                    {{ $home_pricing->description }}
                </p>
                @endif
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            @if($packages && $packages->count() > 0)
                @php
                    // Get all available active facilities for comparison
                    $allFacilities = \App\Models\PackageFacility::active()->orderByItemOrder()->get();
                @endphp

                @foreach($packages as $package)
                <div class="col-md-4 col-sm-12">
                    <div class="info">
                        <h5 class="event-ti-style">{{ $package->name }}</h5>
                        <h3 class="event-ti-style">${{ number_format($package->price, 0) }}</h3>
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
                    <div class="info">
                        <h5 class="event-ti-style">Standard</h5>
                        <h3 class="event-ti-style">$49</h3>
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
                    <div class="info">
                        <h5 class="event-ti-style">Business</h5>
                        <h3 class="event-ti-style">$99</h3>
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
                    <div class="info">
                        <h5 class="event-ti-style">Premium</h5>
                        <h3 class="event-ti-style">$139</h3>
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
<div id="blog-section" class="pt_70 pb_70 white blog-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_15">
                    <span class="color_green">{{ $home_blog->heading }}</span>
                </h2>
                @if($home_blog->description)
                <p class="heading-space">
                    {{ $home_blog->description }}
                </p>
                @endif
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            @if($posts && $posts->count() > 0)
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
<div id="sponsor-section" class="pt_70 pb_70 gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-lg-2"></div>
            <div class="col-xs-12 col-sm-10 col-lg-8 text-center">
                <h2 class="title-1 mb_15">
                    <span class="color_green">{{ $home_sponsor->heading }}</span>
                </h2>
                @if($home_sponsor->description)
                <p class="heading-space">
                    {{ $home_sponsor->description }}
                </p>
                @endif
            </div>
            <div class="col-sm-1 col-lg-2"></div>
        </div>
        <div class="row pt_40">
            <div class="col-md-12">
                <div class="owl-carousel">
                    @if($sponsors && $sponsors->count() > 0)
                        @foreach($sponsors as $sponsor)
                        <div class="sponsors-logo">
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
    $(".countDown").downCount({
        date: '{{ $home_banner->countdown_date }}', //month/date/year   HH:MM:SS
        offset: +6 //+GMT+6 (Bangladesh Standard Time)
    });
</script>
@endsection
