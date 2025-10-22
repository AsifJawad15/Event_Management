@extends('front.layout.master')

@section('title', 'Messages')

@section('main_content')
@include('front.layout.dark-nav')

<style>
/* Modern Messages Page Styling */
:root {
    --primary: #{{ $setting_data->theme_color }};
    --secondary: #{{ $setting_data->theme_color }}dd;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
    --glow: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.6);
}

.messages-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 80px 0 60px;
}

/* Hero Banner */
.messages-hero {
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

.messages-hero h2 {
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
.messages-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 30px;
}

/* Sidebar */
.messages-sidebar {
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
}

/* Content */
.messages-content {
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

.message-heading {
    font-size: 24px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.message-heading::before {
    content: '';
    width: 4px;
    height: 30px;
    background: linear-gradient(180deg, var(--primary), var(--secondary));
    border-radius: 2px;
}

/* Message Form */
.form-control {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.2);
    border-radius: 12px;
    padding: 15px 20px;
    font-size: 15px;
    color: #fff;
    transition: all 0.3s ease;
    resize: vertical;
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

.h_100 {
    min-height: 120px;
}

.btn-success {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    border: none;
    padding: 12px 35px;
    border-radius: 12px;
    font-weight: 700;
    font-size: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px var(--glow);
}

.btn-success:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px var(--glow);
    color: white;
}

/* Message Items */
.mt_40 {
    margin-top: 40px;
}

.message-item {
    background: rgba(15, 23, 42, 0.6);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 20px;
    border: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
    transition: all 0.3s ease;
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.message-item:hover {
    border-color: rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.4);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    transform: translateY(-3px);
}

.message-item-admin-border {
    border-left: 4px solid var(--primary);
    background: linear-gradient(135deg, rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1) 0%, rgba(15, 23, 42, 0.6) 100%);
}

.message-top {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba({{ hexdec(substr($setting_data->theme_color, 0, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 2, 2)) }}, {{ hexdec(substr($setting_data->theme_color, 4, 2)) }}, 0.1);
}

.message-top .left img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--primary);
    box-shadow: 0 4px 15px var(--glow);
}

.message-top .right {
    flex: 1;
}

.message-top .right h4 {
    font-size: 18px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 5px 0;
}

.message-top .right h5 {
    font-size: 13px;
    font-weight: 600;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin: 0 0 5px 0;
}

.message-top .right .date-time {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.5);
}

.message-bottom {
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.8;
    font-size: 15px;
}

.message-bottom p {
    margin: 0;
}

/* Alert */
.alert-info {
    background: rgba(59, 130, 246, 0.2);
    color: #93c5fd;
    border: 1px solid rgba(59, 130, 246, 0.3);
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    font-size: 15px;
}

/* Responsive */
@media (max-width: 1024px) {
    .messages-grid {
        grid-template-columns: 1fr;
    }

    .sidebar-card {
        position: static;
    }
}

@media (max-width: 768px) {
    .messages-hero {
        padding: 40px 20px;
    }

    .messages-hero h2 {
        font-size: 36px;
    }

    .content-card {
        padding: 25px;
    }
}
</style>

<div class="messages-wrapper">
    <div class="container">
        <!-- Hero Banner -->
        <div class="messages-hero">
            <h2><i class="fas fa-envelope"></i> Messages</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li>/</li>
                <li>Messages</li>
            </ul>
        </div>

        <!-- Main Grid -->
        <div class="messages-grid">
            <!-- Sidebar -->
            <div class="messages-sidebar">
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
                            <a href="{{ route('user.message') }}" class="active">
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
            <div class="messages-content">
                <div class="content-card">
                    <h4 class="message-heading">
                        <i class="fas fa-pen"></i> Write Message
                    </h4>
                    <form action="{{ route('user.message.submit') }}" method="post">
                        @csrf
                        <div class="mb-2">
                            <textarea name="message" class="form-control h_100" cols="30" rows="10" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="mb-2 text-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-paper-plane"></i> Send Message
                            </button>
                        </div>
                    </form>

                    <h4 class="message-heading mt_40">
                        <i class="fas fa-comments"></i> All Messages
                    </h4>

                    @forelse($messages as $message)
                    @php
                    if($message->admin_id == 1) {
                        $message_class = 'message-item-admin-border';
                        $user_name = $admin->name;
                        $designation = 'Admin';
                        $photo = $admin->photo ?? 'default.png';
                    } else {
                        $message_class = '';
                        $user_name = Auth::guard('web')->user()->name;
                        $designation = 'Attendee';
                        $photo = Auth::guard('web')->user()->photo;
                        if($photo == '' || $photo == null) {
                            $photo = 'default.png';
                        }
                    }
                    @endphp
                    <div class="message-item {{ $message_class }}">
                        <div class="message-top">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$photo) }}" alt="{{ $user_name }}">
                            </div>
                            <div class="right">
                                <h4>{{ $user_name }}</h4>
                                <h5><i class="fas fa-user-tag"></i> {{ $designation }}</h5>
                                <div class="date-time">
                                    <i class="fas fa-clock"></i> {{ $message->created_at->format('M d, Y h:i A') }}
                                </div>
                            </div>
                        </div>
                        <div class="message-bottom">
                            <p>
                                {!! nl2br(e($message->message)) !!}
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No messages found. Start a conversation with the admin!
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
