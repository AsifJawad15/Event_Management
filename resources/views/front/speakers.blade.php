@extends('front.layout.master')

@section('title', 'Speakers | SingleEvent')
@section('main_content')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Speakers</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Speakers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="speakers" class="pt_50 pb_50 gray team speakers-item">
    <div class="container">
        <div class="row pt_40">
            @if($speakers && $speakers->count() > 0)
                @foreach($speakers as $speaker)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-img mb_20">
                        <a href="{{ route('front.speaker', $speaker->slug) }}">
                            <img src="{{ asset('uploads/'.$speaker->photo) }}" alt="{{ $speaker->name }}">
                        </a>
                    </div>
                    <div class="team-info text-center">
                        <h6><a href="{{ route('front.speaker', $speaker->slug) }}">{{ $speaker->name }}</a></h6>
                        <p>{{ $speaker->designation }}</p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="lead">No speakers available at the moment.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
