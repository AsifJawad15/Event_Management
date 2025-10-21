@extends('front.layout.master')

@section('main_content')
@include('front.layout.dark-nav')

<!-- Banner Section -->
<section class="page-title" style="background-image: url({{ asset('dist-front/images/banner.jpg') }}); background-size: cover; background-position: center; position: relative; padding: 150px 0; text-align: center;">
    <div class="auto-container">
        <h2 style="color: white; font-size: 48px; font-weight: bold; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Messages</h2>
        <ul class="page-breadcrumb" style="list-style: none; padding: 0; margin: 0; color: white; font-size: 16px;">
            <li style="display: inline; color: #6bc24a;"><a href="{{ route('front.home') }}" style="color: #6bc24a; text-decoration: none; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Home</a></li>
            <li style="display: inline; margin: 0 10px; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);"> / </li>
            <li style="display: inline; color: white; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Messages</li>
        </ul>
    </div>
</section>

<div class="user-section pt_70 pb_70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="user-sidebar">
                    <div class="card">
                        @include('front.layout.sidebar')
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h4 class="message-heading">Write Message</h4>
                        <form action="{{ route('user.message.submit') }}" method="post">
                            @csrf
                            <div class="mb-2">
                                <textarea name="message" class="form-control h_100" cols="30" rows="10" placeholder="Write your message here" required></textarea>
                            </div>
                            <div class="mb-2 text-right">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>

                        <h4 class="message-heading mt_40">All Messages</h4>

                        @forelse($messages as $message)
                        @php
                        if($message->admin_id == 1) {
                            $message_class = 'message-item-admin-border';
                            $user_name = $admin->name;
                            $designation = 'Admin';
                            $photo = $admin->photo ?? 'default.png';
                        } else {
                            $message_class = '';
                            $user_name = Auth::guard('web')->user()->name;
                            $designation = 'Attendee';
                            $photo = Auth::guard('web')->user()->photo;
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
                            No messages found. Start a conversation with the admin!
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
