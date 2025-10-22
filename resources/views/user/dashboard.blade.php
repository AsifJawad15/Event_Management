@extends('front.layout.master')

@section('title', 'User Dashboard')

@section('main_content')
@include('front.layout.dark-nav')

<style>
/* Modern Dashboard with Glowing Effects & Animations */
:root {
    --primary: #{{ $setting_data->theme_color }};
    --secondary: #{{ $setting_data->theme_color }}dd;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
    --glow: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.6);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.dashboard-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 80px 0 60px;
}

/* Hero Section */
.dashboard-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    border-radius: 30px;
    padding: 50px 40px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(102, 126, 234, 0.2);
    animation: slideDown 0.8s ease;
}

.dashboard-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
    animation: rotateGlow 20s linear infinite;
}

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.hero-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 30px;
}

.hero-text h1 {
    font-size: 42px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 10px;
    text-shadow: 0 0 20px rgba(102, 126, 234, 0.5);
}

.hero-text .username {
    font-size: 24px;
    color: var(--primary);
    font-weight: 600;
    margin-bottom: 5px;
}

.hero-text .tagline {
    font-size: 16px;
    color: rgba(255, 255, 255, 0.7);
}

.hero-avatar {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    color: white;
    font-weight: 700;
    box-shadow: 0 0 40px var(--glow);
    animation: float 3s ease-in-out infinite;
    position: relative;
    overflow: hidden;
    border: 4px solid rgba(255, 255, 255, 0.2);
}

.hero-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.hero-avatar::after {
    content: '';
    position: absolute;
    inset: -8px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    opacity: 0.3;
    z-index: -1;
    animation: pulseRing 2s ease-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
}

@keyframes pulseRing {
    0% { transform: scale(1); opacity: 0.3; }
    100% { transform: scale(1.4); opacity: 0; }
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.stat-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.6s ease;
    animation-fill-mode: both;
}

.stat-card:nth-child(1) { animation-delay: 0.1s; }
.stat-card:nth-child(2) { animation-delay: 0.2s; }
.stat-card:nth-child(3) { animation-delay: 0.3s; }
.stat-card:nth-child(4) { animation-delay: 0.4s; }

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--primary), var(--secondary));
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4),
                0 0 40px rgba(102, 126, 234, 0.3);
    border-color: rgba(102, 126, 234, 0.6);
}

.stat-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
    }
}

.stat-icon i {
    font-size: 32px;
    color: white;
}

.stat-details {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.stat-info h3 {
    font-size: 36px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 5px;
    line-height: 1;
}

.stat-info p {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
}

.stat-trend {
    width: 50px;
    height: 50px;
    background: rgba(102, 126, 234, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.stat-trend i {
    font-size: 20px;
    color: var(--primary);
}

/* Main Grid */
.dashboard-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 30px;
}

/* Sidebar */
.dashboard-sidebar {
    animation: slideInLeft 0.8s ease;
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-50px); }
    to { opacity: 1; transform: translateX(0); }
}

.sidebar-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 30px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    position: sticky;
    top: 100px;
}

.sidebar-header {
    text-align: center;
    padding-bottom: 25px;
    margin-bottom: 25px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.sidebar-avatar {
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    color: white;
    font-weight: 700;
    margin: 0 auto 15px;
    box-shadow: 0 0 30px var(--glow);
    animation: float 3s ease-in-out infinite;
    overflow: hidden;
    border: 3px solid rgba(255, 255, 255, 0.2);
}

.sidebar-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.sidebar-name {
    font-size: 20px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 5px;
}

.sidebar-email {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.6);
}

.nav-menu {
    list-style: none;
}

.nav-menu li {
    margin-bottom: 8px;
}

.nav-menu a {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    border-radius: 15px;
    transition: all 0.3s ease;
    font-weight: 500;
    position: relative;
}

.nav-menu a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(180deg, var(--primary), var(--secondary));
    border-radius: 0 4px 4px 0;
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.nav-menu a.active::before,
.nav-menu a:hover::before {
    transform: scaleY(1);
}

.nav-menu a.active,
.nav-menu a:hover {
    background: rgba(102, 126, 234, 0.2);
    color: #fff;
    padding-left: 30px;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.nav-menu a i {
    font-size: 20px;
    width: 24px;
    transition: all 0.3s ease;
}

.nav-menu a:hover i {
    transform: scale(1.2) rotate(5deg);
}

/* Content Area */
.dashboard-content {
    animation: slideInRight 0.8s ease;
}

@keyframes slideInRight {
    from { opacity: 0; transform: translateX(50px); }
    to { opacity: 1; transform: translateX(0); }
}

.content-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    margin-bottom: 30px;
}

.content-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid rgba(102, 126, 234, 0.2);
}

.content-header .icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.content-header .icon i {
    font-size: 24px;
    color: white;
}

.content-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin: 0;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.info-item {
    background: rgba(15, 23, 42, 0.6);
    border-radius: 15px;
    padding: 25px;
    border: 1px solid rgba(102, 126, 234, 0.1);
    transition: all 0.3s ease;
    animation: fadeIn 0.6s ease;
    animation-fill-mode: both;
}

.info-item:nth-child(1) { animation-delay: 0.1s; }
.info-item:nth-child(2) { animation-delay: 0.2s; }
.info-item:nth-child(3) { animation-delay: 0.3s; }
.info-item:nth-child(4) { animation-delay: 0.4s; }
.info-item:nth-child(5) { animation-delay: 0.5s; }
.info-item:nth-child(6) { animation-delay: 0.6s; }
.info-item:nth-child(7) { animation-delay: 0.7s; }
.info-item:nth-child(8) { animation-delay: 0.8s; }

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.info-item:hover {
    border-color: rgba(102, 126, 234, 0.4);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
    transform: translateY(-5px);
}

.info-label {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.6);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
    font-weight: 600;
}

.info-label i {
    color: var(--primary);
    font-size: 16px;
}

.info-value {
    font-size: 18px;
    color: #fff;
    font-weight: 600;
    word-break: break-word;
    line-height: 1.5;
}

/* Quick Actions */
.quick-actions {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.action-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 30px 20px;
    background: rgba(15, 23, 42, 0.6);
    border-radius: 20px;
    border: 1px solid rgba(102, 126, 234, 0.1);
    text-decoration: none;
    color: #fff;
    transition: all 0.3s ease;
    animation: fadeIn 0.6s ease;
    animation-fill-mode: both;
}

.action-btn:nth-child(1) { animation-delay: 0.1s; }
.action-btn:nth-child(2) { animation-delay: 0.2s; }
.action-btn:nth-child(3) { animation-delay: 0.3s; }

.action-btn:hover {
    transform: translateY(-10px);
    border-color: rgba(102, 126, 234, 0.6);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
}

.action-btn .icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.action-btn .icon i {
    font-size: 28px;
    color: white;
}

.action-btn span {
    font-size: 16px;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 1024px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
    }

    .sidebar-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .dashboard-hero {
        padding: 30px 20px;
    }

    .hero-content {
        flex-direction: column;
        text-align: center;
    }

    .hero-text h1 {
        font-size: 32px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .content-card {
        padding: 25px;
    }

    .info-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="dashboard-wrapper">
    <div class="container">
        <!-- Hero Section -->
        <div class="dashboard-hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Welcome Back!</h1>
                    <p class="username">{{ Auth::user()->name }}</p>
                    <p class="tagline">Manage your events and stay updated</p>
                </div>
                <div class="hero-avatar">
                    @if(Auth::user()->photo)
                        <img src="{{ asset('uploads/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}">
                    @else
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    @endif
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-details">
                    <div class="stat-info">
                        <h3>{{ Auth::user()->tickets()->count() ?? 0 }}</h3>
                        <p>Total Tickets</p>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-details">
                    <div class="stat-info">
                        <h3>{{ Auth::user()->tickets()->count() ?? 0 }}</h3>
                        <p>Active Events</p>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-details">
                    <div class="stat-info">
                        <h3>0</h3>
                        <p>Messages</p>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-details">
                    <div class="stat-info">
                        <h3>Active</h3>
                        <p>Status</p>
                    </div>
                    <div class="stat-trend">
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- Sidebar -->
            <div class="dashboard-sidebar">
                <div class="sidebar-card">
                    <div class="sidebar-header">
                        <div class="sidebar-avatar">
                            @if(Auth::user()->photo)
                                <img src="{{ asset('uploads/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}">
                            @else
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            @endif
                        </div>
                        <h3 class="sidebar-name">{{ Auth::user()->name }}</h3>
                        <p class="sidebar-email">{{ Auth::user()->email }}</p>
                    </div>

                    <ul class="nav-menu">
                        <li>
                            <a href="{{ route('user.dashboard') }}" class="active">
                                <i class="fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('attendee.tickets') }}">
                                <i class="fas fa-ticket-alt"></i>
                                <span>My Tickets</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.message') }}">
                                <i class="fas fa-envelope"></i>
                                <span>Messages</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.profile') }}">
                                <i class="fas fa-user-cog"></i>
                                <span>Profile Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content -->
            <div class="dashboard-content">
                <!-- Personal Information -->
                <div class="content-card">
                    <div class="content-header">
                        <div class="icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h2>Personal Information</h2>
                    </div>

                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-user"></i>
                                Full Name
                            </div>
                            <div class="info-value">{{ Auth::user()->name ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-envelope"></i>
                                Email Address
                            </div>
                            <div class="info-value">{{ Auth::user()->email ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-phone"></i>
                                Phone Number
                            </div>
                            <div class="info-value">{{ Auth::user()->phone ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Address
                            </div>
                            <div class="info-value">{{ Auth::user()->address ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-city"></i>
                                City
                            </div>
                            <div class="info-value">{{ Auth::user()->city ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-map"></i>
                                State
                            </div>
                            <div class="info-value">{{ Auth::user()->state ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-globe"></i>
                                Country
                            </div>
                            <div class="info-value">{{ Auth::user()->country ?? 'Not provided' }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-mail-bulk"></i>
                                Zip Code
                            </div>
                            <div class="info-value">{{ Auth::user()->zip ?? 'Not provided' }}</div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="content-card">
                    <div class="content-header">
                        <div class="icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h2>Quick Actions</h2>
                    </div>

                    <div class="quick-actions">
                        <a href="{{ route('front.pricing') }}" class="action-btn">
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <span>Buy Ticket</span>
                        </a>

                        <a href="{{ route('user.profile') }}" class="action-btn">
                            <div class="icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <span>Edit Profile</span>
                        </a>

                        <a href="{{ route('front.contact') }}" class="action-btn">
                            <div class="icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <span>Contact Support</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        iziToast.success({
            title: 'Success!',
            message: '{{ session('success') }}',
            position: 'topRight'
        });
    @endif

    @if(session('error'))
        iziToast.error({
            title: 'Error!',
            message: '{{ session('error') }}',
            position: 'topRight'
        });
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            iziToast.warning({
                title: 'Validation Error!',
                message: '{{ $error }}',
                position: 'topRight'
            });
        @endforeach
    @endif
});
</script>
@endsection
