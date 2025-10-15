<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events - EVENTO</title>

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.upcoming-events-page {
    background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 100%);
    min-height: 100vh;
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.upcoming-events-page::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.page-title {
    text-align: center;
    margin-bottom: 60px;
    position: relative;
    z-index: 2;
}

.page-title h1 {
    font-size: 48px;
    font-weight: 800;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.page-title p {
    color: #e0e0e0;
    font-size: 18px;
}

.slider-container {
    position: relative;
    width: 100%;
    max-width: 1200px;
    height: 600px;
    margin: 0 auto;
    background: rgba(26, 31, 58, 0.4);
    backdrop-filter: blur(20px);
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid rgba(102, 126, 234, 0.2);
}

.slide {
    width: 100%;
    height: 100%;
    position: relative;
}

.slide .item {
    width: 200px;
    height: 300px;
    position: absolute;
    top: 50%;
    transform: translate(0, -50%);
    border-radius: 20px;
    box-shadow: 0 30px 50px rgba(0, 0, 0, 0.8);
    background-position: center;
    background-size: cover;
    display: inline-block;
    transition: 0.5s;
    border: 2px solid rgba(102, 126, 234, 0.3);
}

.slide .item:nth-child(1),
.slide .item:nth-child(2) {
    top: 0;
    left: 0;
    transform: translate(0, 0);
    border-radius: 0;
    width: 100%;
    height: 100%;
    box-shadow: none;
}

.slide .item:nth-child(3) {
    left: 50%;
}

.slide .item:nth-child(4) {
    left: calc(50% + 220px);
}

.slide .item:nth-child(5) {
    left: calc(50% + 440px);
}

.slide .item:nth-child(n + 6) {
    left: calc(50% + 660px);
    opacity: 0;
}

.item .content {
    position: absolute;
    top: 50%;
    left: 100px;
    width: 400px;
    text-align: left;
    color: #fff;
    transform: translate(0, -50%);
    font-family: 'Nunito', system-ui;
    display: none;
    z-index: 10;
}

.slide .item:nth-child(2) .content {
    display: block;
}

.content .name {
    font-size: 45px;
    text-transform: uppercase;
    font-weight: 800;
    opacity: 0;
    animation: animate 1s ease-in-out 1 forwards;
    text-shadow: 2px 2px 20px rgba(0, 0, 0, 0.8);
    margin-bottom: 15px;
}

.content .event-date {
    font-size: 16px;
    color: #667eea;
    font-weight: 600;
    opacity: 0;
    animation: animate 1s ease-in-out 0.2s 1 forwards;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.content .des {
    margin-top: 10px;
    margin-bottom: 25px;
    opacity: 0;
    animation: animate 1s ease-in-out 0.3s 1 forwards;
    font-size: 16px;
    line-height: 1.6;
    text-shadow: 1px 1px 10px rgba(0, 0, 0, 0.8);
}

.content .see-more-btn {
    padding: 12px 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    opacity: 0;
    animation: animate 1s ease-in-out 0.6s 1 forwards;
    font-weight: 600;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
}

.content .see-more-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
}

.item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.8) 100%);
    border-radius: inherit;
}

@keyframes animate {
    from {
        opacity: 0;
        transform: translate(0, 100px);
        filter: blur(33px);
    }
    to {
        opacity: 1;
        transform: translate(0);
        filter: blur(0);
    }
}

.navigation-buttons {
    width: 100%;
    text-align: center;
    position: absolute;
    bottom: 30px;
    z-index: 100;
}

.navigation-buttons button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(102, 126, 234, 0.5);
    cursor: pointer;
    margin: 0 8px;
    transition: all 0.3s;
    color: #667eea;
    font-size: 18px;
}

.navigation-buttons button:hover {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    transform: scale(1.1);
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.5);
}

.no-events {
    text-align: center;
    padding: 100px 20px;
    color: #e0e0e0;
}

.no-events i {
    font-size: 80px;
    color: #667eea;
    margin-bottom: 20px;
    opacity: 0.5;
}

.no-events h3 {
    font-size: 32px;
    margin-bottom: 15px;
    color: #fff;
}

.no-events p {
    font-size: 18px;
    color: #b0b0b0;
}

.coming-soon-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    padding: 8px 20px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    z-index: 11;
    box-shadow: 0 5px 20px rgba(245, 87, 108, 0.5);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 5px 20px rgba(245, 87, 108, 0.5);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 8px 30px rgba(245, 87, 108, 0.8);
    }
}

@media (max-width: 1024px) {
    .slider-container {
        width: 95%;
        height: 500px;
    }

    .content .name {
        font-size: 35px;
    }

    .item .content {
        left: 50px;
        width: 350px;
    }
}

@media (max-width: 768px) {
    .slider-container {
        height: 400px;
    }

    .slide .item:nth-child(4),
    .slide .item:nth-child(5) {
        display: none;
    }

    .content .name {
        font-size: 28px;
    }

    .item .content {
        left: 30px;
        width: 280px;
    }

    .page-title h1 {
        font-size: 36px;
    }
}
</style>

<div class="upcoming-events-page">
    <div class="container">
        <div class="page-title">
            <h1>Upcoming Events</h1>
            <p>Discover our exciting upcoming events and experiences</p>
        </div>

        @if($upcomingEvents && $upcomingEvents->count() > 0)
        <div class="slider-container">
            <div class="slide">
                @foreach($upcomingEvents as $event)
                <div class="item" style="background-image: url('{{ asset('uploads/'.$event->image) }}');">
                    @if($event->event_date->isFuture())
                        <span class="coming-soon-badge">Coming Soon</span>
                    @endif
                    <div class="content">
                        <div class="name">{{ $event->title }}</div>
                        <div class="event-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $event->event_date->format('F d, Y') }}
                        </div>
                        <div class="des">{{ Str::limit($event->description, 150) }}</div>
                        <a href="{{ route('front.home') }}" class="see-more-btn">
                            See Main Event
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="navigation-buttons">
                <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
        @else
        <div class="no-events">
            <i class="fas fa-calendar-times"></i>
            <h3>No Upcoming Events</h3>
            <p>Check back soon for exciting events!</p>
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let next = document.querySelector('.next');
    let prev = document.querySelector('.prev');

    if (next && prev) {
        next.addEventListener('click', function(){
            let items = document.querySelectorAll('.item');
            if (items.length > 0) {
                document.querySelector('.slide').appendChild(items[0]);
            }
        });

        prev.addEventListener('click', function(){
            let items = document.querySelectorAll('.item');
            if (items.length > 0) {
                document.querySelector('.slide').prepend(items[items.length - 1]);
            }
        });
    }
});
</script>

</body>
</html>
