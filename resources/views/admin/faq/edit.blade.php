@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit FAQ</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin_faq_index') }}">FAQ Management</a></div>
                <div class="breadcrumb-item active">Edit FAQ</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Current FAQ Display -->
                            <div class="mb-4">
                                <h6>Current FAQ:</h6>
                                <div class="border p-3 rounded bg-light">
                                    <p><strong>Question:</strong> {{ $faq->question }}</p>
                                    <p><strong>Answer:</strong> {{ $faq->answer }}</p>
                                    <p><strong>Created:</strong> {{ $faq->created_at->format('M d, Y H:i') }}</p>
                                    <p><strong>Last Updated:</strong> {{ $faq->updated_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>

                            <hr>

                            <form action="{{ route('admin_faq_update', $faq->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="question">Question <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('question') is-invalid @enderror"
                                            id="question" name="question" rows="3"
                                            placeholder="Enter the FAQ question" required>{{ old('question', $faq->question) }}</textarea>
                                    @error('question')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="answer">Answer <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('answer') is-invalid @enderror"
                                            id="answer" name="answer" rows="6"
                                            placeholder="Enter the FAQ answer" required>{{ old('answer', $faq->answer) }}</textarea>
                                    @error('answer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update FAQ
                                    </button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
