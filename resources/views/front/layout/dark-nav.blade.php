<style>
/* Dark Glassmorphism Navigation */
.modern-header {
    background: rgba(26, 31, 58, 0.7) !important;
    backdrop-filter: blur(30px) saturate(180%);
    -webkit-backdrop-filter: blur(30px) saturate(180%);
    box-shadow: 0 8px 32px rgba(0,0,0,0.5),
                0 0 1px rgba(102, 126, 234, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
    position: sticky;
    top: 0;
    z-index: 999;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(102, 126, 234, 0.3);
    border-top: 1px solid rgba(102, 126, 234, 0.1);
}

.modern-header .container,
.modern-header .main-menu,
.modern-header .navbar,
.modern-header .navbar-collapse {
    background: transparent !important;
}

.modern-header .navbar-light .navbar-toggler {
    border-color: rgba(102, 126, 234, 0.4);
    background: rgba(26, 31, 58, 0.8);
}

.modern-header .navbar-light .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(224, 224, 224, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.modern-header.scrolled {
    background: rgba(26, 31, 58, 0.85) !important;
    backdrop-filter: blur(35px) saturate(200%);
    -webkit-backdrop-filter: blur(35px) saturate(200%);
    box-shadow: 0 12px 40px rgba(102, 126, 234, 0.4), 0 0 60px rgba(102, 126, 234, 0.2);
    border-bottom-color: rgba(102, 126, 234, 0.5);
}

.modern-header .navbar-nav .nav-link,
.modern-header .navbar-nav .dropdown-toggle {
    position: relative;
    font-weight: 500;
    padding: 8px 16px !important;
    transition: all 0.3s ease;
    color: #e0e0e0 !important;
}

.modern-header .navbar-nav .nav-link:hover,
.modern-header .navbar-nav .dropdown-toggle:hover,
.modern-header .navbar-nav .nav-link.active {
    color: #fff !important;
    text-shadow: 0 0 20px rgba(102, 126, 234, 0.8);
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
    box-shadow: 0 0 10px rgba(102, 126, 234, 0.8);
}

.modern-header .navbar-nav .nav-link:hover::after,
.modern-header .navbar-nav .nav-link.active::after {
    width: 80%;
}

.modern-header .dropdown-menu {
    background: rgba(26, 31, 58, 0.95) !important;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(102, 126, 234, 0.3);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    margin-top: 10px;
}

.modern-header .dropdown-item {
    color: #e0e0e0 !important;
    transition: all 0.3s ease;
    padding: 10px 20px;
    border-radius: 8px;
    margin: 4px 8px;
}

.modern-header .dropdown-item:hover {
    background: rgba(102, 126, 234, 0.2) !important;
    color: #fff !important;
    transform: translateX(8px);
    text-shadow: 0 0 10px rgba(102, 126, 234, 0.8);
}

.modern-header #logo img {
    max-height: 50px;
    filter: drop-shadow(0 0 10px rgba(102, 126, 234, 0.5));
    transition: all 0.3s ease;
}

.modern-header #logo:hover img {
    filter: drop-shadow(0 0 20px rgba(102, 126, 234, 0.8));
    transform: scale(1.05);
}

.modern-header .member-login-button .nav-link {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 10px 24px !important;
    border-radius: 25px;
    color: #fff !important;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    margin-left: 10px;
}

.modern-header .member-login-button .nav-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
}

.modern-header .member-login-button .nav-link::after {
    display: none;
}

/* Mobile Responsive */
@media (max-width: 991px) {
    .modern-header .navbar-collapse {
        background: rgba(26, 31, 58, 0.98) !important;
        backdrop-filter: blur(20px);
        border-radius: 12px;
        margin-top: 15px;
        padding: 20px;
        border: 1px solid rgba(102, 126, 234, 0.3);
    }

    .modern-header .navbar-nav .nav-link {
        padding: 12px 20px !important;
        border-bottom: 1px solid rgba(102, 126, 234, 0.1);
    }

    .modern-header .member-login-button {
        margin-top: 15px;
    }

    .modern-header .member-login-button .nav-link {
        display: block;
        text-align: center;
        margin-left: 0;
    }

    .modern-header .dropdown-menu {
        background: rgba(16, 20, 42, 0.95) !important;
        border: none;
        box-shadow: none;
    }
}
</style>

<header class="header modern-header">
    <div class="container main-menu" id="navbar">
        <div class="row align-items-center">
            <div class="col-lg-2 col-sm-6 col-6">
                <a href="{{ route('front.home') }}" id="logo" class="grid_2">
                    @if(isset($setting_data->logo) && $setting_data->logo)
                        <img src="{{ asset('uploads/'.$setting_data->logo) }}" alt="Logo">
                    @else
                        <h3 style="color: #{{ $setting_data->theme_color ?? '6bc24a' }}; margin: 0; font-weight: bold;">
                            <i class="fas fa-calendar-alt"></i> {{ config('app.name', 'Event Management') }}
                        </h3>
                    @endif
                </a>
            </div>
            <div class="col-lg-10 col-sm-6 col-6 menu-area">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul id="navContent" class="navbar-nav ml-auto navigation">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') || Request::is('home') ? 'active' : '' }}" href="{{ route('front.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('speakers') ? 'active' : '' }}" href="{{ route('front.speakers') }}">Speakers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('schedule') ? 'active' : '' }}" href="{{ route('front.schedule') }}">Schedule</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('pricing') ? 'active' : '' }}" href="{{ route('front.pricing') }}">Pricing</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pages
                                </a>
                                <div class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('front.sponsors') }}">Sponsors</a>
                                    <a class="dropdown-item" href="{{ route('front.organisers') }}">Organizers</a>
                                    <a class="dropdown-item" href="{{ route('front.photo_gallery') }}">Photo Gallery</a>
                                    <a class="dropdown-item" href="{{ route('front.video_gallery') }}">Video Gallery</a>
                                    <a class="dropdown-item" href="{{ route('front.faq') }}">FAQ</a>
                                    <a class="dropdown-item" href="{{ route('front.upcoming_events') }}">Upcoming Events</a>
                                </div>
                            </li>
                            <li class="nav-item member-login-button">
                                @if(Auth::guard('web')->check())
                                <a class="nav-link" href="{{ route('user.dashboard') }}">
                                    <i class="fa fa-user"></i> Dashboard</a>
                                </a>
                                @else
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<script>
// Add scroll effect to header
window.addEventListener('scroll', function() {
    const header = document.querySelector('.modern-header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
</script>
