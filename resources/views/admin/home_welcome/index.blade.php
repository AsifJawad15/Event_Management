<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <title>Admin Panel - Edit Home Welcome Information</title>

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
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('dist/js/fontawesome-iconpicker.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap4-toggle.min.js') }}"></script>
    <script src="{{ asset('dist/js/air-datepicker.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('dist/js/cleave.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('dist/js/stisla.js') }}"></script>
    <script src="{{ asset('dist/js/scripts.js') }}"></script>
    <script src="{{ asset('dist/js/image-uploader.min.js') }}"></script>

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
                    <div class="dropdown-title">Admin Panel</div>
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

                <li class=""><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-hand-point-right"></i> <span>Home Banner</span></a></li>

                <li class="active"><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-hand-point-right"></i> <span>Home Welcome</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-hand-point-right"></i> <span>Home Counter</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speakers</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule Days</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedules</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speaker Schedule</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin.sponsor-categories.index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsor Categories</span></a></li>

                <li class=""><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>

            </ul>
        </aside>
    </div>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Home Welcome Information</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin_home_welcome_update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            @if($homeWelcome && $homeWelcome->photo)
                                                <img src="{{ asset($homeWelcome->photo) }}" alt="Current Photo" class="profile-photo w_100_p">
                                                <p class="text-muted mt-2">Current Photo</p>
                                            @else
                                                <img src="{{ asset('dist-front/images/about.jpg') }}" alt="Default Photo" class="profile-photo w_100_p">
                                                <p class="text-muted mt-2">Default Photo</p>
                                            @endif
                                            <input type="file" class="mt_10" name="photo" accept="image/*">
                                            <small class="form-text text-muted">Upload new photo (Max: 10MB)</small>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="mb-4">
                                                <label class="form-label">Heading *</label>
                                                <input type="text" class="form-control" name="heading" value="{{ $homeWelcome->heading ?? 'Welcome To Our Website' }}" required>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Description *</label>
                                                <textarea class="form-control" name="description" rows="6" required>{{ $homeWelcome->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.' }}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                        <label class="form-label">Button Text</label>
                                                        <input type="text" class="form-control" name="button_text" value="{{ $homeWelcome->button_text ?? 'READ MORE' }}">
                                                        <small class="form-text text-muted">Leave empty to hide button</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-4">
                                                        <label class="form-label">Button Link</label>
                                                        <input type="text" class="form-control" name="button_link" value="{{ $homeWelcome->button_link ?? '/about' }}">
                                                        <small class="form-text text-muted">URL or route for the button</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Status *</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="active" {{ ($homeWelcome->status ?? 'active') == 'active' ? 'selected' : '' }}>Active (Show on Homepage)</option>
                                                    <option value="inactive" {{ ($homeWelcome->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive (Hide from Homepage)</option>
                                                </select>
                                                <small class="form-text text-muted">Choose Active to show the welcome section on homepage, Inactive to hide it</small>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label"></label>
                                                <button type="submit" class="btn btn-primary">Update Home Welcome</button>
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

<script>
    // Image preview functionality
    document.querySelector('input[name="photo"]').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.profile-photo').src = e.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>

</body>
</html>
