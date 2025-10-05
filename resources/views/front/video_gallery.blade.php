@extends('front.layout.master')

@section('title', 'Video Gallery | SingleEvent')

@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Video Gallery</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Video Gallery</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="gallery-section" class="pt_50 pb_50 gray projects">
    <div class="container">
        @if($videos->count() > 0)
        <div class="row gallery_item">
            @foreach($videos as $video)
            <div class="col-lg-4 col-sm-6 col-xs-12 main-gallery">
                <div class="project-single">
                    <div class="project-inner">
                        <div class="project-head">
                            <img src="{{ $video->thumbnail_url }}" alt="{{ $video->caption }}">
                        </div>
                        <div class="project-bottom">
                            <h4>{{ $video->caption }}</h4>
                        </div>
                        <div class="button">
                            <a class="video-button btn" href="{{ $video->watch_url }}" target="_blank">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($videos->hasPages())
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    {{ $videos->links() }}
                </div>
            </div>
        </div>
        @endif

        @else
        <div class="row">
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fa fa-video-camera fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">No videos available</h4>
                    <p class="text-muted">Check back later for exciting video content!</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
