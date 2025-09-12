<div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('admin_dashboard') }}"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class="{{ Request::is('admin/dashboard' )?'active':''}}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

                    <li class="{{ Request::is('admin/home-banner' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-hand-point-right"></i> <span>Home Banner</span></a></li>

                    <li class="{{ Request::is('admin/home-welcome' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-hand-point-right"></i> <span>Home Welcome</span></a></li>

                    <li class="{{ Request::is('admin/homecounter' )?'active':''}}"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-hand-point-right"></i> <span>Home Counter</span></a></li>

                    <li class="{{ Request::is('admin/profile' )?'active':''}}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>

                </ul>
            </aside>
        </div>
