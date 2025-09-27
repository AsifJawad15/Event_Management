@extends('admin.layout.master')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Accommodations</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Accommodations</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="">
                                        <a href="{{ route('admin_accommodation_create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Accommodation</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Website</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($accommodations as $accommodation)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($accommodation->photo)
                                                    <img src="{{ asset('uploads/'.$accommodation->photo) }}" alt="{{ $accommodation->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $accommodation->name }}</td>
                                            <td>{{ Str::limit($accommodation->address, 50) }}</td>
                                            <td>{{ $accommodation->email ?? 'N/A' }}</td>
                                            <td>{{ $accommodation->phone ?? 'N/A' }}</td>
                                            <td>
                                                @if($accommodation->website)
                                                    <a href="{{ $accommodation->website }}" target="_blank" class="btn btn-sm btn-info">Visit</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_accommodation_edit', $accommodation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('admin_accommodation_destroy', $accommodation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this accommodation?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
