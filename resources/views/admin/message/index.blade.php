@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Messages</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attendees as $attendee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($attendee->photo != '' && $attendee->photo != null)
                                                <img src="{{ asset('uploads/'.$attendee->photo) }}" alt="" class="w_100">
                                                @else
                                                <img src="{{ asset('uploads/default.png') }}" alt="" class="w_100">
                                                @endif
                                            </td>
                                            <td>{{ $attendee->name }}</td>
                                            <td>{{ $attendee->email }}</td>
                                            <td>
                                                <a href="{{ route('admin_message_detail',$attendee->id) }}" class="btn btn-success">View Messages</a>
                                            </td>
                                        </tr>
                                        @endforeach
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
