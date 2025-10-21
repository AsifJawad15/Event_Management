@extends('front.layout.master')

@section('title', 'Schedule | SingleEvent')
@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
/* Schedule Page Dark Theme */
.schedule-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.schedule-hero::before {
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

.schedule-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    animation: fadeInUp 0.8s ease;
}

/* Schedule Tabs */
#scheduleTab {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 50px;
    padding: 15px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    margin-bottom: 50px;
}

#scheduleTab .nav-item {
    margin: 0 5px;
}

#scheduleTab .nav-link {
    background: transparent;
    border: none;
    color: rgba(224, 224, 224, 0.8);
    padding: 15px 30px;
    border-radius: 40px;
    transition: all 0.3s ease;
    position: relative;
}

#scheduleTab .nav-link p {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 5px;
}

#scheduleTab .nav-link span {
    font-size: 14px;
    opacity: 0.8;
}

#scheduleTab .nav-link:hover,
#scheduleTab .nav-link.active {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff !important;
    box-shadow: 0 5px 20px rgba(102, 126, 234, 0.5);
    transform: translateY(-3px);
}

/* Schedule Item */
.schedule-item {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 0;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
    margin-bottom: 30px;
    overflow: hidden;
}

.schedule-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.schedule-img {
    position: relative;
    overflow: hidden;
    height: 300px;
}

.schedule-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 0.5s ease;
}

.schedule-item:hover .schedule-img img {
    transform: scale(1.1);
}

.schedule-content {
    padding: 30px;
}

.session-badge {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 8px 20px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 15px;
}

.schedule-content h3 {
    font-size: 24px;
    color: #fff;
    margin-bottom: 15px;
}

.schedule-content p {
    color: rgba(224, 224, 224, 0.8);
    line-height: 1.8;
    margin-bottom: 20px;
}

.schedule-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.meta-item i {
    color: #667eea;
    font-size: 18px;
}

.meta-item span {
    color: rgba(224, 224, 224, 0.9);
    font-weight: 500;
}

.speakers-list {
    margin: 15px 0;
}

.speaker-tag {
    display: inline-block;
    background: rgba(102, 126, 234, 0.2);
    color: #667eea;
    padding: 6px 15px;
    border-radius: 15px;
    margin: 5px;
    transition: all 0.3s ease;
    text-decoration: none;
    border: 1px solid rgba(102, 126, 234, 0.3);
}

.speaker-tag:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

/* Responsive */
@media (max-width: 991px) {
    .schedule-hero h1 {
        font-size: 36px;
    }

    #scheduleTab {
        border-radius: 20px;
        padding: 10px;
    }

    #scheduleTab .nav-link {
        padding: 10px 20px;
    }

    .schedule-img {
        height: 250px;
    }
}
</style>

<div class="schedule-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Event Schedule</h1>
    </div>
</div>

<section id="schedule">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Plan Your Day</h2>
            <p>Explore our comprehensive schedule and don't miss any important sessions</p>
        </div>

        <div class="row">
            <div class="col-12">
                <ul id="scheduleTab" class="nav nav-tabs animate-on-scroll">
                    @foreach($schedule_days as $index => $schedule_day)
                    <li class="nav-item">
                        <a href="#day{{ $index + 1 }}" data-toggle="tab" class="nav-link {{ $loop->first ? 'active' : '' }}">
                            <p>{{ $schedule_day->day }}</p>
                            <span>{{ \Carbon\Carbon::parse($schedule_day->date1)->format('M d, Y') }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div id="scheduleTabContent" class="tab-content">
                    @foreach($schedule_days as $index => $schedule_day)
                    <div id="day{{ $index + 1 }}" class="tab-pane {{ $loop->first ? 'active show' : '' }} fade">
                        @foreach($schedule_day->schedules->sortBy('item_order1') as $schedule)
                        <div class="schedule-item animate-on-scroll">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="schedule-img">
                                        <img src="{{ asset('uploads/' . $schedule->photo) }}" alt="{{ $schedule->title }}">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="schedule-content">
                                        <span class="session-badge">Session {{ $schedule->item_order1 }}</span>
                                        <h3>{{ $schedule->title }}</h3>
                                        <p>{{ $schedule->description }}</p>

                                        <div class="schedule-meta">
                                            <div class="meta-item">
                                                <i class="fas fa-clock"></i>
                                                <span>{{ $schedule->time }}</span>
                                            </div>
                                            <div class="meta-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>{{ $schedule->location }}</span>
                                            </div>
                                        </div>

                                        @if($schedule->speakers->count() > 0)
                                        <div class="speakers-list">
                                            <strong style="color: #fff;">Speakers:</strong><br>
                                            @foreach($schedule->speakers as $speaker)
                                                <a href="{{ route('front.speaker', $speaker->slug) }}" class="speaker-tag">
                                                    <i class="fas fa-user"></i> {{ $speaker->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
