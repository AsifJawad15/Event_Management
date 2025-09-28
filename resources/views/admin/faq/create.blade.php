@extends('admin.layout.master')

@section('main_content')
<div class="main-sidebar sidebar-style-2">
    @include('admin.layout.sidebar')
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New FAQ</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin_faq_index') }}">FAQ Management</a></div>
                <div class="breadcrumb-item active">Add FAQ</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_faq_store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="question">Question <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('question') is-invalid @enderror"
                                            id="question" name="question" rows="3"
                                            placeholder="Enter the FAQ question" required>{{ old('question') }}</textarea>
                                    @error('question')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="answer">Answer <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('answer') is-invalid @enderror"
                                            id="answer" name="answer" rows="6"
                                            placeholder="Enter the FAQ answer" required>{{ old('answer') }}</textarea>
                                    @error('answer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Add FAQ
                                    </button>
                                    <a href="{{ route('admin_faq_index') }}" class="btn btn-secondary ml-2">
                                        <i class="fas fa-arrow-left"></i> Back to List
                                    </a>
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
