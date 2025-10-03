@extends('admin.layout.master')

@section('title', 'Privacy Page')

@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header d-flex justify-content-between">
            <h1>Privacy Page</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin_privacy_page_update') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label>Content *</label>
                                    <textarea name="content" class="form-control editor" cols="30" rows="10">{{ $page_data->content ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
