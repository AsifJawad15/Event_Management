@extends('front.layout.master')

@section('title', $sponsor->name . ' | SingleEvent')
@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Sponsor: {{ $sponsor->name }}</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('front.sponsors') }}">Sponsors</a></li>
                            <li class="breadcrumb-item active">{{ $sponsor->name }}</li>
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
                    @if($sponsor->featured_photo)
                        <img src="{{ asset('uploads/' . $sponsor->featured_photo) }}" alt="{{ $sponsor->name }}" style="width: 100%; height: auto;">
                    @elseif($sponsor->logo)
                        <img src="{{ asset('uploads/' . $sponsor->logo) }}" alt="{{ $sponsor->name }}" style="width: 100%; height: auto;">
                    @else
                        <div style="background: #f8f9fa; padding: 60px; text-align: center; border: 1px solid #dee2e6;">
                            <h4>{{ $sponsor->name }}</h4>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2>{{ $sponsor->name }}</h2>
                    @if($sponsor->tagline)
                        <h4 class="mb_20">{{ $sponsor->tagline }}</h4>
                    @endif
                    @if($sponsor->description)
                        <p>{{ $sponsor->description }}</p>
                    @endif

                    <h4>More Information</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if($sponsor->address)
                            <tr>
                                <th><b>Address:</b></th>
                                <td>{{ $sponsor->address }}</td>
                            </tr>
                            @endif
                            @if($sponsor->email)
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $sponsor->email }}</td>
                            </tr>
                            @endif
                            @if($sponsor->phone)
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $sponsor->phone }}</td>
                            </tr>
                            @endif
                            @if($sponsor->website)
                            <tr>
                                <th><b>Website:</b></th>
                                <td>
                                    <a href="{{ $sponsor->website }}" target="_blank">{{ $sponsor->website }}</a>
                                </td>
                            </tr>
                            @endif
                            @if($sponsor->facebook || $sponsor->twitter || $sponsor->linkedin || $sponsor->instagram)
                            <tr>
                                <th><b>Social:</b></th>
                                <td>
                                    <ul class="social-icon">
                                        @if($sponsor->facebook)
                                        <li>
                                            <a href="{{ $sponsor->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        @endif
                                        @if($sponsor->twitter)
                                        <li>
                                            <a href="{{ $sponsor->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        @endif
                                        @if($sponsor->linkedin)
                                        <li>
                                            <a href="{{ $sponsor->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        @endif
                                        @if($sponsor->instagram)
                                        <li>
                                            <a href="{{ $sponsor->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endif
                            @if($sponsor->sponsorCategory)
                            <tr>
                                <th><b>Category:</b></th>
                                <td>
                                    <span class="badge badge-primary">{{ $sponsor->sponsorCategory->name }}</span>
                                </td>
                            </tr>
                            @endif
                            @if($sponsor->map_iframe)
                            <tr>
                                <th>Map:</th>
                                <td>
                                    {!! $sponsor->map_iframe !!}
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
