@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Manage Facilities</h1>
            <div class="section-header-button">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addFacilityModal">
                    Add New
                </button>
            </div>
        </div>
        <div class="section-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($facilities as $facility)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $facility->name }}</td>
                                            <td>
                                                @if($facility->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $facility->item_order }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editFacilityModal{{ $facility->id }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <form method="POST" action="{{ route('admin_package_facility_delete', $facility->id) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this facility?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Edit Facility Modal -->
                                        <div class="modal fade" id="editFacilityModal{{ $facility->id }}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Facility</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="{{ route('admin_package_facility_update', $facility->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name *</label>
                                                                <input type="text" class="form-control" name="name" value="{{ $facility->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status *</label>
                                                                <select name="status" class="form-control">
                                                                    <option value="Yes" {{ $facility->status == 1 ? 'selected' : '' }}>Yes</option>
                                                                    <option value="No" {{ $facility->status == 0 ? 'selected' : '' }}>No</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Order *</label>
                                                                <input type="number" class="form-control" name="item_order" value="{{ $facility->item_order }}" required>
                                                            </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add Facility Modal -->
<div class="modal fade" id="addFacilityModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Facility</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin_package_facility_store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label">Name *</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Order *</label>
                        <input type="number" class="form-control" name="item_order" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example1').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    });
});
</script>
@endsection
