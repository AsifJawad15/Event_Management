@extends('admin.layout.master')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between">
        <div class="left">
            <h1>Testimonials</h1>
        </div>
        <div class="right">
            <a href="{{ route('admin_testimonial_create') }}" class="btn btn-primary">Add New Testimonial</a>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            @if($testimonial->photo)
                                                <img src="{{ asset('uploads/'.$testimonial->photo) }}"
                                                     alt="{{ $testimonial->name }}"
                                                     width="50" height="50" style="border-radius: 50%; object-fit: cover;">
                                            @else
                                                No photo
                                            @endif
                                        </td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td>{{ Str::limit($testimonial->comment, 100) }}</td>
                                        <td>
                                            <a href="{{ route('admin_testimonial_edit', $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin_testimonial_destroy', $testimonial->id) }}" method="POST" style="display: inline-block;"
                                                  onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No testimonials found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($testimonials->hasPages())
                        <div class="mt-4">
                            {{ $testimonials->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
