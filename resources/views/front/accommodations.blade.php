@extends('front.layout.master')@extends('front.layout.master')



@section('title', 'Accommodations | SingleEvent')@section('title', 'Accommodations | SingleEvent')



@section('main_content')@section('main_content')



@include('front.layout.dark-theme')<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">

@include('front.layout.dark-nav')    <div class="container">

        <div class="row">

<style>            <div class="col-md-12">

.accommodations-hero {                <div class="item">

    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);                    <h2>Accommodations</h2>

    padding: 120px 0 80px;                    <div class="breadcrumb-container">

    text-align: center;                        <ol class="breadcrumb">

}                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>

                            <li class="breadcrumb-item active">Accommodations</li>

.accommodations-hero h1 {                        </ol>

    font-size: 56px;                    </div>

    font-weight: 700;                </div>

    color: #fff;            </div>

    text-shadow: 0 4px 20px rgba(0,0,0,0.3);        </div>

}    </div>

</div>

.accommodation-card {

    background: rgba(26, 31, 58, 0.8);<div id="speakers" class="pt_70 pb_70 white team speakers-item">

    backdrop-filter: blur(20px);    <div class="container">

    border-radius: 20px;        @foreach($accommodations as $accommodation)

    overflow: hidden;        <div class="row mb_40">

    border: 1px solid rgba(102, 126, 234, 0.3);            <div class="col-lg-4 col-sm-12 col-xs-12">

    box-shadow: 0 10px 40px rgba(0,0,0,0.5);                <div class="speaker-detail-img">

    margin-bottom: 40px;                    @if($accommodation->photo)

    transition: all 0.4s ease;                        <img src="{{ asset('uploads/'.$accommodation->photo) }}" alt="{{ $accommodation->name }}">

}                    @else

                        <img src="{{ asset('dist-front/images/accommodation-1.jpg') }}" alt="{{ $accommodation->name }}">

.accommodation-card:hover {                    @endif

    transform: translateY(-10px);                </div>

    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);            </div>

}            <div class="col-lg-8 col-sm-12 col-xs-12">

                <div class="speaker-detail">

.accommodation-image {                    <h2 class="mb_15">{{ $accommodation->name }}</h2>

    position: relative;                    <p>

    overflow: hidden;                        {{ $accommodation->description }}

    height: 350px;                    </p>

}                    <div class="table-responsive">

                        <table class="table table-bordered">

.accommodation-image img {                            <tr>

    width: 100%;                                <th><b>Address:</b></th>

    height: 100%;                                <td>{{ $accommodation->address }}</td>

    object-fit: cover;                            </tr>

    transition: all 0.5s ease;                            @if($accommodation->email)

}                            <tr>

                                <th><b>Email:</b></th>

.accommodation-card:hover .accommodation-image img {                                <td>{{ $accommodation->email }}</td>

    transform: scale(1.1);                            </tr>

}                            @endif

                            @if($accommodation->phone)

.accommodation-content {                            <tr>

    padding: 40px;                                <th><b>Phone:</b></th>

}                                <td>{{ $accommodation->phone }}</td>

                            </tr>

.accommodation-content h2 {                            @endif

    font-size: 32px;                            @if($accommodation->website)

    font-weight: 700;                            <tr>

    color: #fff;                                <th><b>Website:</b></th>

    margin-bottom: 20px;                                <td>

}                                    <a href="{{ $accommodation->website }}" target="_blank">{{ $accommodation->website }}</a>

                                </td>

.accommodation-content p {                            </tr>

    color: rgba(224, 224, 224, 0.9);                            @endif

    line-height: 1.8;                        </table>

    margin-bottom: 30px;                    </div>

    font-size: 16px;                </div>

}            </div>

        </div>

.accommodation-info {        @endforeach

    margin-top: 30px;    </div>

}</div>

@endsection

.accommodation-info table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
}

.accommodation-info th {
    color: #667eea;
    font-weight: 600;
    padding: 15px 20px;
    background: rgba(102, 126, 234, 0.1);
    border-radius: 10px 0 0 10px;
    width: 150px;
}

.accommodation-info td {
    color: rgba(224, 224, 224, 0.9);
    padding: 15px 20px;
    background: rgba(26, 31, 58, 0.6);
    border-radius: 0 10px 10px 0;
}

.accommodation-info a {
    color: #667eea;
    transition: all 0.3s ease;
}

.accommodation-info a:hover {
    color: #764ba2;
    text-decoration: none;
}

@media (max-width: 991px) {
    .accommodations-hero h1 { font-size: 36px; }
    .accommodation-image { height: 280px; }
    .accommodation-content { padding: 30px 20px; }
}
</style>

<div class="accommodations-hero">
    <div class="container">
        <h1 class="animate-on-scroll">Accommodations</h1>
    </div>
</div>

<section id="accommodations">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Where to Stay</h2>
            <p>Comfortable and convenient accommodation options near the event venue</p>
        </div>

        @if($accommodations->count() > 0)
            @foreach($accommodations as $accommodation)
            <div class="row">
                <div class="col-12">
                    <div class="accommodation-card animate-on-scroll">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="accommodation-image">
                                    @if($accommodation->photo)
                                        <img src="{{ asset('uploads/'.$accommodation->photo) }}" alt="{{ $accommodation->name }}">
                                    @else
                                        <img src="{{ asset('dist-front/images/accommodation-1.jpg') }}" alt="{{ $accommodation->name }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="accommodation-content">
                                    <h2>{{ $accommodation->name }}</h2>
                                    <p>{{ $accommodation->description }}</p>

                                    <div class="accommodation-info">
                                        <table>
                                            <tr>
                                                <th><i class="fas fa-map-marker-alt"></i> Address:</th>
                                                <td>{{ $accommodation->address }}</td>
                                            </tr>
                                            @if($accommodation->email)
                                            <tr>
                                                <th><i class="fas fa-envelope"></i> Email:</th>
                                                <td><a href="mailto:{{ $accommodation->email }}">{{ $accommodation->email }}</a></td>
                                            </tr>
                                            @endif
                                            @if($accommodation->phone)
                                            <tr>
                                                <th><i class="fas fa-phone"></i> Phone:</th>
                                                <td>{{ $accommodation->phone }}</td>
                                            </tr>
                                            @endif
                                            @if($accommodation->website)
                                            <tr>
                                                <th><i class="fas fa-globe"></i> Website:</th>
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
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-12">
                    <div class="dark-card text-center p-5">
                        <i class="fas fa-hotel" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                        <h3 style="color: #fff;">No Accommodations Listed</h3>
                        <p style="color: rgba(224, 224, 224, 0.8);">Accommodation information will be available soon.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
