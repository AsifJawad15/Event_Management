<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel - Schedule Days</title>

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
            <div class="sidebar-brand-sm">
                <a href="{{ route('admin_dashboard') }}">CP</a>
            </div>
            <ul class="sidebar-menu">
                <li><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-hand-point-right"></i> <span>Home Banner</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-hand-point-right"></i> <span>Home Welcome</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-hand-point-right"></i> <span>Home Counter</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speakers</span></a></li>
                <li class="active"><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule Days</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedules</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speaker Schedule</span></a></li>
                <li><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
            </ul>
        </aside>
    </div>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Schedule Days</h1>
                <div class="section-header-button">
                    <a href="{{ route('admin_schedule_day_create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>Order</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($scheduleDays as $scheduleDay)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $scheduleDay->day }}</td>
                                                <td>{{ date('M d, Y', strtotime($scheduleDay->date1)) }}</td>
                                                <td>{{ $scheduleDay->order1 }}</td>
                                                <td>
                                                    <a href="{{ route('admin_schedule_day_edit', $scheduleDay->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('admin_schedule_day_destroy', $scheduleDay->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this schedule day?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
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

    <div class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2025 <div class="bullet"></div> All Rights Reserved
        </div>
        <div class="footer-right">
            Admin Panel
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": -1 }
            ],
            "order": [[ 0, "asc" ]]
        });
    });
</script>

<script src="{{ asset('dist/js/stisla.js') }}"></script>
<script src="{{ asset('dist/js/scripts.js') }}"></script>

</body>
</html>
