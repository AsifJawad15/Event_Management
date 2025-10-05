@extends('front.layout.master')

@section('title', $speaker->name . ' | SingleEvent')
@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>{{ $speaker->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.speakers') }}">Speakers</a></li>
                            <li class="breadcrumb-item active">{{ $speaker->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="speakers" class="pt_70 pb_70 white team speakers-item">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="speaker-detail-img">
                    <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2>{{ $speaker->name }}</h2>
                    <h4 class="mb_20">{{ $speaker->designation }}</h4>
                    <p>{{ $speaker->biography }}</p>

                    <h4>More Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Address:</b></th>
                                <td>{{ $speaker->address }}</td>
                            </tr>
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $speaker->email }}</td>
                            </tr>
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $speaker->phone }}</td>
                            </tr>
                            @if($speaker->website)
                            <tr>
                                <th><b>Website:</b></th>
                                <td>
                                    <a href="{{ $speaker->website }}" target="_blank">{{ $speaker->website }}</a>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th><b>Social:</b></th>
                                <td>
                                    <ul class="social-icon">
                                        @if($speaker->facebook)
                                        <li>
                                            <a href="{{ $speaker->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->twitter)
                                        <li>
                                            <a href="{{ $speaker->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->linkedin)
                                        <li>
                                            <a href="{{ $speaker->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if($speaker->instagram)
                                        <li>
                                            <a href="{{ $speaker->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{-- Sessions section --}}
                    <h4 class="mt_30">My Sessions</h4>
                    @if($schedules->count() > 0)
                        @foreach($schedules as $schedule)
                        <div class="schedule-item mb_30">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="schedule-img">
                                        <img src="{{ asset('uploads/' . $schedule->photo) }}" alt="{{ $schedule->title }}" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6">
                                    <div class="schedule-content">
                                        <h5>{{ $schedule->title }}</h5>
                                        <p>{{ $schedule->description }}</p>
                                        <div class="schedule-info">
                                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($schedule->scheduleDay->date1)->format('M d, Y') }} ({{ $schedule->scheduleDay->day }})</p>
                                            <p><strong>Time:</strong> {{ $schedule->time }}</p>
                                            <p><strong>Location:</strong> {{ $schedule->location }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-danger">No sessions found for this speaker.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
