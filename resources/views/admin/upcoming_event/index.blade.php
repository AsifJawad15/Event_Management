@extends('admin.layout.master')

@section('main_content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Upcoming Events</h1>
            <div class="section-header-button">
                <a href="{{ route('admin_upcoming_event_create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Event
                </a>
            </div>
        </div>

        <div class="section-body">
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
                            <h4>All Upcoming Events</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="10%">Image</th>
                                            <th width="20%">Title</th>
                                            <th width="25%">Description</th>
                                            <th width="10%">Event Date</th>
                                            <th width="8%">Status</th>
                                            <th width="7%">Order</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($upcomingEvents as $index => $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ $event->image_url }}"
                                                     alt="{{ $event->title }}"
                                                     class="img-thumbnail"
                                                     style="width: 80px; height: 80px; object-fit: cover;">
                                            </td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ Str::limit($event->description, 80) }}</td>
                                            <td>{{ $event->formatted_date }}</td>
                                            <td>
                                                <span class="badge badge-{{ $event->status == 'active' ? 'success' : 'danger' }}">
                                                    {{ ucfirst($event->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">{{ $event->order }}</td>
                                            <td>
                                                <a href="{{ route('admin_upcoming_event_edit', $event->id) }}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin_upcoming_event_destroy', $event->id) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this event?');">
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
                                            <td colspan="8" class="text-center">No upcoming events found</td>
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
