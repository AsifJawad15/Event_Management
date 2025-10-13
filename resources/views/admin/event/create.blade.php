@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create New Event</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_event_store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Event Name -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label>Event Name *</label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                            @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Location & Venue -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Location</label>
                                            <input type="text" class="form-control" name="location" value="{{ old('location') }}" placeholder="City, Country">
                                            @error('location')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Venue</label>
                                            <input type="text" class="form-control" name="venue" value="{{ old('venue') }}" placeholder="Venue Name">
                                            @error('venue')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Dates -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Start Date *</label>
                                            <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}" required>
                                            @error('start_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>End Date *</label>
                                            <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}" required>
                                            @error('end_date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Times -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Start Time</label>
                                            <input type="time" class="form-control" name="start_time" value="{{ old('start_time') }}">
                                            @error('start_time')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>End Time</label>
                                            <input type="time" class="form-control" name="end_time" value="{{ old('end_time') }}">
                                            @error('end_time')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Images -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Banner Image</label>
                                            <input type="file" class="form-control" name="banner_image" accept="image/*">
                                            <small class="text-muted">Recommended size: 1920x600px</small>
                                            @error('banner_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Thumbnail Image</label>
                                            <input type="file" class="form-control" name="thumbnail_image" accept="image/*">
                                            <small class="text-muted">Recommended size: 400x300px</small>
                                            @error('thumbnail_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status & Featured -->
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Status *</label>
                                            <select name="status" class="form-control" required>
                                                <option value="Draft" {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                                                <option value="Published" {{ old('status') == 'Published' ? 'selected' : '' }}>Published</option>
                                                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                <option value="Cancelled" {{ old('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Max Attendees</label>
                                            <input type="number" class="form-control" name="max_attendees" value="{{ old('max_attendees') }}" min="1">
                                            @error('max_attendees')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Price ($)</label>
                                            <input type="number" class="form-control" name="price" value="{{ old('price') }}" min="0" step="0.01">
                                            @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Featured Checkbox -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="is_featured">
                                                    <i class="fas fa-star text-warning"></i> Mark as Featured Event
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label>Tags</label>
                                            <input type="text" class="form-control" name="tags" value="{{ old('tags') }}" placeholder="conference, tech, innovation (comma separated)">
                                            @error('tags')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Organizer Information -->
                                    <div class="col-md-12">
                                        <h5 class="mt-3 mb-3">Organizer Information</h5>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Organizer Name</label>
                                            <input type="text" class="form-control" name="organizer_name" value="{{ old('organizer_name') }}">
                                            @error('organizer_name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Organizer Email</label>
                                            <input type="email" class="form-control" name="organizer_email" value="{{ old('organizer_email') }}">
                                            @error('organizer_email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                            <label>Organizer Phone</label>
                                            <input type="text" class="form-control" name="organizer_phone" value="{{ old('organizer_phone') }}">
                                            @error('organizer_phone')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Event</button>
                                    <a href="{{ route('admin_event_index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancel</a>
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
