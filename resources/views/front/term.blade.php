@extends('front.layout.master')

@section('title', 'Terms and Conditions | SingleEvent')

@section('content')
@include('front.layout.navigation')

<div class="common-banner" style="background-image: url('{{ asset('dist-front/images/banner.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Terms and Conditions</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Terms and Conditions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page pt_70 pb_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="terms-content">
                    {!! $term_page_data->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
