@extends('admin.layout.master')

@section('heading', 'Posts')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Short Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($post->photo)
                                            <img src="{{ asset('uploads/'.$post->photo) }}" alt="" class="w_100">
                                        @endif
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ Str::limit($post->short_description, 50) }}</td>
                                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_post_edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin_post_destroy', $post->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
