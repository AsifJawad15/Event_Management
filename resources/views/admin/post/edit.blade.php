@extends('admin.layout.master')

@section('heading', 'Edit Post')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_post_update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label class="form-label">Title *</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Short Description *</label>
                                    <textarea name="short_description" class="form-control" cols="30" rows="4" required>{{ old('short_description', $post->short_description) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea name="description" class="form-control editor" cols="30" rows="10" required>{{ old('description', $post->description) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        @if($post->photo)
                                            <img src="{{ asset('uploads/'.$post->photo) }}" alt="" class="w_200">
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Change Photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
