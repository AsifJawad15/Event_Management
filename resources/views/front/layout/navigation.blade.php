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
                            <a class="nav-link" href="{{ route('front.speakers') }}">Speakers</a>
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
                        <li class="nav-item dropdown"> <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pages </a>
                            <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('front.sponsors') }}">Sponsors</a>
                                <a class="dropdown-item" href="{{ route('front.organisers') }}">Organisers</a>
                                <a class="dropdown-item" href="{{ route('front.accommodations') }}">Accommodations</a>
                                <a class="dropdown-item" href="{{ route('front.photo_gallery') }}">Photo Gallery</a>
                                <a class="dropdown-item" href="{{ route('front.video_gallery') }}">Video Gallery</a>
                                <a class="dropdown-item" href="{{ route('front.faq') }}">FAQ</a>
                                <a class="dropdown-item" href="{{ route('front.testimonials') }}">Testimonials</a>
                            </div>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                        <li class="member-login-button">
                            <div class="inner">
                                @if(Auth::guard('web')->check())
                                <div class="dropdown">
                                    <a class="dropdown-toggle nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                            <i class="fa fa-dashboard"></i> Dashboard
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.profile') }}">
                                            <i class="fa fa-user"></i> Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>
                                    </div>
                                </div>
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
