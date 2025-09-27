@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Video</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin_video_index') }}">Video Gallery</a></div>
                <div class="breadcrumb-item active">Edit Video</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Current Video Preview -->
                            <div class="mb-4">
                                <h6>Current Video:</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="video-container" style="position: relative; width: 100%; height: 200px;">
                                            <iframe
                                                src="{{ $video->embed_url }}"
                                                style="width: 100%; height: 100%; border: none;"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Caption:</strong> {{ $video->caption }}</p>
                                        <p><strong>Video ID:</strong> {{ $video->video }}</p>
                                        <p><strong>Added:</strong> {{ $video->created_at->format('M d, Y H:i') }}</p>
                                        <p><strong>Last Updated:</strong> {{ $video->updated_at->format('M d, Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <form action="{{ route('admin_video_update', $video->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="caption">Video Caption <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('caption') is-invalid @enderror"
                                           id="caption" name="caption" value="{{ old('caption', $video->caption) }}"
                                           placeholder="Enter video caption" required>
                                    @error('caption')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video">YouTube URL or Video ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('video') is-invalid @enderror"
                                           id="video" name="video" value="{{ old('video', $video->video) }}"
                                           placeholder="e.g., https://www.youtube.com/watch?v=AIogFe419-8 or AIogFe419-8" required>
                                    @error('video')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        You can paste the full YouTube URL or just the video ID
                                    </small>
                                </div>

                                <div class="form-group">
                                    <h6>Supported YouTube URL formats:</h6>
                                    <small class="text-muted d-block">• https://www.youtube.com/watch?v=AIogFe419-8</small>
                                    <small class="text-muted d-block">• https://youtu.be/AIogFe419-8</small>
                                    <small class="text-muted d-block">• https://www.youtube.com/embed/AIogFe419-8</small>
                                    <small class="text-muted d-block">• Just the video ID: AIogFe419-8</small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Video
                                    </button>
                                    <a href="{{ route('admin_video_index') }}" class="btn btn-secondary ml-2">
                                        <i class="fas fa-arrow-left"></i> Back to Gallery
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin_video_destroy', $video->id) }}" method="POST"
                                          style="display: inline-block;" class="ml-2"
                                          onsubmit="return confirm('Are you sure you want to delete this video? This action cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Delete Video
                                        </button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
