@extends('front.layout.master')

@section('title', 'User Profile')

@section('main_content')
<!-- Navigation -->
<div class="container main-menu" id="navbar">
    <div class="row">
        <div class="col-lg-2 col-sm-12">
            <a href="{{ route('front.home') }}" id="logo" class="grid_2"> <img src="{{ asset('dist-front/images/logo.png') }}"> </a>
        </div>
        <div class="col-lg-10 col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="navContent" class="navbar-nav mr-auto navigation">
                        <li>
                            <a class="nav-link" href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Speakers</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Schedule</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Banner Section -->
<section class="page-title" style="background-image: url({{ asset('dist-front/images/banner.jpg') }}); background-size: cover; background-position: center; position: relative; padding: 150px 0; text-align: center;">
    <div class="auto-container">
        <h2 style="color: white; font-size: 48px; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Profile</h2>
        <ul class="page-breadcrumb" style="list-style: none; padding: 0; margin: 0; color: white; font-size: 16px;">
            <li style="display: inline; color: #6bc24a;"><a href="{{ route('front.home') }}" style="color: #6bc24a; text-decoration: none; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Home</a></li>
            <li style="display: inline; margin: 0 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);"> / </li>
            <li style="display: inline; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Profile</li>
        </ul>
    </div>
</section>

<!-- Profile Section -->
<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- Sidebar Side -->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <div class="sidebar-widget">
                        <div class="widget-content">
                            <ul class="user-links">
                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li><a href="#">My Tickets</a></li>
                                <li><a href="#">Messages</a></li>
                                <li class="current"><a href="{{ route('user.profile') }}">Profile</a></li>
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
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Photo Section -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Existing Photo:</strong></label>
                                        <div style="margin: 10px 0;">
                                            @if(Auth::user()->photo)
                                                <img src="{{ asset('uploads/' . Auth::user()->photo) }}" alt="Profile Photo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('uploads/default.png') }}" alt="Default Photo" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><strong>Change Photo:</strong></label>
                                        <input type="file" name="photo" class="form-control" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <!-- Name and Email Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Name *</strong></label>
                                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Email *</strong></label>
                                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone and Address Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Phone *</strong></label>
                                        <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Address *</strong></label>
                                        <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Country and State Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Country *</strong></label>
                                        <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>State *</strong></label>
                                        <input type="text" name="state" class="form-control" value="{{ Auth::user()->state }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- City and Zip Row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>City *</strong></label>
                                        <input type="text" name="city" class="form-control" value="{{ Auth::user()->city }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Zip Code *</strong></label>
                                        <input type="text" name="zip" class="form-control" value="{{ Auth::user()->zip }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" style="background-color: #6bc24a; border-color: #6bc24a; padding: 12px 30px; font-weight: bold;">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    color: #666;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 12px 15px;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #6bc24a;
    outline: none;
    box-shadow: 0 0 0 2px rgba(107, 194, 74, 0.2);
}
</style>
@endsection
