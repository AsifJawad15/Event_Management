@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Facility</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('admin_package_facility_update', $package_facility->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="form-label">Facility Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $package_facility->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Status *</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        <option value="Yes" {{ old('status', $package_facility->status ? 'Yes' : 'No') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ old('status', $package_facility->status ? 'Yes' : 'No') == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Item Order *</label>
                                    <input type="number" class="form-control @error('item_order') is-invalid @enderror" name="item_order" value="{{ old('item_order', $package_facility->item_order) }}">
                                    @error('item_order')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('admin_package_facility_index') }}" class="btn btn-primary">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
