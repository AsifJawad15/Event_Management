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
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}" style="color: #000000 !important;">
                                            <i class="fa fa-dashboard" style="color: #000000 !important;"></i> Dashboard
                                        </a>
                                        <a class="dropdown-item" href="{{ route('user.profile') }}" style="color: #000000 !important;">
                                            <i class="fa fa-user" style="color: #000000 !important;"></i> Profile
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" style="color: #000000 !important;">
                                            <i class="fa fa-sign-out" style="color: #000000 !important;"></i> Logout
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

<style>
/* Force black text in user dropdown menu with highest specificity */
.member-login-button .dropdown-menu {
    background-color: #ffffff !important;
    border: 1px solid #ddd !important;
    border-radius: 6px !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15) !important;
    min-width: 180px !important;
    padding: 8px 0 !important;
    margin-top: 8px !important;
    z-index: 9999 !important;
}

.member-login-button .dropdown-menu .dropdown-item,
.member-login-button .dropdown-item,
.dropdown-menu .dropdown-item {
    color: #000000 !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    padding: 10px 20px !important;
    text-decoration: none !important;
    display: flex !important;
    align-items: center !important;
    transition: all 0.3s ease !important;
    background-color: transparent !important;
}

.member-login-button .dropdown-menu .dropdown-item:hover,
.member-login-button .dropdown-item:hover,
.dropdown-menu .dropdown-item:hover {
    background-color: #f8f9fa !important;
    color: #000000 !important;
    text-decoration: none !important;
}

.member-login-button .dropdown-menu .dropdown-item:focus,
.member-login-button .dropdown-item:focus,
.dropdown-menu .dropdown-item:focus {
    color: #000000 !important;
    background-color: #f8f9fa !important;
    outline: none !important;
}

.member-login-button .dropdown-menu .dropdown-item:active,
.member-login-button .dropdown-item:active,
.dropdown-menu .dropdown-item:active {
    color: #000000 !important;
    background-color: #e9ecef !important;
}

.member-login-button .dropdown-item i,
.dropdown-menu .dropdown-item i {
    margin-right: 8px !important;
    width: 16px !important;
    color: #000000 !important;
}

.member-login-button .dropdown-divider {
    border-top: 1px solid #e9ecef !important;
    margin: 5px 0 !important;
}

/* Ensure dropdown toggle text is visible */
.member-login-button .dropdown-toggle {
    color: #333 !important;
    font-weight: 500 !important;
}

.member-login-button .dropdown-toggle:hover {
    color: #007bff !important;
    text-decoration: none !important;
}

/* Override any Bootstrap or theme conflicts */
.navbar .dropdown-menu .dropdown-item {
    color: #000000 !important;
}

.navbar .dropdown-menu .dropdown-item:hover,
.navbar .dropdown-menu .dropdown-item:focus {
    color: #000000 !important;
    background-color: #f8f9fa !important;
}

/* Force visibility on all states */
a.dropdown-item {
    color: #000000 !important;
}

a.dropdown-item:hover,
a.dropdown-item:focus,
a.dropdown-item:active {
    color: #000000 !important;
}

/* Fix for dark navigation backgrounds */
@media (max-width: 991px) {
    .member-login-button .dropdown-menu {
        position: static !important;
        float: none !important;
        width: auto !important;
        margin-top: 0 !important;
        background-color: #ffffff !important;
        border: 0 !important;
        box-shadow: none !important;
        border-radius: 0 !important;
    }

    .member-login-button .dropdown-menu .dropdown-item {
        color: #000000 !important;
    }
}
</style>
