@extends('admin.layout.auth')

@section('main_content')
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center">Admin Reset Password</h4>
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="{{ route('admin_reset_password_submit',[$token,$email]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="New Password" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg w_100_p">
                                            Reset Password
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <a href="{{ route('admin_login') }}">
                                                Back to Login Page
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
@endsection
