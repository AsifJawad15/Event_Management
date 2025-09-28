@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>FAQ Management</h1>
            <div class="section-header-button">
                <a href="{{ route('admin_faq_create') }}" class="btn btn-primary">Add New FAQ</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($faqs as $faq)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ Str::limit($faq->question, 60) }}</td>
                                            <td>{{ Str::limit($faq->answer, 80) }}</td>
                                            <td>{{ $faq->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin_faq_show', $faq->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin_faq_edit', $faq->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin_faq_destroy', $faq->id) }}" method="POST" style="display: inline-block;"
                                                          onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No FAQs found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            @if($faqs->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $faqs->links() }}
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
