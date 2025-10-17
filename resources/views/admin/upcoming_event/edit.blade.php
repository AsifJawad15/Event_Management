@extends('admin.layout.master')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Upcoming Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin_upcoming_event_index') }}">Upcoming Events</a>
                </div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_upcoming_event_update', $upcomingEvent->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Event Title *</label>
                                    <input type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ old('title', $upcomingEvent->title) }}"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              name="description"
                                              rows="5"
                                              required>{{ old('description', $upcomingEvent->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Event Image</label>

                                    @if($upcomingEvent->image && file_exists(public_path('uploads/'.$upcomingEvent->image)))
                                        <div class="mb-2">
                                            <label class="d-block">Current Image:</label>
                                            <img src="{{ asset('uploads/'.$upcomingEvent->image) }}"
                                                 alt="{{ $upcomingEvent->title }}"
                                                 style="max-width: 300px; max-height: 300px; object-fit: cover;"
                                                 class="img-thumbnail">
                                        </div>
                                    @endif

                                    <div>
                                        <input type="file"
                                               class="form-control @error('image') is-invalid @enderror"
                                               name="image"
                                               id="image"
                                               accept="image/*"
                                               onchange="previewImage(event)">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted">Leave empty to keep current image</small>
                                    </div>

                                    <div class="mt-3">
                                        <img id="preview"
                                             src=""
                                             alt="New Image Preview"
                                             style="max-width: 300px; max-height: 300px; display: none;"
                                             class="img-thumbnail">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Event Date *</label>
                                    <input type="date"
                                           class="form-control @error('event_date') is-invalid @enderror"
                                           name="event_date"
                                           value="{{ old('event_date', $upcomingEvent->event_date->format('Y-m-d')) }}"
                                           required>
                                    @error('event_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Status *</label>
                                    <select class="form-control @error('status') is-invalid @enderror"
                                            name="status"
                                            required>
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status', $upcomingEvent->status) == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status', $upcomingEvent->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Order *</label>
                                    <input type="number"
                                           class="form-control @error('order') is-invalid @enderror"
                                           name="order"
                                           value="{{ old('order', $upcomingEvent->order) }}"
                                           min="0"
                                           required>
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Lower numbers appear first</small>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Event
                                    </button>
                                    <a href="{{ route('admin_upcoming_event_index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Cancel
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
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
        preview.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
