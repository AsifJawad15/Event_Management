@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Video Gallery</h1>
            <div class="section-header-button">
                <a href="{{ route('admin_video_create') }}" class="btn btn-primary">Add Video</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="row">
                                @forelse($videos as $video)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                    <div class="card h-100">
                                        <div class="video-container" style="position: relative; width: 100%; height: 200px; overflow: hidden;">
                                            <iframe
                                                src="{{ $video->embed_url }}"
                                                style="width: 100%; height: 100%; border: none;"
                                                title="YouTube video player"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen>
                                            </iframe>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title">{{ $video->caption }}</h6>
                                            <p class="card-text text-muted small mb-2">
                                                Video ID: {{ $video->video }}
                                            </p>
                                            <p class="card-text text-muted small">
                                                Added: {{ $video->created_at->format('M d, Y') }}
                                            </p>
                                            <div class="mt-auto">
                                                <div class="btn-group w-100" role="group">
                                                    <a href="{{ $video->watch_url }}" target="_blank" class="btn btn-info btn-sm">
                                                        <i class="fas fa-external-link-alt"></i> View
                                                    </a>
                                                    <a href="{{ route('admin_video_edit', $video->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('admin_video_destroy', $video->id) }}" method="POST" style="display: inline-block;"
                                                          onsubmit="return confirm('Are you sure you want to delete this video?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="text-center py-5">
                                        <i class="fas fa-video fa-3x text-muted mb-3"></i>
                                        <h4 class="text-muted">No videos found</h4>
                                        <p class="text-muted">Start by adding your first video to the gallery</p>
                                        <a href="{{ route('admin_video_create') }}" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Add First Video
                                        </a>
                                    </div>
                                </div>
                                @endforelse
                            </div>

                            <!-- Pagination -->
                            @if($videos->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $videos->links() }}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
