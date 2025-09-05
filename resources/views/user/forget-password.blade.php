@extends('front.layout.master')

@section('title', 'Forget Password')

@section('content')
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
                        <li class="member-login-button">
                            <div class="inner">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Forget Password</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Forget Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forget Password Section -->
<div id="Loginsection" class="pt_50 pb_50 gray Loginsection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-register-bg">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <form action="{{ route('forget_password_submit') }}" class="registerd" method="post">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" name="email" placeholder="Email Address" type="email" required value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit">
                                        SUBMIT
                                    </button>
                                </div>
                                <div class="form-group bottom">
                                    <a href="{{ route('login') }}">Back to login page</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
