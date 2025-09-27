<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel - Edit Home Banner Information</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font_awesome_5_free.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/fontawesome-iconpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap4-toggle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/air-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

    <script src="{{ asset('dist/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/popper.min.js') }}"></script>
    <script src="{{ asset('dist/js/tooltip.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('dist/js/stisla.js') }}"></script>
    <script src="{{ asset('dist/js/jscolor.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('dist/js/fontawesome-iconpicker.js') }}"></script>
    <script src="{{ asset('dist/js/air-datepicker.min.js') }}"></script>
    <script src="{{ asset('dist/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap4-toggle.min.js') }}"></script>
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right justify-content-end rightsidetop">
                <li class="nav-link">
                    <a href="{{ route('front.home') }}" target="_blank" class="btn btn-warning">Front End</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::guard('admin')->user()->photo)
                            <img alt="image" src="{{ asset('uploads/' . Auth::guard('admin')->user()->photo) }}" class="rounded-circle-custom">
                        @else
                            <img alt="image" src="{{ asset('uploads/user.jpg') }}" class="rounded-circle-custom">
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('admin_profile') }}"><i class="far fa-user"></i> Edit Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin_logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="main-sidebar">        @include('admin.layout.sidebar')
        </div>

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Edit Home Banner Information</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_home_banner_update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                @if($homeBanner && $homeBanner->background)
                                                    <img src="{{ asset($homeBanner->background) }}" alt="Current Background" class="profile-photo w_100_p">
                                                    <p class="text-muted mt-2">Current Background</p>
                                                @else
                                                    <img src="{{ asset('dist-front/images/banner-home.jpg') }}" alt="Default Background" class="profile-photo w_100_p">
                                                    <p class="text-muted mt-2">Default Background</p>
                                                @endif
                                                <input type="file" class="mt_10" name="background" accept="image/*">
                                                <small class="form-text text-muted">Upload new background image (Max: 10MB)</small>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="heading" value="{{ $homeBanner->heading ?? 'Event and Conference Website' }}" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Subheading</label>
                                                    <input type="text" class="form-control" name="subheading" value="{{ $homeBanner->subheading ?? 'December 10, 2025, California' }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Description Text</label>
                                                    <textarea class="form-control" name="text" rows="4">{{ $homeBanner->text ?? 'Join us at our next networking event and conference! Connect with industry professionals, engage in insightful discussions, and attend hands-on workshops.' }}</textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Event Date *</label>
                                                            <input type="date" class="form-control" name="event_date"
                                                                   value="{{ $homeBanner && $homeBanner->event_date ? \Carbon\Carbon::parse($homeBanner->event_date)->format('Y-m-d') : '2025-09-07' }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Event Time *</label>
                                                            <input type="time" class="form-control" name="event_time"
                                                                   value="{{ $homeBanner && $homeBanner->event_time ? \Carbon\Carbon::parse($homeBanner->event_time)->format('H:i') : '13:00' }}" required>
                                                            <small class="form-text text-muted">Time in GMT+6 (Bangladesh Standard Time)</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Button Text</label>
                                                            <input type="text" class="form-control" name="button_text" value="{{ $homeBanner->button_text ?? 'BUY TICKETS' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Button URL</label>
                                                            <input type="text" class="form-control" name="button_url" value="{{ $homeBanner->button_url ?? '/buy' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update Home Banner</button>
                                                    <a href="{{ route('admin_dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
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
        </div>

        <div class="main-footer">
            <div class="footer-left">
                Copyright &copy; {{ date('Y') }} <div class="bullet"></div> All Rights Reserved
            </div>
            <div class="footer-right">
                Version 1.0
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('dist/js/scripts.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>

<script>
    // iziToast notifications
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
</script>

</body>
</html>
