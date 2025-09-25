<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel - Edit Home Counter Information</title>

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

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

<div class="main-wrapper">

    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('admin')->user()->name }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Logged in 5 min ago</div>
                    <a href="{{ route('admin_profile') }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin_logout') }}" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{ route('admin_dashboard') }}">CP</a>
            </div>
            <ul class="sidebar-menu">
                <li><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-hand-point-right"></i> <span>Home Banner</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-hand-point-right"></i> <span>Home Welcome</span></a></li>
                <li class="active"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-hand-point-right"></i> <span>Home Counter</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speakers</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule Days</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedules</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speaker Schedule</span></a></li>
                <li><a class="nav-link" href="{{ route('admin.sponsor-categories.index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsor Categories</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
            </ul>
        </aside>
    </div>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Home Counter Information</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if($homeCounter)
                                <form action="{{ route('admin_home_counter_update', $homeCounter->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <!-- Item 1 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Item 1</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label class="form-label">Icon *</label>
                                                        <input type="text" class="form-control" name="item1_icon" value="{{ $homeCounter->item1_icon }}" required>
                                                        <small class="form-text text-muted">Example: fa fa-calendar</small>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Number *</label>
                                                        <input type="number" class="form-control" name="item1_number" value="{{ $homeCounter->item1_number }}" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Title *</label>
                                                        <input type="text" class="form-control" name="item1_title" value="{{ $homeCounter->item1_title }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item 2 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Item 2</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label class="form-label">Icon *</label>
                                                        <input type="text" class="form-control" name="item2_icon" value="{{ $homeCounter->item2_icon }}" required>
                                                        <small class="form-text text-muted">Example: fa fa-user</small>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Number *</label>
                                                        <input type="number" class="form-control" name="item2_number" value="{{ $homeCounter->item2_number }}" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Title *</label>
                                                        <input type="text" class="form-control" name="item2_title" value="{{ $homeCounter->item2_title }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Item 3 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Item 3</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label class="form-label">Icon *</label>
                                                        <input type="text" class="form-control" name="item3_icon" value="{{ $homeCounter->item3_icon }}" required>
                                                        <small class="form-text text-muted">Example: fa fa-users</small>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Number *</label>
                                                        <input type="number" class="form-control" name="item3_number" value="{{ $homeCounter->item3_number }}" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Title *</label>
                                                        <input type="text" class="form-control" name="item3_title" value="{{ $homeCounter->item3_title }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Item 4 -->
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Item 4</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label class="form-label">Icon *</label>
                                                        <input type="text" class="form-control" name="item4_icon" value="{{ $homeCounter->item4_icon }}" required>
                                                        <small class="form-text text-muted">Example: fa fa-th-list</small>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Number *</label>
                                                        <input type="number" class="form-control" name="item4_number" value="{{ $homeCounter->item4_number }}" required>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Title *</label>
                                                        <input type="text" class="form-control" name="item4_title" value="{{ $homeCounter->item4_title }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status & Action -->
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>Settings</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-4">
                                                        <label class="form-label">Background Image</label>
                                                        @if($homeCounter->background)
                                                            <div class="mb-2">
                                                                <img src="{{ asset($homeCounter->background) }}" alt="Current Background" class="img-thumbnail" style="max-width: 200px; height: auto;">
                                                                <p class="text-muted mt-1">Current Background</p>
                                                            </div>
                                                        @else
                                                            <div class="mb-2">
                                                                <img src="{{ asset('dist-front/images/counter-bg.jpg') }}" alt="Default Background" class="img-thumbnail" style="max-width: 200px; height: auto;">
                                                                <p class="text-muted mt-1">Default Background</p>
                                                            </div>
                                                        @endif
                                                        <input type="file" class="form-control" name="background" accept="image/*">
                                                        <small class="form-text text-muted">Upload new background image (Max: 10MB). Supported formats: jpeg, png, jpg, gif</small>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label class="form-label">Status *</label>
                                                        <select name="status" class="form-control" required>
                                                            <option value="show" {{ $homeCounter->status == 'show' ? 'selected' : '' }}>Show</option>
                                                            <option value="hide" {{ $homeCounter->status == 'hide' ? 'selected' : '' }}>Hide</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <button type="submit" class="btn btn-primary">Update Home Counter</button>
                                                        <a href="{{ route('admin_dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <div class="alert alert-warning">
                                    <p>No home counter data found. Please run the seeder first:</p>
                                    <code>php artisan db:seed --class=HomeCounterSeeder</code>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2025 <div class="bullet"></div> All Rights Reserved
        </div>
        <div class="footer-right">
            Admin Panel
        </div>
    </div>

</div>

<script src="{{ asset('dist/js/stisla.js') }}"></script>
<script src="{{ asset('dist/js/scripts.js') }}"></script>

</body>
</html>
