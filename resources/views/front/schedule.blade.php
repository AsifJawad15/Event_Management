@extends('front.layout.master')

@section('title', 'Schedule - Event & Conference Management Website')

@section('content')
<div class="container main-menu" id="navbar">
    <div class="row">
        <div class="col-lg-2 col-sm-12">
            <a href="{{ route('front.home') }}" id="logo" class="grid_2"> <img src="{{ asset('dist-front/images/logo.png') }}"> </a>
        </div>
        <div class="col-lg-10 col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="navContent" class="navbar-nav mr-auto navigation">
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.home') }}">Home</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.speakers') }}">Speakers</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link active" href="{{ route('front.schedule') }}">Schedule</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="#">Pricing</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="#">Blog</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.about') }}">About</a>
                        </li>
                        <li>
                            <a class="smooth-scroll nav-link" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

        <section>
            <div class="wpo-blog-single-section section-padding pb-xs-70">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-12 col-12">
                            <div class="wpo-blog-content">
                                <div class="post clearfix">
                                    <div class="entry-header">
                                        <h2>Schedule</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="schedule">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 schedule-tab">
                        <ul id="scheduleTab" class="nav nav-tabs justify-content-center text-center">
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
                                <div class="row speaker-mainbox">
                                    <div class="col-lg-4 col-xs-12">
                                        <div class="speaker-img">
                                            <img src="{{ asset('uploads/' . $schedule->photo) }}" alt="{{ $schedule->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-xs-12">
                                        <div class="speaker-box">
                                            <h2>Session {{ $schedule->item_order1 }}</h2>
                                            <h3>{{ $schedule->title }}</h3>
                                            <p>
                                                {{ $schedule->description }}
                                            </p>
                                            <h3>Location:</h3>
                                            <h4>
                                                <span>{{ $schedule->location }}</span>
                                            </h4>
                                            <h3>Time:</h3>
                                            <h4>
                                                <span>{{ $schedule->time }}</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @if($schedule_day->schedules->isEmpty())
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <p class="text-muted">No schedules available for this day.</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Initialize Bootstrap tabs
    $('#scheduleTab a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // Make sure the first tab is active by default
    $('#scheduleTab a:first').tab('show');
});
</script>
@endsection
