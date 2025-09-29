@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Package</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_package_update', $package->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Package Name *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $package->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Package Price *</label>
                                            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $package->price) }}">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Maximum Tickets</label>
                                            <input type="number" min="1" class="form-control @error('maximum_tickets') is-invalid @enderror" name="maximum_tickets" value="{{ old('maximum_tickets', $package->maximum_tickets) }}">
                                            @error('maximum_tickets')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Order *</label>
                                            <input type="number" min="0" class="form-control @error('item_order') is-invalid @enderror" name="item_order" value="{{ old('item_order', $package->item_order) }}">
                                            @error('item_order')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">Current Package Facilities</label>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0">Existing Facilities</h6>
                                                </div>
                                                <div class="card-body">
                                                    @if($package->facilities->count() > 0)
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Status</th>
                                                                        <th>Order</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($package->facilities as $facility)
                                                                    <tr>
                                                                        <td>{{ $facility->name }}</td>
                                                                        <td>
                                                                            @if($facility->status)
                                                                                <span class="badge badge-success">Active</span>
                                                                            @else
                                                                                <span class="badge badge-danger">Inactive</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $facility->item_order }}</td>
                                                                        <td>
                                                                            <a href="{{ route('admin_package_facility_edit', $facility->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                                            <form method="POST" action="{{ route('admin_package_facility_delete', $facility->id) }}" style="display: inline-block;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this facility?')">Delete</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @else
                                                        <p class="text-muted">No facilities assigned to this package yet.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label class="form-label">Add New Facilities</label>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0">Add More Facilities</h6>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="addFacility()">Add Facility</button>
                                                </div>
                                                <div class="card-body">
                                                    <div id="facility-container">
                                                        <!-- New facilities will be added here dynamically -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('admin_package_index') }}" class="btn btn-primary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
let facilityIndex = 0;

function addFacility() {
    const container = document.getElementById('facility-container');
    const facilityRow = document.createElement('div');
    facilityRow.className = 'row mb-3 facility-row';
    facilityRow.innerHTML = `
        <div class="col-md-4">
            <input type="text" class="form-control" name="facility[${facilityIndex}]" placeholder="Facility Name">
        </div>
        <div class="col-md-3">
            <select name="status[${facilityIndex}]" class="form-control">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="number" class="form-control" name="order[${facilityIndex}]" placeholder="Order" value="0">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger btn-sm" onclick="removeFacility(this)">Remove</button>
        </div>
    `;
    container.appendChild(facilityRow);
    facilityIndex++;
}

function removeFacility(button) {
    button.closest('.facility-row').remove();
}
</script>
@endsection
