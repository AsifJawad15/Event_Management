@extends('front.layout.master')<a href="{{ route('front.home') }}">Home</a> | <a href="{{ route('about') }}">About</a> | <a href="{{ route('login') }}">Login</a> | <a href="{{ route('register') }}">Register</a>

<h2>About Page</h2>

@section('title', 'About | SingleEvent')

@section('main_content')

@include('front.layout.dark-theme')
@include('front.layout.dark-nav')

<style>
.about-hero {
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
    padding: 120px 0 80px;
    text-align: center;
}

.about-hero h1 {
    font-size: 56px;
    font-weight: 700;
    color: #fff;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
}

.about-content {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 50px;
    border: 1px solid rgba(102, 126, 234, 0.3);
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
}

.about-content h2 {
    font-size: 36px;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 25px;
}

.about-content h3 {
    font-size: 28px;
    color: #fff;
    margin-top: 40px;
    margin-bottom: 20px;
}

.about-content p {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.9;
    font-size: 17px;
    margin-bottom: 20px;
}

.about-content ul {
    color: rgba(224, 224, 224, 0.9);
    line-height: 1.9;
    margin-bottom: 20px;
}

.about-content ul li {
    margin-bottom: 10px;
    position: relative;
    padding-left: 25px;
}

.about-content ul li::before {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    color: #667eea;
    position: absolute;
    left: 0;
}

@media (max-width: 991px) {
    .about-hero h1 { font-size: 36px; }
    .about-content { padding: 30px 20px; }
}
</style>

<div class="about-hero">
    <div class="container">
        <h1 class="animate-on-scroll">About Us</h1>
    </div>
</div>

<section id="about">
    <div class="container">
        <div class="section-heading animate-on-scroll">
            <h2>Learn More About Our Event</h2>
            <p>Discover what makes our event special and why you should join us</p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="about-content animate-on-scroll">
                    <h2>Welcome to SingleEvent</h2>
                    <p>
                        SingleEvent is a premier event management platform designed to bring together industry leaders,
                        innovators, and enthusiasts from around the world. Our mission is to create meaningful connections
                        and facilitate knowledge sharing through carefully curated conferences and events.
                    </p>

                    <h3>Our Vision</h3>
                    <p>
                        We envision a world where professionals can easily connect, learn, and grow together. Through
                        our events, we strive to create an environment that fosters innovation, collaboration, and
                        professional development.
                    </p>

                    <h3>What We Offer</h3>
                    <ul>
                        <li>World-class speakers and industry experts</li>
                        <li>Interactive workshops and hands-on sessions</li>
                        <li>Networking opportunities with like-minded professionals</li>
                        <li>Access to cutting-edge knowledge and insights</li>
                        <li>Premium venue and facilities</li>
                        <li>Comprehensive event experience from start to finish</li>
                    </ul>

                    <h3>Why Attend?</h3>
                    <p>
                        Attending our events provides you with unparalleled access to industry leaders, innovative ideas,
                        and a community of passionate professionals. Whether you're looking to expand your network,
                        gain new skills, or stay ahead of industry trends, our events offer something for everyone.
                    </p>

                    <h3>Join Us</h3>
                    <p>
                        Be part of an extraordinary experience that will inspire, educate, and connect you with the
                        best minds in the industry. Register today and take the first step towards professional excellence.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
