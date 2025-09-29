@extends('front.layout.master')

@section('title', 'User Dashboard')

@section('content')
@include('front.layout.navigation')

<!-- Banner Section -->
<section class="page-title" style="background-image: url({{ asset('dist-front/images/banner.jpg') }}); background-size: cover; background-position: center; position: relative; padding: 150px 0; text-align: center;">
    <div class="auto-container">
        <h2 style="color: white; font-size: 48px; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Dashboard</h2>
        <ul class="page-breadcrumb" style="list-style: none; padding: 0; margin: 0; color: white; font-size: 16px;">
            <li style="display: inline; color: #6bc24a;"><a href="{{ route('front.home') }}" style="color: #6bc24a; text-decoration: none; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Home</a></li>
            <li style="display: inline; margin: 0 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);"> / </li>
            <li style="display: inline; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Dashboard</li>
        </ul>
    </div>
</section>

<!-- Dashboard Section -->
<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Sidebar Side -->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <div class="sidebar-widget">
                        <div class="widget-content">
                            <ul class="user-links">
                                <li class="current"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li><a href="#">My Tickets</a></li>
                                <li><a href="#">Messages</a></li>
                                <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Content Side -->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="blog-detail">
                    <div class="inner-box">
                        <h3>User Detail:</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><strong>Name:</strong></td>
                                        <td>{{ Auth::user()->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td>{{ Auth::user()->email ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone:</strong></td>
                                        <td>{{ Auth::user()->phone ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Address:</strong></td>
                                        <td>{{ Auth::user()->address ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>State:</strong></td>
                                        <td>{{ Auth::user()->state ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>City:</strong></td>
                                        <td>{{ Auth::user()->city ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Country:</strong></td>
                                        <td>{{ Auth::user()->country ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Zip Code:</strong></td>
                                        <td>{{ Auth::user()->zip ?? 'N/A' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.user-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.user-links li {
    border-bottom: 1px solid #e5e5e5;
}

.user-links li a {
    display: block;
    padding: 15px 20px;
    color: #333;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.user-links li.current a,
.user-links li a:hover {
    background-color: #6bc24a;
    color: #fff;
}

.user-links li:first-child {
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.user-links li:last-child {
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    border-bottom: none;
}

.sidebar-widget {
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.blog-detail .inner-box {
    background: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.blog-detail h3 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: 600;
}

.table td {
    padding: 12px 15px;
    vertical-align: middle;
}

.table td:first-child {
    background-color: #f8f9fa;
    width: 200px;
    font-weight: 600;
}
</style>

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

@endsection
