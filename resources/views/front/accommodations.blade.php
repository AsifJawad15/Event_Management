@extends('front.layout.master')

@section('content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Accommodations</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Accommodations</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="speakers" class="pt_70 pb_70 white team speakers-item">
    <div class="container">
        @foreach($accommodations as $accommodation)
        <div class="row mb_40">
            <div class="col-lg-4 col-sm-12 col-xs-12">
                <div class="speaker-detail-img">
                    @if($accommodation->photo)
                        <img src="{{ asset('uploads/'.$accommodation->photo) }}" alt="{{ $accommodation->name }}">
                    @else
                        <img src="{{ asset('dist-front/images/accommodation-1.jpg') }}" alt="{{ $accommodation->name }}">
                    @endif
                </div>
            </div>
            <div class="col-lg-8 col-sm-12 col-xs-12">
                <div class="speaker-detail">
                    <h2 class="mb_15">{{ $accommodation->name }}</h2>
                    <p>
                        {{ $accommodation->description }}
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Address:</b></th>
                                <td>{{ $accommodation->address }}</td>
                            </tr>
                            @if($accommodation->email)
                            <tr>
                                <th><b>Email:</b></th>
                                <td>{{ $accommodation->email }}</td>
                            </tr>
                            @endif
                            @if($accommodation->phone)
                            <tr>
                                <th><b>Phone:</b></th>
                                <td>{{ $accommodation->phone }}</td>
                            </tr>
                            @endif
                            @if($accommodation->website)
                            <tr>
                                <th><b>Website:</b></th>
                                <td>
                                    <a href="{{ $accommodation->website }}" target="_blank">{{ $accommodation->website }}</a>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
