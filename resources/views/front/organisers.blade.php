@extends('front.layout.master')

@section('title', 'Organisers | SingleEvent')
@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Organisers</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Organisers</li>
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
            @forelse($organisers as $organiser)
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="team-img mb_20">
                    <a href="{{ route('front.organiser.detail', $organiser->slug) }}">
                        @if($organiser->photo)
                            <img src="{{ asset('uploads/' . $organiser->photo) }}" alt="{{ $organiser->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 300px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; border: 1px solid #dee2e6;">
                                <i class="fas fa-user" style="font-size: 60px; color: #6c757d;"></i>
                            </div>
                        @endif
                    </a>
                </div>
                <div class="team-info text-center">
                    <h6><a href="{{ route('front.organiser.detail', $organiser->slug) }}">{{ $organiser->name }}</a></h6>
                    <p>{{ $organiser->designation }}</p>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <h4>No Organisers Found</h4>
                    <p class="text-muted">Please check back later for updates.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
