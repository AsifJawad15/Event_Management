@extends('admin.layout.master')

@section('heading', 'Add Post')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Description *</label>
                                    <textarea name="short_description" class="form-control" cols="30" rows="4" required>{{ old('short_description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control editor" cols="30" rows="10" required>{{ old('description') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Photo *</label>
                                    <input type="file" class="form-control" name="photo" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('admin_post_index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
