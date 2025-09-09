@extends('admin.layout.app')

@section('heading', 'Edit Home Welcome Information')

@section('main_content')

<script src="{{ asset('dist-admin/js/bootstrap-tagsinput.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('dist-admin/css/iziToast.min.css') }}">
<script src="{{ asset('dist-admin/js/iziToast.min.js') }}"></script>

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
                                                <select class="form-control" name="status" required>
                                                    <option value="active" {{ ($homeWelcome->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ ($homeWelcome->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
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

@endsection

@section('scripts')
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
@endsection
