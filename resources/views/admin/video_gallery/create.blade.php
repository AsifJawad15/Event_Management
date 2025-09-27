@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Video</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin_video_index') }}">Video Gallery</a></div>
                <div class="breadcrumb-item active">Add Video</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_video_store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="caption">Video Caption <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('caption') is-invalid @enderror"
                                           id="caption" name="caption" value="{{ old('caption') }}"
                                           placeholder="Enter video caption" required>
                                    @error('caption')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="video">YouTube URL or Video ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('video') is-invalid @enderror"
                                           id="video" name="video" value="{{ old('video') }}"
                                           placeholder="e.g., https://www.youtube.com/watch?v=AIogFe419-8 or AIogFe419-8" required>
                                    @error('video')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        You can paste the full YouTube URL or just the video ID (the part after "v=" in the URL)
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
                                        <i class="fas fa-save"></i> Add Video
                                    </button>
                                    <a href="{{ route('admin_video_index') }}" class="btn btn-secondary ml-2">
                                        <i class="fas fa-arrow-left"></i> Back to Gallery
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoInput = document.getElementById('video');
    const captionInput = document.getElementById('caption');

    // Auto-generate caption from video title (optional feature for future)
    videoInput.addEventListener('blur', function() {
        const value = this.value.trim();
        if (value && !captionInput.value) {
            // Could implement YouTube API call to get video title
            // For now, just suggest user to enter caption manually
        }
    });
});
</script>
@endsection
