<style>
    /* Modern Sidebar Styling */
    .main-sidebar {
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%) !important;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15) !important;
        transition: all 0.3s ease;
    }

    .sidebar-brand {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        padding: 25px 20px !important;
        border-bottom: 3px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .sidebar-brand:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%) !important;
        box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
    }

    .sidebar-brand a {
        color: white !important;
        font-size: 22px !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .sidebar-brand a:before {
        content: "🎯";
        font-size: 24px;
    }

    /* Sidebar Menu Items */
    .sidebar-menu > li > a {
        color: #cbd5e1 !important;
        padding: 14px 20px !important;
        border-left: 4px solid transparent;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .sidebar-menu > li > a:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.2), transparent);
        transition: width 0.3s ease;
        z-index: 0;
    }

    .sidebar-menu > li > a:hover:before {
        width: 100%;
    }

    .sidebar-menu > li > a:hover {
        color: #ffffff !important;
        background: rgba(102, 126, 234, 0.15) !important;
        border-left-color: #667eea;
        transform: translateX(5px);
        padding-left: 25px !important;
    }

    .sidebar-menu > li > a i {
        color: #667eea;
        font-size: 18px;
        margin-right: 12px;
        transition: all 0.3s ease;
        width: 24px;
        text-align: center;
    }

    .sidebar-menu > li > a:hover i {
        color: #fff;
        transform: scale(1.2) rotate(5deg);
    }

    .sidebar-menu > li > a span {
        position: relative;
        z-index: 1;
        font-weight: 500;
    }

    /* Active Menu Item */
    .sidebar-menu > li.active > a {
        background: linear-gradient(90deg, rgba(102, 126, 234, 0.3), rgba(118, 75, 162, 0.2)) !important;
        color: #ffffff !important;
        border-left-color: #667eea;
        box-shadow: inset 0 0 20px rgba(102, 126, 234, 0.2);
    }

    .sidebar-menu > li.active > a i {
        color: #fff !important;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }

    /* Dropdown Menu */
    .sidebar-menu .dropdown-menu {
        background: rgba(15, 23, 42, 0.8) !important;
        border-left: 3px solid #667eea;
        margin-top: 5px;
        margin-bottom: 5px;
        backdrop-filter: blur(10px);
        display: none;
    }

    .sidebar-menu .dropdown-menu li a {
        color: #94a3b8 !important;
        padding: 10px 20px 10px 45px !important;
        transition: all 0.3s ease;
        position: relative;
    }

    .sidebar-menu .dropdown-menu li a:before {
        content: '▸';
        position: absolute;
        left: 25px;
        opacity: 0;
        transition: all 0.3s ease;
    }

    .sidebar-menu .dropdown-menu li a:hover {
        color: #ffffff !important;
        background: rgba(102, 126, 234, 0.2) !important;
        padding-left: 50px !important;
    }

    .sidebar-menu .dropdown-menu li a:hover:before {
        opacity: 1;
        left: 30px;
    }

    .sidebar-menu .dropdown-menu li a i {
        color: #667eea;
        font-size: 14px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .sidebar-menu .dropdown-menu li a:hover i {
        color: #fff;
        transform: translateX(3px);
    }

    .sidebar-menu .dropdown-menu li.active a {
        background: rgba(102, 126, 234, 0.3) !important;
        color: #ffffff !important;
        border-left: 3px solid #667eea;
    }

    /* Dropdown Toggle Arrow */
    .sidebar-menu .has-dropdown:after {
        transition: all 0.3s ease;
    }

    .sidebar-menu .nav-item.active .has-dropdown:after {
        transform: rotate(90deg);
    }

    /* Scrollbar Styling */
    .sidebar-wrapper::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar-wrapper::-webkit-scrollbar-track {
        background: rgba(15, 23, 42, 0.5);
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #667eea, #764ba2);
        border-radius: 10px;
    }

    .sidebar-wrapper::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #764ba2, #667eea);
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .main-sidebar {
            transform: translateX(-250px);
        }

        .main-sidebar.active {
            transform: translateX(0);
        }

        .sidebar-menu > li > a:hover {
            transform: translateX(0);
            padding-left: 20px !important;
        }
    }

    /* Section Dividers */
    .sidebar-menu > li:not(:last-child) {
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Badge for notifications (optional) */
    .sidebar-badge {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 11px;
        font-weight: 700;
        margin-left: auto;
        animation: badge-pulse 2s infinite;
    }

    @keyframes badge-pulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(245, 87, 108, 0.7);
        }
        50% {
            box-shadow: 0 0 0 5px rgba(245, 87, 108, 0);
        }
    }
</style>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper" class="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">EVENTO</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}">EV</a>
        </div>

        <ul class="sidebar-menu">

                    <li class="{{ Request::is('admin/dashboard' )?'active':''}}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

                    <li class="{{ Request::is('admin/events*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_event_index') }}"><i class="fas fa-calendar-check"></i> <span>Events</span></a></li>

                    <li class="nav-item dropdown {{ Request::is('admin/home-banner') || Request::is('admin/home-welcome') || Request::is('admin/homecounter') || Request::is('admin/home-speaker') || Request::is('admin/home-pricing') || Request::is('admin/home-blog') || Request::is('admin/home-sponsor') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Home Section</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/home-banner' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-image"></i> <span>Home Banner</span></a></li>
                            <li class="{{ Request::is('admin/home-welcome' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-handshake"></i> <span>Home Welcome</span></a></li>
                            <li class="{{ Request::is('admin/homecounter' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-chart-bar"></i> <span>Home Counter</span></a></li>
                            <li class="{{ Request::is('admin/home-speaker' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_speaker') }}"><i class="fas fa-users"></i> <span>Home Speaker</span></a></li>
                            <li class="{{ Request::is('admin/home-pricing' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_pricing') }}"><i class="fas fa-dollar-sign"></i> <span>Home Pricing</span></a></li>
                            <li class="{{ Request::is('admin/home-blog' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_blog') }}"><i class="fas fa-blog"></i> <span>Home Blog</span></a></li>
                            <li class="{{ Request::is('admin/home-sponsor' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_sponsor') }}"><i class="fas fa-handshake"></i> <span>Home Sponsor</span></a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown {{ Request::is('admin/setting/*') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i><span>Settings</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/setting/logo' )?'active':''}}"><a class="nav-link" href="{{ route('admin_setting_logo') }}"><i class="fas fa-image"></i> <span>Logo</span></a></li>
                            <li class="{{ Request::is('admin/setting/favicon' )?'active':''}}"><a class="nav-link" href="{{ route('admin_setting_favicon') }}"><i class="fas fa-star"></i> <span>Favicon</span></a></li>
                            <li class="{{ Request::is('admin/setting/banner' )?'active':''}}"><a class="nav-link" href="{{ route('admin_setting_banner') }}"><i class="fas fa-image"></i> <span>Banner</span></a></li>
                            <li class="{{ Request::is('admin/setting/footer' )?'active':''}}"><a class="nav-link" href="{{ route('admin_setting_footer') }}"><i class="fas fa-info-circle"></i> <span>Footer</span></a></li>
                            <li class="{{ Request::is('admin/setting/ticket' )?'active':''}}"><a class="nav-link" href="{{ route('admin_setting_ticket') }}"><i class="fas fa-ticket-alt"></i> <span>Ticket</span></a></li>
                            <li class="{{ Request::is('admin/setting/theme-color' )?'active':''}}"><a class="nav-link" href="{{ route('admin_setting_theme_color') }}"><i class="fas fa-palette"></i> <span>Theme Color</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('admin/speakers*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-microphone"></i> <span>Speakers</span></a></li>

                    <li class="{{ Request::is('admin/schedule-days*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-calendar-alt"></i> <span>Schedule Days</span></a></li>

                    <li class="{{ Request::is('admin/schedules*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-clock"></i> <span>Schedules</span></a></li>

                    <li class="{{ Request::is('admin/speaker_schedule_index*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-calendar-check"></i> <span>Speaker Schedule</span></a></li>

                    <li class="{{ Request::is('admin/sponsors*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_sponsor_index') }}"><i class="fas fa-handshake"></i> <span>Sponsors</span></a></li>

                    <li class="{{ Request::is('admin/sponsor-categories*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_sponsor_categories_index') }}"><i class="fas fa-layer-group"></i> <span>Sponsor Categories</span></a></li>

                    <li class="{{ Request::is('admin/organisers*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_organiser_index') }}"><i class="fas fa-user-tie"></i> <span>Organisers</span></a></li>

                    <li class="{{ Request::is('admin/photo-gallery*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_photo_index') }}"><i class="fas fa-images"></i> <span>Photo Gallery</span></a></li>

                    <li class="{{ Request::is('admin/video-gallery*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_video_index') }}"><i class="fas fa-video"></i> <span>Video Gallery</span></a></li>

                    <li class="{{ Request::is('admin/faq*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_faq_index') }}"><i class="fas fa-question-circle"></i> <span>FAQ Management</span></a></li>

                    <li class="{{ Request::is('admin/packages*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_package_index') }}"><i class="fas fa-box"></i> <span>Packages</span></a></li>

                    <li class="{{ Request::is('admin/tickets*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_ticket_index') }}"><i class="fas fa-ticket-alt"></i> <span>Ticket Management</span></a></li>

                    <li class="{{ Request::is('admin/attendees*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_attendee_index') }}"><i class="fas fa-users"></i> <span>Attendee Management</span></a></li>

                    <li class="{{ Request::is('admin/message*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_message_index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>

                    <li class="{{ Request::is('admin/subscribers*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_subscriber_index') }}"><i class="fas fa-envelope-open-text"></i> <span>Subscribers</span></a></li>

                    <li class="nav-item dropdown {{ Request::is('admin/contact-page') || Request::is('admin/term-page') || Request::is('admin/privacy-page') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Other Pages</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/contact-page' )?'active':''}}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-address-book"></i> <span>Contact Page</span></a></li>
                            <li class="{{ Request::is('admin/term-page' )?'active':''}}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fas fa-file-contract"></i> <span>Terms Page</span></a></li>
                            <li class="{{ Request::is('admin/privacy-page' )?'active':''}}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-user-shield"></i> <span>Privacy Page</span></a></li>
                        </ul>
                    </li>

            <li class="{{ Request::is('admin/profile' )?'active':''}}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-user-cog"></i> <span>Profile</span></a></li>

        </ul>
    </aside>
</div>

<script>
$(document).ready(function() {
    // Handle dropdown toggles
    $('.sidebar-menu .has-dropdown').on('click', function(e) {
        e.preventDefault();

        var parent = $(this).parent('.nav-item');
        var dropdownMenu = parent.find('.dropdown-menu');

        // Close other dropdowns
        $('.sidebar-menu .nav-item.dropdown').not(parent).removeClass('active').find('.dropdown-menu').slideUp(300);

        // Toggle current dropdown
        parent.toggleClass('active');
        dropdownMenu.slideToggle(300);
    });

    // Keep dropdown open if current page is in it
    $('.sidebar-menu .nav-item.dropdown').each(function() {
        if ($(this).find('.dropdown-menu li.active').length > 0) {
            $(this).addClass('active');
            $(this).find('.dropdown-menu').show();
        }
    });
});
</script>
