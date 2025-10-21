@extends('front.layout.master')

@section('title', 'FAQ | SingleEvent')

@section('main_content')
@include('front.layout.dark-nav')

<style>
:root {
    --primary: #667eea;
    --secondary: #764ba2;
    --dark-bg: #0f172a;
    --card-bg: rgba(30, 41, 59, 0.85);
}

.faq-wrapper {
    background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
    min-height: 100vh;
    padding: 40px 0 80px;
}

/* Hero Section */
.faq-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9)),
                url('{{ asset("dist-front/images/banner.jpg") }}') center/cover;
    border-radius: 30px;
    padding: 80px 40px;
    margin-bottom: 50px;
    position: relative;
    overflow: hidden;
    text-align: center;
    animation: slideDown 0.8s ease;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

.faq-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: rotateGlow 20s linear infinite;
}

@keyframes rotateGlow {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.faq-hero-content {
    position: relative;
    z-index: 2;
}

.faq-hero h1 {
    font-size: 56px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 15px;
    text-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
    letter-spacing: 2px;
}

.faq-hero p {
    font-size: 20px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
}

/* FAQ Section */
.faq-section {
    animation: fadeInUp 0.8s ease 0.2s both;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Accordion Styling */
.faq-accordion {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.faq-accordion .card {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(102, 126, 234, 0.2);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-accordion .card:hover {
    border-color: rgba(102, 126, 234, 0.5);
    box-shadow: 0 15px 50px rgba(102, 126, 234, 0.2);
    transform: translateY(-3px);
}

.faq-accordion .card-header {
    background: transparent;
    border: none;
    padding: 0;
}

.faq-accordion .card-header .btn-link {
    width: 100%;
    text-align: left;
    padding: 25px 30px;
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.3s ease;
    border: none;
    background: transparent;
    position: relative;
}

.faq-accordion .card-header .btn-link:hover {
    background: rgba(102, 126, 234, 0.1);
    padding-left: 35px;
}

.faq-accordion .card-header .btn-link:focus {
    outline: none;
    box-shadow: none;
}

.faq-accordion .card-header .btn-link::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 0;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 0 4px 4px 0;
    transition: height 0.3s ease;
}

.faq-accordion .card-header .btn-link:hover::before,
.faq-accordion .card-header .btn-link:not(.collapsed)::before {
    height: 60%;
}

.faq-accordion .card-header .btn-link::after {
    content: '\f107';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    font-size: 22px;
    color: var(--primary);
    transition: all 0.3s ease;
    flex-shrink: 0;
    margin-left: 15px;
}

.faq-accordion .card-header .btn-link.collapsed::after {
    transform: rotate(-90deg);
}

.faq-accordion .card-body {
    padding: 0 30px 30px 30px;
    color: rgba(255, 255, 255, 0.85);
    line-height: 1.8;
    font-size: 16px;
    border-top: 1px solid rgba(102, 126, 234, 0.1);
}

/* Empty State */
.empty-state {
    background: var(--card-bg);
    backdrop-filter: blur(20px);
    border-radius: 25px;
    padding: 60px 40px;
    text-align: center;
    border: 1px solid rgba(102, 126, 234, 0.2);
}

.empty-state i {
    font-size: 80px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
    display: block;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(0.95); }
}

.empty-state h3 {
    color: #fff;
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}

.empty-state p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 16px;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .faq-hero {
        padding: 60px 20px;
    }

    .faq-hero h1 {
        font-size: 36px;
    }

    .faq-hero p {
        font-size: 16px;
    }

    .faq-accordion .card-header .btn-link {
        font-size: 16px;
        padding: 20px 25px;
    }

    .faq-accordion .card-body {
        padding: 0 25px 25px 25px;
        font-size: 15px;
    }
}
</style>

<div class="faq-wrapper">
    <div class="container">
        <!-- Hero Section -->
        <div class="faq-hero">
            <div class="faq-hero-content">
                <h1>FREQUENTLY ASKED QUESTIONS</h1>
                <p>Find answers to common questions about our events</p>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div id="accordion" class="faq-accordion">
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
                            <div class="empty-state">
                                <i class="fas fa-question-circle"></i>
                                <h3>No FAQs Available</h3>
                                <p>Please check back later or contact us if you have any questions.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
