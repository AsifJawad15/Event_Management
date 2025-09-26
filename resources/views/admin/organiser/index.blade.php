@extends('layouts.admin')

@section('title', 'Organisers')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Organisers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Organisers</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Organisers</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin_organiser_create') }}" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Add New Organiser
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 50px;">Photo</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th style="width: 120px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($organisers as $organiser)
                                        <tr>
                                            <td>
                                                @if($organiser->photo)
                                                    <img src="{{ asset('uploads/' . $organiser->photo) }}"
                                                         alt="{{ $organiser->name }}"
                                                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                                @else
                                                    <div style="width: 40px; height: 40px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fas fa-user text-muted"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $organiser->name }}</strong><br>
                                                <small class="text-muted">{{ $organiser->slug }}</small>
                                            </td>
                                            <td>{{ $organiser->designation }}</td>
                                            <td>{{ $organiser->email ?? 'N/A' }}</td>
                                            <td>{{ $organiser->phone ?? 'N/A' }}</td>
                                            <td>
                                                <a href="{{ route('admin_organiser_edit', $organiser->id) }}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin_organiser_destroy', $organiser->id) }}"
                                                      method="POST"
                                                      style="display: inline-block;"
                                                      onsubmit="return confirm('Are you sure you want to delete this organiser?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <p class="mb-0">No organisers found.</p>
                                                <a href="{{ route('admin_organiser_create') }}" class="btn btn-primary mt-2">
                                                    Add First Organiser
                                                </a>
                                            </td>
                                        </tr>
                                        @endforelse
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
