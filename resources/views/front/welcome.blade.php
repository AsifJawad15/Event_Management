<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENTO - Event Management Platform</title>


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        body {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            font-family: 'Montserrat', sans-serif;
            color: #fff;
            position: relative;
        }

        /* Animated Background Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(76, 181, 46, 0.5);
            border-radius: 50%;
            animation: float 15s infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
        }

        /* Container */
        .welcome-container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        /* Header Section */
        .header-section {
            text-align: center;
            padding: 40px 20px;
            animation: fadeInDown 1s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-title {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .brand-name {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .brand-icon {
            width: 70px;
            height: 70px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .site-name {
            font-family: 'Righteous', cursive;
            font-size: 5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #4cb52e, #2196F3, #4cb52e);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 3s ease infinite;
            text-shadow: 0 0 30px rgba(76, 181, 46, 0.5);
            letter-spacing: 5px;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .tagline {
            font-size: 1.2rem;
            color: #b0b0b0;
            margin-top: 10px;
            animation: fadeIn 2s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Gallery Section */
        .gallery-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .swiper {
            width: 100%;
            max-width: 1200px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .swiper-slide:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 60px rgba(76, 181, 46, 0.4);
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .swiper-slide:hover .slide-overlay {
            transform: translateY(0);
        }

        .slide-overlay span {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
        }

        .swiper-pagination-bullet {
            background: #4cb52e;
            opacity: 0.5;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
            background: #4cb52e;
        }

        /* Action Buttons Section */
        .action-section {
            text-align: center;
            padding: 40px 20px;
            animation: fadeInUp 1.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            padding: 18px 45px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            border: 2px solid transparent;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4cb52e, #3da325);
            color: #fff;
            box-shadow: 0 10px 30px rgba(76, 181, 46, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(76, 181, 46, 0.6);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #2196F3, #1976D2);
            color: #fff;
            box-shadow: 0 10px 30px rgba(33, 150, 243, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(33, 150, 243, 0.6);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border: 2px solid #4cb52e;
        }

        .btn-outline:hover {
            background: #4cb52e;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(76, 181, 46, 0.4);
        }

        /* Services Grid */
        .services-preview {
            margin-top: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(76, 181, 46, 0.2);
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.1);
            border-color: #4cb52e;
            box-shadow: 0 15px 40px rgba(76, 181, 46, 0.3);
        }

        .service-icon {
            font-size: 3rem;
            color: #4cb52e;
            margin-bottom: 15px;
        }

        .service-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .service-desc {
            font-size: 0.9rem;
            color: #b0b0b0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .site-name {
                font-size: 3rem;
                letter-spacing: 3px;
            }

            .brand-icon {
                width: 50px;
                height: 50px;
            }

            .brand-name {
                gap: 15px;
            }

            .swiper-slide {
                width: 250px;
                height: 250px;
            }

            .btn {
                padding: 15px 35px;
                font-size: 1rem;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }

            .services-preview {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .site-name {
                font-size: 2.5rem;
            }

            .brand-icon {
                width: 40px;
                height: 40px;
            }

            .tagline {
                font-size: 1rem;
            }

            .swiper-slide {
                width: 200px;
                height: 200px;
            }
        }

        /* Footer */
        .welcome-footer {
            text-align: center;
            padding: 20px;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Animated Particles Background -->
    <div class="particles" id="particles"></div>

    <div class="welcome-container">
        <!-- Header Section -->
        <div class="header-section">
            <div class="logo-title">
                <div class="brand-name">
                    <img src="{{ asset('Welcome_gallery/icon.png') }}" alt="Icon" class="brand-icon">
                    <h1 class="site-name">EVENTO</h1>
                </div>
            </div>
            <p class="tagline">Beyond Management, We Create Experiences</p>
        </div>

        <!-- Gallery Section -->
        <div class="gallery-section">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @php
                        $galleryImages = [
                            'wedding.jpeg' => 'Wedding Events',
                            'birthday.jpeg' => 'Birthday Celebrations',
                            'conference.jpeg' => 'Corporate Conferences',
                            'seminar.jpeg' => 'Seminars & Workshops',
                            'hackathon.jpeg' => 'Hackathons',
                            'annevarsary.jpeg' => 'Anniversary Celebrations',
                            'people-festival.jpg' => 'Festival Events',
                            'nightlife-with-people-dancing-club.jpg' => 'Night Events',

                        ];
                    @endphp
                    @foreach($galleryImages as $image => $title)
                        <div class="swiper-slide">
                            <img src="{{ asset('Welcome_gallery/' . $image) }}" alt="{{ $title }}">
                            <div class="slide-overlay">
                                <span>{{ $title }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- Action Section -->
        <div class="action-section">
            <h2 style="font-size: 2rem; margin-bottom: 20px;">Explore Our Platform</h2>

            <div class="action-buttons">
                <a href="{{ route('front.upcoming_events') }}" class="btn btn-primary">
                    <i class="fas fa-calendar-alt"></i>
                    Upcoming Events
                </a>
                <a href="{{ route('front.contact') }}" class="btn btn-secondary">
                    <i class="fas fa-envelope"></i>
                    Contact Us
                </a>
            </div>

            <!-- Services Preview -->
            <div class="services-preview">
                <div class="service-card">
                    <i class="fas fa-map-marker-alt service-icon"></i>
                    <h3 class="service-title">Venue Selection</h3>
                    <p class="service-desc">Perfect locations for your events</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-envelope-open-text service-icon"></i>
                    <h3 class="service-title">Invitation Cards</h3>
                    <p class="service-desc">Beautiful custom invitations</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-music service-icon"></i>
                    <h3 class="service-title">Entertainment</h3>
                    <p class="service-desc">Live performances & DJ services</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-utensils service-icon"></i>
                    <h3 class="service-title">Catering</h3>
                    <p class="service-desc">Delicious food & beverages</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-camera service-icon"></i>
                    <h3 class="service-title">Photography</h3>
                    <p class="service-desc">Capture every special moment</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-cake-candles service-icon"></i>
                    <h3 class="service-title">Custom Packages</h3>
                    <p class="service-desc">Tailored to your needs</p>
                </div>
            </div>
        </div>



    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        // Initialize Swiper
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Create animated particles
        const particlesContainer = document.getElementById('particles');
        const particleCount = 50;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
            particlesContainer.appendChild(particle);
        }
    </script>

    <!-- Welcome Page Footer -->
    <div class="welcome-footer">
        <p>&copy; {{ date('Y') }} EVENTO. All Rights Reserved. | Multi-Event Management Platform</p>
    </div>
</body>
</html>
