@extends('front.layout.master')

@section('title', $speaker->name . ' | SingleEvent')
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
							<a class="nav-link" href="{{ url('/blog') }}">Blog</a>
						</li>
						<li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
							<div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ url('/sponsors') }}">Sponsors</a>
								<a class="dropdown-item" href="{{ url('/organizers') }}">Organizers</a>
								<a class="dropdown-item" href="{{ url('/accommodations') }}">Accommodations</a>
								<a class="dropdown-item" href="{{ url('/photo-gallery') }}">Photo Gallery</a>
								<a class="dropdown-item" href="{{ url('/video-gallery') }}">Video Gallery</a>
								<a class="dropdown-item" href="{{ url('/faq') }}">FAQ</a>
								<a class="dropdown-item" href="{{ url('/testimonials') }}">Testimonials</a>
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
                    <h2>{{ $speaker->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.speakers') }}">Speakers</a></li>
                            <li class="breadcrumb-item active">{{ $speaker->name }}</li>
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
                    <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2>{{ $speaker->name }}</h2>
                    <h4 class="mb_20">{{ $speaker->designation }}</h4>
                    <p>{{ $speaker->biography }}</p>

                    <h4>More Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Address:</b></th>
                                <td>{{ $speaker->address }}</td>
                            </tr>
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $speaker->email }}</td>
                            </tr>
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $speaker->phone }}</td>
                            </tr>
                            @if($speaker->website)
                            <tr>
                                <th><b>Website:</b></th>
                                <td>
                                    <a href="{{ $speaker->website }}" target="_blank">{{ $speaker->website }}</a>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th><b>Social:</b></th>
                                <td>
                                    <ul class="social-icon">
                                        @if($speaker->facebook)
                                        <li>
                                            <a href="{{ $speaker->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->twitter)
                                        <li>
                                            <a href="{{ $speaker->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->linkedin)
                                        <li>
                                            <a href="{{ $speaker->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->instagram)
                                        <li>
                                            <a href="{{ $speaker->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{-- Sessions section - you can expand this later --}}
                    <h4>My Sessions</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted">Session details will be available soon.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
