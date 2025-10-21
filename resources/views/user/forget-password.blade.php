@extends('front.layout.master')

@section('title', 'Forget Password')

@section('main_content')
@include('front.layout.dark-nav')

<style>
:root {
    --primary: #667eea;
    --secondary: #764ba2;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
}

.auth-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 40px 0 80px;
}

/* Hero Section */
.auth-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9)),
                url('{{ asset("dist-front/images/banner.jpg") }}') center/cover;
    border-radius: 30px;
    padding: 80px 40px;
    margin-bottom: 50px;
    position: relative;
    overflow: hidden;
    text-align: center;
    animation: slideDown 0.8s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.auth-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: rotateGlow 20s linear infinite;
}

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.auth-hero-content {
    position: relative;
    z-index: 2;
}

.auth-hero h1 {
    font-size: 48px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 15px;
    text-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
}

.auth-hero p {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

/* Auth Card */
.auth-card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 50px 45px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    animation: fadeInUp 0.8s ease;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.auth-card-header {
    text-align: center;
    margin-bottom: 35px;
}

.auth-card-header .icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.auth-card-header .icon i {
    font-size: 32px;
    color: white;
}

.auth-card-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 10px 0;
}

.auth-card-header p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    margin: 0;
}

/* Form Styles */
.form-group {
    margin-bottom: 25px;
}

.form-group label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid rgba(102, 126, 234, 0.2);
    border-radius: 12px;
    padding: 14px 18px;
    color: #fff;
    font-size: 15px;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    background: rgba(15, 23, 42, 0.8);
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.4);
}

.text-danger {
    color: #ff6b6b;
    font-size: 13px;
    margin-top: 5px;
}

/* Submit Button */
.submit-btn {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border: none;
    border-radius: 12px;
    color: white;
    font-size: 16px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(102, 126, 234, 0.6);
}

.submit-btn:active {
    transform: translateY(-1px);
}

/* Links */
.auth-links {
    text-align: center;
    margin-top: 25px;
    padding-top: 25px;
    border-top: 1px solid rgba(102, 126, 234, 0.2);
}

.auth-links a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    display: block;
    margin: 10px 0;
}

.auth-links a:hover {
    color: var(--secondary);
    text-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
}

/* Responsive */
@media (max-width: 768px) {
    .auth-hero {
        padding: 60px 20px;
    }

    .auth-hero h1 {
        font-size: 32px;
    }

    .auth-card {
        padding: 35px 25px;
    }
}
</style>

<div class="auth-wrapper">
    <div class="container">
        <!-- Hero Section -->
        <div class="auth-hero">
            <div class="auth-hero-content">
                <h1>Forgot Password?</h1>
                <p>Don't worry, we'll help you reset it</p>
            </div>
        </div>

        <!-- Forgot Password Form -->
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="auth-card">
                    <div class="auth-card-header">
                        <div class="icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <h2>Reset Password</h2>
                        <p>Enter your email to receive reset instructions</p>
                    </div>

                    <form action="{{ route('forget_password_submit') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                            <input class="form-control" name="email" placeholder="Enter your registered email" type="email" required value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="submit-btn">
                                <i class="fas fa-paper-plane"></i> Submit
                            </button>
                        </div>

                        <div class="auth-links">
                            <a href="{{ route('login') }}">
                                <i class="fas fa-arrow-left"></i> Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
