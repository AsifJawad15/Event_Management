@extends('admin.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add New Testimonial</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_testimonial_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Designation *</label>
                                <input type="text" name="designation" class="form-control" value="{{ old('designation') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>Comment *</label>
                                <textarea name="comment" class="form-control" rows="5" required>{{ old('comment') }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>Photo *</label>
                                <input type="file" name="photo" class="form-control" required>
                                <small class="form-text text-muted">Upload image (JPG, PNG, GIF) max 2MB</small>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Testimonial</button>
                                <a href="{{ route('admin_testimonial_index') }}" class="btn btn-secondary ml-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
