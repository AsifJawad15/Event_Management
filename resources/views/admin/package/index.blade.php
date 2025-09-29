@extends('admin.layout.app')

@section('heading', 'Packages')

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="tab_1" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">All Packages</a>
                                <a class="nav-link" id="tab_2" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Add New Package</a>
                                <a class="nav-link" id="tab_3" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Manage Facilities</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                
                                {{-- All Packages Tab --}}
                                <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="tab_1">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Max Tickets</th>
                                                    <th>Order</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($packages as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>${{ number_format($row->price, 2) }}</td>
                                                    <td>{{ $row->maximum_tickets ?? 'Unlimited' }}</td>
                                                    <td>{{ $row->item_order }}</td>
                                                    <td class="pt_10 pb_10">
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_{{ $row->id }}" title="Edit"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-sm" onClick="deleteData({{ $row->id }})" title="Delete"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                {{-- Edit Modal --}}
                                                <div class="modal fade" id="modal_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_{{ $row->id }}_label" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modal_{{ $row->id }}_label">Edit Package</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('admin_package_update', $row->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group mb-3">
                                                                                <label>Package Name *</label>
                                                                                <input type="text" class="form-control" name="name" value="{{ $row->name }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-3">
                                                                                <label>Price *</label>
                                                                                <input type="number" step="0.01" class="form-control" name="price" value="{{ $row->price }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group mb-3">
                                                                                <label>Maximum Tickets</label>
                                                                                <input type="number" class="form-control" name="maximum_tickets" value="{{ $row->maximum_tickets }}">
                                                                                <small class="form-text text-muted">Leave empty for unlimited</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group mb-3">
                                                                                <label>Item Order *</label>
                                                                                <input type="number" class="form-control" name="item_order" value="{{ $row->item_order }}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group mb-3">
                                                                                <label>Facilities</label>
                                                                                @if($facilities->count() > 0)
                                                                                    <div class="row">
                                                                                        @foreach($facilities as $facility)
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-check">
                                                                                                <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}" 
                                                                                                    {{ $row->facilities->contains($facility->id) ? 'checked' : '' }} 
                                                                                                    id="facility_{{ $row->id }}_{{ $facility->id }}">
                                                                                                <label class="form-check-label" for="facility_{{ $row->id }}_{{ $facility->id }}">
                                                                                                    {{ $facility->name }}
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                @else
                                                                                    <p class="text-muted">No facilities available. <a href="#" class="nav-link d-inline p-0" data-toggle="pill" href="#v-pills-3">Create facilities first</a></p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
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

                                {{-- Add New Package Tab --}}
                                <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="tab_2">
                                    <form action="{{ route('admin_package_store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label>Package Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Price *</label>
                                                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label>Maximum Tickets</label>
                                                    <input type="number" class="form-control" name="maximum_tickets" value="{{ old('maximum_tickets') }}">
                                                    <small class="form-text text-muted">Leave empty for unlimited</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label>Item Order *</label>
                                                    <input type="number" class="form-control" name="item_order" value="{{ old('item_order', 0) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <label>Facilities</label>
                                                    @if($facilities->count() > 0)
                                                        <div class="row">
                                                            @foreach($facilities as $facility)
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="facilities[]" value="{{ $facility->id }}" 
                                                                        {{ in_array($facility->id, old('facilities', [])) ? 'checked' : '' }} 
                                                                        id="new_facility_{{ $facility->id }}">
                                                                    <label class="form-check-label" for="new_facility_{{ $facility->id }}">
                                                                        {{ $facility->name }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <p class="text-muted">No facilities available. <a href="#" class="nav-link d-inline p-0" data-toggle="pill" href="#v-pills-3">Create facilities first</a></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                {{-- Manage Facilities Tab --}}
                                <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="tab_3">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_facility">Add New Facility</button>
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
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
                                                    <td class="pt_10 pb_10">
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_facility_{{ $facility->id }}" title="Edit"><i class="fas fa-edit"></i></button>
                                                        <button class="btn btn-danger btn-sm" onClick="deleteFacilityData({{ $facility->id }})" title="Delete"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                {{-- Edit Facility Modal --}}
                                                <div class="modal fade" id="modal_edit_facility_{{ $facility->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Facility</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('admin_package_facility_update', $facility->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-3">
                                                                        <label>Facility Name *</label>
                                                                        <input type="text" class="form-control" name="name" value="{{ $facility->name }}" required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Status *</label>
                                                                        <select name="status" class="form-control" required>
                                                                            <option value="1" {{ $facility->status == 1 ? 'selected' : '' }}>Active</option>
                                                                            <option value="0" {{ $facility->status == 0 ? 'selected' : '' }}>Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Item Order *</label>
                                                                        <input type="number" class="form-control" name="item_order" value="{{ $facility->item_order }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Add Facility Modal --}}
                                    <div class="modal fade" id="modal_add_facility" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add New Facility</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin_package_facility_store') }}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group mb-3">
                                                            <label>Facility Name *</label>
                                                            <input type="text" class="form-control" name="name" required>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Status *</label>
                                                            <select name="status" class="form-control" required>
                                                                <option value="1" selected>Active</option>
                                                                <option value="0">Inactive</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label>Item Order *</label>
                                                            <input type="number" class="form-control" name="item_order" value="0" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Create</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deleteData(id) {
    if (confirm("Are you sure you want to delete this package?")) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('admin/packages') }}/" + id,
            type: 'DELETE',
            success: function(result) {
                location.reload();
            }
        });
    }
}

function deleteFacilityData(id) {
    if (confirm("Are you sure you want to delete this facility? It will be removed from all packages.")) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: "{{ url('admin/package-facilities') }}/" + id,
            type: 'DELETE',
            success: function(result) {
                location.reload();
            }
        });
    }
}
</script>
@endsection