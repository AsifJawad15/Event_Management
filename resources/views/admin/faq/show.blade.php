@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>View FAQ</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin_faq_index') }}">FAQ Management</a></div>
                <div class="breadcrumb-item active">View FAQ</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Question:</h5>
                                    <p class="border p-3 rounded bg-light">{{ $faq->question }}</p>

                                    <h5>Answer:</h5>
                                    <div class="border p-3 rounded bg-light">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>

                                    <div class="mt-4">
                                        <p><strong>Created:</strong> {{ $faq->created_at->format('M d, Y H:i A') }}</p>
                                        <p><strong>Last Updated:</strong> {{ $faq->updated_at->format('M d, Y H:i A') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a href="{{ route('admin_faq_edit', $faq->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit FAQ
                                </a>
                                <a href="{{ route('admin_faq_index') }}" class="btn btn-secondary ml-2">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('admin_faq_destroy', $faq->id) }}" method="POST"
                                      style="display: inline-block;" class="ml-2"
                                      onsubmit="return confirm('Are you sure you want to delete this FAQ? This action cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i> Delete FAQ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
