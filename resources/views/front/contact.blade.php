@extends('front.layout.master')

@section('title', 'Contact | SingleEvent')

@section('main_content')

@include('front.layout.dark-theme')

<style>
.contact-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.contact-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.contact-section {
    padding: 70px 0 50px;
}

.contact-form-wrapper {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
}

.contact-form-wrapper .form-control {
    background: rgba(26, 31, 58, 0.6);
    border: 1px solid rgba(102, 126, 234, 0.3);
    color: #fff;
    padding: 15px 20px;
    border-radius: 10px;
    transition: all 0.3s ease;
}

.contact-form-wrapper .form-control:focus {
    background: rgba(26, 31, 58, 0.8);
    border-color: #667eea;
    box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    color: #fff;
}

.contact-form-wrapper .form-control::placeholder {
    color: rgba(224, 224, 224, 0.5);
}

.contact-form-wrapper textarea.form-control {
    min-height: 120px;
}

.btn-con-bg {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 15px 40px;
    border-radius: 50px;
    border: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-con-bg:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
    color: #fff;
}

.contact-inner-box {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 15px;
    padding: 25px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    margin-bottom: 20px;
    transition: all 0.4s ease;
}

.contact-inner-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 50px rgba(102, 126, 234, 0.4);
}

.contact-inner-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.contact-inner-icon i {
    font-size: 24px;
    color: #fff;
}

.contact-inner-text {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.8;
}

.contact-inner-text span {
    color: #fff;
    font-weight: 500;
    display: block;
    margin-top: 5px;
}

.alert {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.alert-success {
    background: rgba(76, 175, 80, 0.2);
    border: 1px solid rgba(76, 175, 80, 0.5);
    color: #4caf50;
}

.alert-danger {
    background: rgba(244, 67, 54, 0.2);
    border: 1px solid rgba(244, 67, 54, 0.5);
    color: #f44336;
}

.map-wrapper {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 20px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    margin-top: 50px;
}

.map-wrapper iframe {
    width: 100%;
    height: 400px;
    border-radius: 15px;
    border: none;
}

@media (max-width: 991px) {
    .contact-hero h1 { font-size: 36px; }
    .contact-form-wrapper { padding: 25px; }
}
</style>

<div class="contact-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Contact</h1>
    </div>
</div>

<div id="contacts" class="contact-section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-wrapper animate-on-scroll">
                    <form class="form" method="post" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input name="name" class="form-control" placeholder="Name" type="text" value="{{ old('name') }}" required>
                                @error('name')
                                    <span style="color: #ff6b6b; font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <input name="email" class="form-control" placeholder="Email" type="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span style="color: #ff6b6b; font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <input name="subject" class="form-control" placeholder="Subject" type="text" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <span style="color: #ff6b6b; font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <textarea rows="5" name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span style="color: #ff6b6b; font-size: 13px;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="actions">
                                    <button type="submit" class="btn btn-lg btn-con-bg">
                                        <i class="fas fa-paper-plane"></i> Send Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="contact-info">
                    @if($contact_page_data && $contact_page_data->address != '')
                    <div class="contact-inner-box animate-on-scroll">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Address: <span>{{ $contact_page_data->address }}</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($contact_page_data && $contact_page_data->email != '')
                    <div class="contact-inner-box animate-on-scroll">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Email: <span>{{ $contact_page_data->email }}</span>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($contact_page_data && $contact_page_data->phone != '')
                    <div class="contact-inner-box animate-on-scroll">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Phone: <span>{{ $contact_page_data->phone }}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            @if($contact_page_data && $contact_page_data->map != '')
            <div class="col-md-12">
                <div class="map-wrapper animate-on-scroll">
                    {!! $contact_page_data->map !!}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
