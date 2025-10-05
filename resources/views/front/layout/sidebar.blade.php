<div class="user-sidebar">
    <ul class="list-group list-group-flush">

        <li class="list-group-item {{ Route::is('user.dashboard') ? 'active-item' : '' }}">
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
        </li>

        <li class="list-group-item {{ Route::is('attendee.tickets') ? 'active-item' : '' }}">
            <a href="{{ route('attendee.tickets') }}">My Tickets</a>
        </li>

        <li class="list-group-item {{ Route::is('user.message') ? 'active-item' : '' }}">
            <a href="{{ route('user.message') }}">Messages</a>
        </li>

        <li class="list-group-item {{ Route::is('user.profile') ? 'active-item' : '' }}">
            <a href="{{ route('user.profile') }}">Profile</a>
        </li>

        <li class="list-group-item">
            <a href="{{ route('logout') }}">Logout</a>
        </li>
    </ul>
</div>
