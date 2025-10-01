<div class="user-menu">
    <div class="user-menu-header">
        <h5>{{ Auth::guard('web')->user()->name }}</h5>
        <small class="text-muted">{{ Auth::guard('web')->user()->email }}</small>
    </div>
    <ul class="user-menu-list">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('user.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="{{ Request::is('profile') ? 'active' : '' }}">
            <a href="{{ route('user.profile') }}">
                <i class="fas fa-user"></i> My Profile
            </a>
        </li>
        <li class="{{ Request::is('my-tickets') ? 'active' : '' }}">
            <a href="{{ route('attendee.tickets') }}">
                <i class="fas fa-ticket-alt"></i> My Tickets
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<style>
.user-menu {
    background: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.user-menu-header {
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
    margin-bottom: 15px;
}

.user-menu-header h5 {
    margin: 0;
    color: #333;
}

.user-menu-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.user-menu-list li {
    margin-bottom: 8px;
}

.user-menu-list li a {
    display: block;
    padding: 12px 15px;
    color: #666;
    text-decoration: none;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.user-menu-list li a:hover,
.user-menu-list li.active a {
    background-color: #6bc24a;
    color: white;
    text-decoration: none;
}

.user-menu-list li a i {
    margin-right: 10px;
    width: 16px;
}
</style>
