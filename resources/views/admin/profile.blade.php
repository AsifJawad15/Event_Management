<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel - Edit Profile</title>

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
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-warning">Front End</a>
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

        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('admin_dashboard') }}"></a>
                </div>

                <ul class="sidebar-menu">

                    <li class=""><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                        <ul class="dropdown-menu">
                            <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                            <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                        </ul>
                    </li>

                    <li class=""><a class="nav-link" href="#"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

                    <li class=""><a class="nav-link" href="#"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

                    <li class=""><a class="nav-link" href="#"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

                    <li class=""><a class="nav-link" href="#"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li>

                </ul>
            </aside>
        </div>

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Edit Profile</h1>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_profile_update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                @if(Auth::guard('admin')->user()->photo)
                                                    <img src="{{ asset('uploads/' . Auth::guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                                @else
                                                    <img src="{{ asset('uploads/admin.jpg') }}" alt="" class="profile-photo w_100_p">
                                                @endif
                                                <input type="file" class="mt_10" name="photo">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="mb-4">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name ?? '' }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Email *</label>
                                                    <input type="email" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email ?? '' }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="new_password" placeholder="Leave blank to keep current password">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Retype Password</label>
                                                    <input type="password" class="form-control" name="retype_password">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Update</button>
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

    </div>
</div>

<script src="{{ asset('dist/js/scripts.js') }}"></script>
<script src="{{ asset('dist/js/custom.js') }}"></script>

<script>
@if($errors->any())
    @foreach ($errors->all() as $error)
        iziToast.show({
            title: 'Validation Error',
            message: '{{ $error }}',
            color: 'red',
            position: 'topRight',
            timeout: 5000,
            progressBar: true,
            close: true,
            closeOnClick: true
        });
    @endforeach
@endif

@if(session('success'))
    iziToast.show({
        title: 'Success',
        message: '{{ session('success') }}',
        color: 'green',
        position: 'topRight',
        timeout: 5000,
        progressBar: true,
        close: true,
        closeOnClick: true
    });
@endif

@if(session('error'))
    iziToast.show({
        title: 'Error',
        message: '{{ session('error') }}',
        color: 'red',
        position: 'topRight',
        timeout: 5000,
        progressBar: true,
        close: true,
        closeOnClick: true
    });
@endif
</script>

</body>
</html>
