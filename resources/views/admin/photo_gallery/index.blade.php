@extends('admin.layout.master')

@section('main_content')
<section class="section">
    <div class="section-header justify-content-between">
        <h1>Photo Gallery</h1>
        <div class="ml-auto">
            <a href="{{ route('admin_photo_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Photo</a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Photo</th>
                                        <th>Caption</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($photos as $photo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($photo->photo)
                                                <img src="{{ asset('uploads/'.$photo->photo) }}" alt="{{ $photo->caption }}" class="w_100">
                                            @else
                                                <span class="badge badge-danger">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $photo->caption }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin_photo_edit', $photo->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('admin_photo_delete', $photo->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">
                                                <i class="fas fa-trash"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($photos->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $photos->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
