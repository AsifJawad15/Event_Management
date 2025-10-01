@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')
<div class="main-content">
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Messages with {{ $attendee->name }}</h1>
            <div class="ml-auto">
                <a href="{{ route('admin_message_index') }}" class="btn btn-primary">Back to All Attendees</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="message-heading">Write Message</h4>
                            <form action="{{ route('admin_message_detail_submit',$attendee->id) }}" method="post">
                                @csrf
                                <div class="mb-2">
                                    <textarea name="message" class="form-control h_100" cols="30" rows="10" placeholder="Write your message here" required></textarea>
                                </div>
                                <div class="mb-2 text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                            <h4 class="message-heading mt_40">All Messages</h4>

                            @forelse($messages as $message)
                            @php
                            if($message->admin_id == 1) {
                                $message_class = 'message-item-admin-border';
                                $user_name = Auth::guard('admin')->user()->name;
                                $designation = 'Admin';
                                $photo = Auth::guard('admin')->user()->photo ?? 'default.png';
                            } else {
                                $message_class = '';
                                $user_name = $attendee->name;
                                $designation = 'Attendee';
                                $photo = $attendee->photo;
                                if($photo == '' || $photo == null) {
                                    $photo = 'default.png';
                                }
                            }
                            @endphp
                            <div class="message-item {{ $message_class }}">
                                <div class="message-top">
                                    <div class="left">
                                        <img src="{{ asset('uploads/'.$photo) }}" alt="">
                                    </div>
                                    <div class="right">
                                        <h4>{{ $user_name }}</h4>
                                        <h5>{{ $designation }}</h5>
                                        <div class="date-time">{{ $message->created_at->format('M d, Y h:i A') }}</div>
                                    </div>
                                </div>
                                <div class="message-bottom">
                                    <p>
                                        {!! nl2br(e($message->message)) !!}
                                    </p>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-info">
                                No messages found with this attendee yet.
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
