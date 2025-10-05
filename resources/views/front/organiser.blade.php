@extends('front.layout.master')

@section('title', $organiser->name . ' | SingleEvent')
@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>{{ $organiser->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.organisers') }}">Organisers</a></li>
                            <li class="breadcrumb-item active">{{ $organiser->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="speakers" class="pt_70 pb_70 white team speakers-item">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="speaker-detail-img">
                    @if($organiser->photo)
                        <img src="{{ asset('uploads/' . $organiser->photo) }}" alt="{{ $organiser->name }}" style="width: 100%; height: auto;">
                    @else
                        <div style="background: #f8f9fa; padding: 60px; text-align: center; border: 1px solid #dee2e6;">
                            <i class="fas fa-user" style="font-size: 60px; color: #6c757d;"></i>
                            <h4 class="mt-3">{{ $organiser->name }}</h4>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2>{{ $organiser->name }}</h2>
                    <h4 class="mb_20">{{ $organiser->designation }}</h4>

                    @if($organiser->biography)
                        {!! nl2br(e($organiser->biography)) !!}
                    @endif

                    <h4>More Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if($organiser->address)
                            <tr>
                                <th><b>Address:</b></th>
                                <td>{{ $organiser->address }}</td>
                            </tr>
                            @endif
                            @if($organiser->email)
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $organiser->email }}</td>
                            </tr>
                            @endif
                            @if($organiser->phone)
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $organiser->phone }}</td>
                            </tr>
                            @endif
                            @if($organiser->facebook || $organiser->twitter || $organiser->linkedin || $organiser->instagram)
                            <tr>
                                <th><b>Social:</b></th>
                                <td>
                                    <ul class="social-icon">
                                        @if($organiser->facebook)
                                        <li>
                                            <a href="{{ $organiser->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if($organiser->twitter)
                                        <li>
                                            <a href="{{ $organiser->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($organiser->linkedin)
                                        <li>
                                            <a href="{{ $organiser->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if($organiser->instagram)
                                        <li>
                                            <a href="{{ $organiser->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
