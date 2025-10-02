<div class="main-sidebar">
                                <li class="{{ Request::is('admin/faq*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_faq_index') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ Management</span></a></li>

                    <li class="{{ Request::is('admin/testimonials*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_testimonial_index') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

                    <li class="{{ Request::is('admin/profile' )?'active':''}}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>ide id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('admin_dashboard') }}"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class="{{ Request::is('admin/dashboard' )?'active':''}}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

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

                    <li class="{{ Request::is('admin/speakers*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speakers</span></a></li>

                    <li class="{{ Request::is('admin/schedule-days*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule Days</span></a></li>

                    <li class="{{ Request::is('admin/schedules*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedules</span></a></li>

                    <li class="{{ Request::is('admin/speaker_schedule_index*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speaker Schedule</span></a></li>

                    <li class="{{ Request::is('admin/sponsors*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_sponsor_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsors</span></a></li>

                    <li class="{{ Request::is('admin/sponsor-categories*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_sponsor_categories_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsor Categories</span></a></li>

                    <li class="{{ Request::is('admin/organisers*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_organiser_index') }}"><i class="fas fa-hand-point-right"></i> <span>Organisers</span></a></li>

                    <li class="{{ Request::is('admin/accommodations*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_accommodation_index') }}"><i class="fas fa-hand-point-right"></i> <span>Accommodations</span></a></li>

                    <li class="{{ Request::is('admin/photo-gallery*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_photo_index') }}"><i class="fas fa-hand-point-right"></i> <span>Photo Gallery</span></a></li>

                    <li class="{{ Request::is('admin/video-gallery*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_video_index') }}"><i class="fas fa-hand-point-right"></i> <span>Video Gallery</span></a></li>

                    <li class="{{ Request::is('admin/faq*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_faq_index') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ Management</span></a></li>

                    <li class="{{ Request::is('admin/testimonials*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_testimonial_index') }}"><i class="fas fa-hand-point-right"></i> <span>Testimonials</span></a></li>

                    <li class="{{ Request::is('admin/posts*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_post_index') }}"><i class="fas fa-hand-point-right"></i> <span>Posts</span></a></li>

                    <li class="{{ Request::is('admin/packages*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_package_index') }}"><i class="fas fa-hand-point-right"></i> <span>Packages</span></a></li>

                    <li class="{{ Request::is('admin/tickets*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_ticket_index') }}"><i class="fas fa-ticket-alt"></i> <span>Ticket Management</span></a></li>

                    <li class="{{ Request::is('admin/attendees*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_attendee_index') }}"><i class="fas fa-users"></i> <span>Attendee Management</span></a></li>

                    <li class="{{ Request::is('admin/message*' )?'active':''}}"><a class="nav-link" href="{{ route('admin_message_index') }}"><i class="fas fa-envelope"></i> <span>Messages</span></a></li>

                    <li class="nav-item dropdown {{ Request::is('admin/contact-page') || Request::is('admin/term-page') || Request::is('admin/privacy-page') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Other Pages</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('admin/contact-page' )?'active':''}}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-address-book"></i> <span>Contact Page</span></a></li>
                            <li class="{{ Request::is('admin/term-page' )?'active':''}}"><a class="nav-link" href="#"><i class="fas fa-file-contract"></i> <span>Terms Page</span></a></li>
                            <li class="{{ Request::is('admin/privacy-page' )?'active':''}}"><a class="nav-link" href="#"><i class="fas fa-user-shield"></i> <span>Privacy Page</span></a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is('admin/profile' )?'active':''}}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>

                </ul>
            </aside>
        </div>
