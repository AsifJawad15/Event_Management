@extends('admin.layout.master')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Event Management</h1>
            <div class="ml-auto">
                <a href="{{ route('admin_event_create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create New Event
                </a>
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
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Date Range</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Featured</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($events as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($event->thumbnail_image)
                                                <img src="{{ asset('uploads/'.$event->thumbnail_image) }}" alt="{{ $event->name }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                @else
                                                <span class="badge badge-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $event->name }}</strong><br>
                                                <small class="text-muted">{{ Str::limit($event->description, 50) }}</small>
                                            </td>
                                            <td>
                                                <strong>{{ $event->start_date->format('M d, Y') }}</strong><br>
                                                <small class="text-muted">to {{ $event->end_date->format('M d, Y') }}</small>
                                            </td>
                                            <td>
                                                @if($event->location)
                                                <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                                                @else
                                                <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($event->status == 'Published')
                                                <span class="badge badge-success">Published</span>
                                                @elseif($event->status == 'Draft')
                                                <span class="badge badge-warning">Draft</span>
                                                @elseif($event->status == 'Completed')
                                                <span class="badge badge-info">Completed</span>
                                                @else
                                                <span class="badge badge-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($event->is_featured)
                                                <span class="badge badge-primary"><i class="fas fa-star"></i> Featured</span>
                                                @else
                                                <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_event_edit', $event->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin_event_delete', $event->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $events->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
