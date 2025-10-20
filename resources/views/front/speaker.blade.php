@extends('front.layout.master')

@section('title', $speaker->name . ' | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.speaker-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.speaker-hero h1 {
    font-size: 48px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    margin-bottom: 20px;
}

.speaker-detail-section {
    padding: 80px 0;
}

.speaker-profile-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    height: 100%;
}

.speaker-profile-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
}

.speaker-profile-img {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    margin-bottom: 20px;
}

.speaker-profile-img img {
    width: 100%;
    border-radius: 15px;
    transition: all 0.5s ease;
}

.speaker-profile-card:hover .speaker-profile-img img {
    transform: scale(1.1);
}

.speaker-info-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
}

.speaker-info-card h2 {
    font-size: 36px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 10px;
}

.speaker-info-card h4 {
    font-size: 20px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
}

.speaker-info-card p {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.8;
    margin-bottom: 30px;
}

.info-table {
    margin-top: 30px;
}

.info-table table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

.info-table th {
    color: #667eea;
    font-weight: 600;
    padding: 15px 20px;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 10px 0 0 10px;
    width: 150px;
}

.info-table td {
    color: rgba(224, 224, 224, 0.9);
    padding: 15px 20px;
    background: rgba(26, 31, 58, 0.6);
    border-radius: 0 10px 10px 0;
}

.info-table a {
    color: #667eea;
    transition: all 0.3s ease;
}

.info-table a:hover {
    color: #764ba2;
    text-decoration: none;
}

.social-links {
    display: flex;
    gap: 15px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-links li a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(102, 126, 234, 0.2);
    border-radius: 50%;
    color: #667eea;
    transition: all 0.3s ease;
    border: 1px solid rgba(102, 126, 234, 0.3);
}

.social-links li a:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.sessions-section {
    margin-top: 50px;
}

.section-title {
    font-size: 28px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 30px;
    position: relative;
    padding-bottom: 15px;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.session-card {
    background: rgba(26, 31, 58, 0.6);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    padding: 25px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.session-card:hover {
    transform: translateX(10px);
    border-color: rgba(102, 126, 234, 0.5);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.session-card img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
}

.session-card h5 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 10px;
}

.session-card p {
    color: rgba(224, 224, 224, 0.8);
    line-height: 1.6;
    margin-bottom: 15px;
}

.session-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.session-info p {
    color: rgba(224, 224, 224, 0.9);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
}

.session-info strong {
    color: #667eea;
    min-width: 80px;
}

.no-sessions {
    text-align: center;
    padding: 60px 30px;
    background: rgba(26, 31, 58, 0.6);
    border-radius: 15px;
    border: 1px solid rgba(102, 126, 234, 0.2);
}

.no-sessions i {
    font-size: 50px;
    color: rgba(102, 126, 234, 0.5);
    margin-bottom: 20px;
}

.no-sessions p {
    color: rgba(224, 224, 224, 0.7);
    font-size: 18px;
}

@media (max-width: 991px) {
    .speaker-hero h1 { font-size: 32px; }
    .speaker-info-card h2 { font-size: 28px; }
    .info-table th { width: 120px; font-size: 14px; }
}
</style>

<div class="speaker-hero">
    <div class="container">
        <h1 class="animate-on-scroll">{{ $speaker->name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center" style="background: transparent;">
                <li class="breadcrumb-item"><a href="{{ route('front.home') }}" style="color: rgba(255,255,255,0.8);">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('front.speakers') }}" style="color: rgba(255,255,255,0.8);">Speakers</a></li>
                <li class="breadcrumb-item active" style="color: #fff;">{{ $speaker->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="speaker-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="speaker-profile-card animate-on-scroll">
                    <div class="speaker-profile-img">
                        <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="speaker-info-card animate-on-scroll">
                    <h2>{{ $speaker->name }}</h2>
                    <h4>{{ $speaker->designation }}</h4>
                    <p>{{ $speaker->biography }}</p>

                    <h4 class="section-title">Contact Information</h4>
                    <div class="info-table">
                        <table>
                            <tr>
                                <th><i class="fas fa-map-marker-alt"></i> Address:</th>
                                <td>{{ $speaker->address }}</td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-envelope"></i> Email:</th>
                                <td><a href="mailto:{{ $speaker->email }}">{{ $speaker->email }}</a></td>
                            </tr>
                            <tr>
                                <th><i class="fas fa-phone"></i> Phone:</th>
                                <td>{{ $speaker->phone }}</td>
                            </tr>
                            @if($speaker->website)
                            <tr>
                                <th><i class="fas fa-globe"></i> Website:</th>
                                <td>
                                    <a href="{{ $speaker->website }}" target="_blank">{{ $speaker->website }}</a>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th><i class="fas fa-share-alt"></i> Social:</th>
                                <td>
                                    <ul class="social-links">
                                        @if($speaker->facebook)
                                        <li>
                                            <a href="{{ $speaker->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->twitter)
                                        <li>
                                            <a href="{{ $speaker->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->linkedin)
                                        <li>
                                            <a href="{{ $speaker->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->instagram)
                                        <li>
                                            <a href="{{ $speaker->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="sessions-section">
                        <h4 class="section-title">My Sessions</h4>
                        @if($schedules->count() > 0)
                            @foreach($schedules as $schedule)
                            <div class="session-card">
                                <div class="row">
                                    <div class="col-lg-4 col-md-5">
                                        <img src="{{ asset('uploads/' . $schedule->photo) }}" alt="{{ $schedule->title }}">
                                    </div>
                                    <div class="col-lg-8 col-md-7">
                                        <h5>{{ $schedule->title }}</h5>
                                        <p>{{ $schedule->description }}</p>
                                        <div class="session-info">
                                            <p><strong><i class="fas fa-calendar"></i> Date:</strong> {{ \Carbon\Carbon::parse($schedule->scheduleDay->date1)->format('M d, Y') }} ({{ $schedule->scheduleDay->day }})</p>
                                            <p><strong><i class="fas fa-clock"></i> Time:</strong> {{ $schedule->time }}</p>
                                            <p><strong><i class="fas fa-map-marker-alt"></i> Location:</strong> {{ $schedule->location }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="no-sessions">
                                <i class="fas fa-calendar-times"></i>
                                <p>No sessions found for this speaker.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
