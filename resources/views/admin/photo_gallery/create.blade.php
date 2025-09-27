@extends('admin.layout.master')

@section('main_content')
<section class="section">
    <div class="section-header justify-content-between">
        <h1>Add Photo</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_photo_index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back to Gallery</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_photo_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Caption *</label>
                                        <input type="text" class="form-control" name="caption" value="{{ old('caption') }}" required>
                                        @error('caption')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Photo *</label>
                                        <div>
                                            <input type="file" class="form-control" name="photo" accept="image/*" required>
                                        </div>
                                        <div class="text-muted mt-2">
                                            <small>Supported formats: JPEG, PNG, JPG, GIF. Maximum size: 10MB</small>
                                        </div>
                                        @error('photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
