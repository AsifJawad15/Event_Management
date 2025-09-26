@extends('layouts.admin')

@section('title', 'Edit Organiser')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Organiser</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin_organiser_index') }}">Organisers</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Organiser Information</h3>
                        </div>

                        <form action="{{ route('admin_organiser_update', $organiser->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   name="name"
                                                   id="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $organiser->name) }}"
                                                   required>
                                            @error('name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation">Designation <span class="text-danger">*</span></label>
                                            <input type="text"
                                                   name="designation"
                                                   id="designation"
                                                   class="form-control @error('designation') is-invalid @enderror"
                                                   value="{{ old('designation', $organiser->designation) }}"
                                                   required>
                                            @error('designation')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                   name="email"
                                                   id="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', $organiser->email) }}">
                                            @error('email')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text"
                                                   name="phone"
                                                   id="phone"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   value="{{ old('phone', $organiser->phone) }}">
                                            @error('phone')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    @if($organiser->photo)
                                        <div class="mb-2">
                                            <img src="{{ asset('uploads/' . $organiser->photo) }}"
                                                 alt="{{ $organiser->name }}"
                                                 style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                            <p class="text-muted mt-1">Current Photo</p>
                                        </div>
                                    @endif
                                    <input type="file"
                                           name="photo"
                                           id="photo"
                                           class="form-control-file @error('photo') is-invalid @enderror"
                                           accept="image/*">
                                    @error('photo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text text-muted">Upload a new photo to replace the current one (JPEG, PNG, JPG, GIF). Max size: 2MB</small>
                                </div>

                                <div class="form-group">
                                    <label for="biography">Biography</label>
                                    <textarea name="biography"
                                              id="biography"
                                              class="form-control @error('biography') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Brief description about the organiser...">{{ old('biography', $organiser->biography) }}</textarea>
                                    @error('biography')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address"
                                              id="address"
                                              class="form-control @error('address') is-invalid @enderror"
                                              rows="2"
                                              placeholder="Full address...">{{ old('address', $organiser->address) }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facebook">Facebook URL</label>
                                            <input type="url"
                                                   name="facebook"
                                                   id="facebook"
                                                   class="form-control @error('facebook') is-invalid @enderror"
                                                   value="{{ old('facebook', $organiser->facebook) }}"
                                                   placeholder="https://facebook.com/username">
                                            @error('facebook')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter">Twitter URL</label>
                                            <input type="url"
                                                   name="twitter"
                                                   id="twitter"
                                                   class="form-control @error('twitter') is-invalid @enderror"
                                                   value="{{ old('twitter', $organiser->twitter) }}"
                                                   placeholder="https://twitter.com/username">
                                            @error('twitter')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instagram">Instagram URL</label>
                                            <input type="url"
                                                   name="instagram"
                                                   id="instagram"
                                                   class="form-control @error('instagram') is-invalid @enderror"
                                                   value="{{ old('instagram', $organiser->instagram) }}"
                                                   placeholder="https://instagram.com/username">
                                            @error('instagram')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="linkedin">LinkedIn URL</label>
                                            <input type="url"
                                                   name="linkedin"
                                                   id="linkedin"
                                                   class="form-control @error('linkedin') is-invalid @enderror"
                                                   value="{{ old('linkedin', $organiser->linkedin) }}"
                                                   placeholder="https://linkedin.com/in/username">
                                            @error('linkedin')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Update Organiser
                                </button>
                                <a href="{{ route('admin_organiser_index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
