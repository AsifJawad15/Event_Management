@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Package</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_package_store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label">Package Name *</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
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
                                            <input type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}">
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
                                            <input type="number" min="1" class="form-control @error('maximum_tickets') is-invalid @enderror" name="maximum_tickets" value="{{ old('maximum_tickets') }}">
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
                                            <input type="number" min="0" class="form-control @error('item_order') is-invalid @enderror" name="item_order" value="{{ old('item_order', 0) }}">
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
                                            <label class="form-label">Package Facilities</label>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="mb-0">Add New Facilities</h6>
                                                    <button type="button" class="btn btn-success btn-sm" onclick="addFacility()">Add Facility</button>
                                                </div>
                                                <div class="card-body">
                                                    <div id="facility-container">
                                                        <!-- Facilities will be added here dynamically -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label"></label>
                                    <button type="submit" class="btn btn-success">Submit</button>
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

// Add one facility row by default
document.addEventListener('DOMContentLoaded', function() {
    addFacility();
});
</script>
@endsection
