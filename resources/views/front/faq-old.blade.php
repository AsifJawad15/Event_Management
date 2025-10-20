@extends('front.layout.master')

@section('title', 'Faq | SingleEvent')

@section('main_content')
<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Frequently Asked Questions (FAQ)</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">FAQ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="faq-section" class="pt_50 pb_50 gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div id="accordion" class="faq">
                    @if($faqs->count() > 0)
                        @foreach($faqs as $index => $faq)
                        <div class="card">
                            <div class="card-header" id="heading{{ $index }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link {{ $index === 0 ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        {{ $faq->question }}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{ $index }}" class="collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                                <div class="card-body">
                                    {!! nl2br(e($faq->answer)) !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="card">
                            <div class="card-header" id="headingEmpty">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseEmpty" aria-expanded="true" aria-controls="collapseEmpty">
                                        No FAQs Available
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseEmpty" class="collapse show" aria-labelledby="headingEmpty" data-parent="#accordion">
                                <div class="card-body">
                                    No FAQs are currently available. Please check back later or contact us if you have any questions.
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
