@extends('front.layout.master')

@section('title', 'User Profile')

@section('main_content')
@include('front.layout.dark-nav')

<style>
/* Modern Profile Page Styling */
:root {
    --primary: #{{ $setting_data->theme_color }};
    --secondary: #{{ $setting_data->theme_color }}dd;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
    --glow: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.6);
}

.profile-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 80px 0 60px;
}

/* Hero Banner */
.profile-hero {
    background: linear-gradient(135deg, rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1) 0%, rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.05) 100%);
    border-radius: 30px;
    padding: 60px 40px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    text-align: center;
    animation: slideDown 0.8s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.profile-hero h2 {
    color: white;
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.page-breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0;
    color: white;
    font-size: 16px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.page-breadcrumb li a {
    color: var(--primary);
    text-decoration: none;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
    transition: all 0.3s ease;
}

.page-breadcrumb li a:hover {
    color: #fff;
}

/* Grid Layout */
.profile-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 30px;
}

/* Sidebar */
.profile-sidebar {
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
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    position: sticky;
    top: 100px;
}

.nav-menu {
    list-style: none;
    padding: 0;
    margin: 0;
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
    background: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    color: #fff;
    padding-left: 30px;
    box-shadow: 0 4px 15px var(--glow);
}

.nav-menu a i {
    font-size: 20px;
    width: 24px;
    transition: all 0.3s ease;
}

.nav-menu a:hover i {
    transform: scale(1.2) rotate(5deg);
}

/* Content */
.profile-content {
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
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
}

.content-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
}

.content-header .icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 25px var(--glow);
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

/* Photo Upload Section */
.photo-section {
    background: rgba(15, 23, 42, 0.6);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 30px;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
    text-align: center;
}

.photo-preview {
    width: 150px;
    height: 150px;
    margin: 0 auto 20px;
    position: relative;
}

.photo-preview img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid var(--primary);
    box-shadow: 0 0 30px var(--glow);
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

.photo-upload-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.6);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
    font-weight: 600;
}

/* Form Styling */
.form-group {
    margin-bottom: 25px;
}

.form-group label {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 600;
    margin-bottom: 10px;
    display: block;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-control {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    border-radius: 12px;
    padding: 15px 20px;
    font-size: 15px;
    color: #fff;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px var(--glow);
    background: rgba(15, 23, 42, 0.8);
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.4);
}

/* Submit Button */
.btn-submit {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    padding: 15px 40px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px var(--glow);
    position: relative;
    overflow: hidden;
}

.btn-submit::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.btn-submit:hover::before {
    left: 100%;
}

.btn-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px var(--glow);
}

.btn-submit i {
    margin-left: 8px;
}

/* Alerts */
.alert {
    border-radius: 15px;
    padding: 15px 20px;
    margin-bottom: 25px;
    border: none;
    animation: slideDown 0.5s ease;
}

.alert-success {
    background: rgba(34, 197, 94, 0.2);
    color: #86efac;
    border-left: 4px solid #22c55e;
}

.alert-danger {
    background: rgba(239, 68, 68, 0.2);
    color: #fca5a5;
    border-left: 4px solid #ef4444;
}

/* Responsive */
@media (max-width: 1024px) {
    .profile-grid {
        grid-template-columns: 1fr;
    }

    .sidebar-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .profile-hero {
        padding: 40px 20px;
    }

    .profile-hero h2 {
        font-size: 36px;
    }

    .content-card {
        padding: 25px;
    }
}
</style>

<div class="profile-wrapper">
    <div class="container">
        <!-- Hero Banner -->
        <div class="profile-hero">
            <h2>Profile Settings</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>/</li>
                <li>Profile</li>
            </ul>
        </div>

        <!-- Main Grid -->
        <div class="profile-grid">
            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="sidebar-card">
                    <ul class="nav-menu">
                        <li>
                            <a href="{{ route('user.dashboard') }}">
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
                            <a href="{{ route('user.profile') }}" class="active">
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
            <div class="profile-content">
                <div class="content-card">
                    <div class="content-header">
                        <div class="icon">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h2>Update Your Profile</h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #86efac;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i>
                            <ul class="mb-0" style="padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #fca5a5;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Photo Section -->
                        <div class="photo-section">
                            <div class="photo-upload-label">
                                <i class="fas fa-camera"></i> Profile Photo
                            </div>
                            <div class="photo-preview">
                                @if(Auth::user()->photo)
                                    <img src="{{ asset('uploads/' . Auth::user()->photo) }}" alt="Profile Photo" id="photoPreview">
                                @else
                                    <img src="{{ asset('uploads/default.png') }}" alt="Default Photo" id="photoPreview">
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="file" name="photo" class="form-control" accept="image/*" id="photoInput">
                            </div>
                        </div>

                        <!-- Name and Email Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-user"></i> Full Name *</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required placeholder="Enter your full name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Email Address *</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required placeholder="Enter your email">
                                </div>
                            </div>
                        </div>

                        <!-- Phone and Address Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-phone"></i> Phone Number *</label>
                                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required placeholder="Enter your phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-map-marker-alt"></i> Address *</label>
                                    <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" required placeholder="Enter your address">
                                </div>
                            </div>
                        </div>

                        <!-- Country and State Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-globe"></i> Country *</label>
                                    <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}" required placeholder="Enter your country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-map"></i> State *</label>
                                    <input type="text" name="state" class="form-control" value="{{ Auth::user()->state }}" required placeholder="Enter your state">
                                </div>
                            </div>
                        </div>

                        <!-- City and Zip Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-city"></i> City *</label>
                                    <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}" required placeholder="Enter your city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><i class="fas fa-mail-bulk"></i> Zip Code *</label>
                                    <input type="text" name="zip" class="form-control" value="{{ Auth::user()->zip }}" required placeholder="Enter your zip code">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn-submit">
                                        <i class="fas fa-save"></i> Update Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Photo preview on file select
document.getElementById('photoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('photoPreview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>

@endsection
