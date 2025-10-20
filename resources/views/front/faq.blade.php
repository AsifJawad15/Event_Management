@extends('front.layout.master')@extends('front.layout.master')



@section('title', 'FAQ | SingleEvent')@section('title', 'Faq | SingleEvent')



@section('main_content')@section('main_content')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">

@include('front.layout.dark-theme')    <div class="container">

@include('front.layout.dark-nav')        <div class="row">

            <div class="col-md-12">

<style>                <div class="item">

.faq-hero {                    <h2>Frequently Asked Questions (FAQ)</h2>

    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);                    <div class="breadcrumb-container">

    padding: 120px 0 80px;                        <ol class="breadcrumb">

    text-align: center;                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>

}                            <li class="breadcrumb-item active">FAQ</li>

                        </ol>

.faq-hero h1 {                    </div>

    font-size: 56px;                </div>

    font-weight: 700;            </div>

    color: #fff;        </div>

    text-shadow: 0 4px 20px rgba(0,0,0,0.3);    </div>

}</div>



.faq-accordion .card {<div id="faq-section" class="pt_50 pb_50 gray">

    background: rgba(26, 31, 58, 0.8);    <div class="container">

    backdrop-filter: blur(20px);        <div class="row">

    border-radius: 15px;            <div class="col-lg-12 col-md-12">

    border: 1px solid rgba(102, 126, 234, 0.3);

    box-shadow: 0 5px 20px rgba(0,0,0,0.3);                <div id="accordion" class="faq">

    margin-bottom: 15px;                    @if($faqs->count() > 0)

    overflow: hidden;                        @foreach($faqs as $index => $faq)

}                        <div class="card">

                            <div class="card-header" id="heading{{ $index }}">

.faq-accordion .card-header {                                <h5 class="mb-0">

    background: transparent;                                    <button class="btn btn-link {{ $index === 0 ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">

    border-bottom: 1px solid rgba(102, 126, 234, 0.2);                                        {{ $faq->question }}

    padding: 0;                                    </button>

}                                </h5>

                            </div>

.faq-accordion .card-header .btn-link {

    width: 100%;                            <div id="collapse{{ $index }}" class="collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">

    text-align: left;                                <div class="card-body">

    padding: 20px 25px;                                    {!! nl2br(e($faq->answer)) !!}

    color: #fff;                                </div>

    font-size: 18px;                            </div>

    font-weight: 600;                        </div>

    text-decoration: none;                        @endforeach

    display: flex;                    @else

    align-items: center;                        <div class="card">

    justify-content: space-between;                            <div class="card-header" id="headingEmpty">

    transition: all 0.3s ease;                                <h5 class="mb-0">

}                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseEmpty" aria-expanded="true" aria-controls="collapseEmpty">

                                        No FAQs Available

.faq-accordion .card-header .btn-link::after {                                    </button>

    content: '\f107';                                </h5>

    font-family: 'Font Awesome 5 Free';                            </div>

    font-weight: 900;

    font-size: 20px;                            <div id="collapseEmpty" class="collapse show" aria-labelledby="headingEmpty" data-parent="#accordion">

    color: #667eea;                                <div class="card-body">

    transition: all 0.3s ease;                                    No FAQs are currently available. Please check back later or contact us if you have any questions.

}                                </div>

                            </div>

.faq-accordion .card-header .btn-link.collapsed::after {                        </div>

    transform: rotate(-90deg);                    @endif

}                </div>



.faq-accordion .card-header .btn-link:hover {            </div>

    background: rgba(102, 126, 234, 0.1);        </div>

}    </div>

</div>

.faq-accordion .card-body {
    padding: 20px 25px;
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.8;
    font-size: 16px;
}

@media (max-width: 991px) {
    .faq-hero h1 { font-size: 36px; }
}
</style>

<div class="faq-hero">
    <div class="container">
        <h1 class="animate-on-scroll">FAQ</h1>
    </div>
</div>

<section id="faq">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our events</p>
        </div>

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div id="accordion" class="faq-accordion">
                    @if($faqs->count() > 0)
                        @foreach($faqs as $index => $faq)
                        <div class="card animate-on-scroll">
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
                        <div class="dark-card text-center p-5">
                            <i class="fas fa-question-circle" style="font-size: 60px; color: rgba(102, 126, 234, 0.5); margin-bottom: 20px;"></i>
                            <h3 style="color: #fff;">No FAQs Available</h3>
                            <p style="color: rgba(224, 224, 224, 0.8);">Please check back later or contact us if you have any questions.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
