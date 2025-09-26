<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel - Sponsors</title>

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
                <li><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-hand-point-right"></i> <span>Home Counter</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speakers</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule Days</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedules</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speaker Schedule</span></a></li>
                <li class="active"><a class="nav-link" href="{{ route('admin_sponsor_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsors</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_sponsor_categories_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsor Categories</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
            </ul>
        </aside>
    </div>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sponsors</h1>
                <div class="section-header-button">
                    <a href="{{ route('admin_sponsor_create') }}" class="btn btn-primary">Add Sponsor</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Logo</th>
                                                <th>Featured Photo</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Website</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sponsors as $sponsor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($sponsor->logo && file_exists(public_path('uploads/'.$sponsor->logo)))
                                                        <img src="{{ asset('uploads/'.$sponsor->logo) }}" alt="{{ $sponsor->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('uploads/default.png') }}" alt="Default Logo" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($sponsor->featured_photo && file_exists(public_path('uploads/'.$sponsor->featured_photo)))
                                                        <img src="{{ asset('uploads/'.$sponsor->featured_photo) }}" alt="{{ $sponsor->name }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('uploads/default.png') }}" alt="Default Photo" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @endif
                                                </td>
                                                <td>{{ $sponsor->name }}</td>
                                                <td>
                                                    <span class="badge badge-primary">{{ $sponsor->sponsorCategory->name }}</span>
                                                </td>
                                                <td>{{ $sponsor->email ?? 'N/A' }}</td>
                                                <td>{{ $sponsor->phone ?? 'N/A' }}</td>
                                                <td>
                                                    @if($sponsor->website)
                                                        <a href="{{ $sponsor->website }}" target="_blank" class="btn btn-sm btn-info">Visit</a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_sponsor_edit', $sponsor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('admin_sponsor_destroy', $sponsor->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>

</body>
</html>
