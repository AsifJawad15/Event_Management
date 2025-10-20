<style>
/* ================================================
   DARK THEME - GLOBAL STYLES
   ================================================ */

:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --dark-bg: #0a0e27;
    --dark-card: #1a1f3a;
    --glow-color: rgba(102, 126, 234, 0.5);
    --card-shadow: 0 10px 40px rgba(0,0,0,0.5);
    --hover-transform: translateY(-10px) scale(1.02);
    --text-primary: #ffffff;
    --text-secondary: #e0e0e0;
    --border-color: rgba(102, 126, 234, 0.3);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: var(--dark-bg) !important;
    color: var(--text-secondary) !important;
    font-family: 'Nunito', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    overflow-x: hidden;
}

/* ================================================
   ANIMATED BACKGROUND
   ================================================ */

body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background:
        radial-gradient(circle at 20% 50%, rgba(102, 126, 234, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(118, 75, 162, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 90%, rgba(102, 126, 234, 0.05) 0%, transparent 50%);
    z-index: -1;
    animation: backgroundPulse 15s ease-in-out infinite;
}

@keyframes backgroundPulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.8;
    }
}

/* ================================================
   SECTION STYLES
   ================================================ */

section {
    position: relative;
    padding: 80px 0;
    overflow: hidden;
}

.section-heading {
    text-align: center;
    margin-bottom: 60px;
    animation: fadeInUp 0.8s ease-out;
}

.section-heading h2 {
    font-size: 42px;
    font-weight: 700;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.section-heading p {
    font-size: 18px;
    color: var(--text-secondary);
    max-width: 600px;
    margin: 0 auto;
}

/* ================================================
   CARD STYLES
   ================================================ */

.dark-card {
    background: rgba(26, 31, 58, 0.8);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid var(--border-color);
    box-shadow: var(--card-shadow);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.dark-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, transparent 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.dark-card:hover {
    transform: var(--hover-transform);
    box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
    border-color: rgba(102, 126, 234, 0.6);
}

.dark-card:hover::before {
    opacity: 1;
}

/* ================================================
   BUTTON STYLES
   ================================================ */

.btn-primary-gradient {
    background: var(--primary-gradient);
    color: #fff !important;
    padding: 12px 35px;
    border-radius: 50px;
    font-weight: 600;
    border: none;
    box-shadow: 0 4px 15px var(--glow-color);
    transition: all 0.3s ease;
    display: inline-block;
    text-decoration: none;
    position: relative;
    overflow: hidden;
}

.btn-primary-gradient::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.6s ease, height 0.6s ease;
}

.btn-primary-gradient:hover::before {
    width: 300px;
    height: 300px;
}

.btn-primary-gradient:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
}

.btn-outline-gradient {
    background: transparent;
    color: #667eea !important;
    padding: 12px 35px;
    border-radius: 50px;
    font-weight: 600;
    border: 2px solid #667eea;
    transition: all 0.3s ease;
    display: inline-block;
    text-decoration: none;
}

.btn-outline-gradient:hover {
    background: var(--primary-gradient);
    color: #fff !important;
    border-color: transparent;
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
}

/* ================================================
   IMAGE STYLES
   ================================================ */

.img-glow {
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
    transition: all 0.4s ease;
}

.img-glow:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 60px rgba(102, 126, 234, 0.4);
}

/* ================================================
   TEXT STYLES
   ================================================ */

h1, h2, h3, h4, h5, h6 {
    color: var(--text-primary);
    font-weight: 700;
}

p {
    color: var(--text-secondary);
    line-height: 1.8;
}

a {
    color: #667eea;
    text-decoration: none;
    transition: all 0.3s ease;
}

a:hover {
    color: #764ba2;
    text-decoration: none;
}

/* ================================================
   ANIMATIONS
   ================================================ */

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

.animate-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
}

/* ================================================
   RESPONSIVE DESIGN
   ================================================ */

@media (max-width: 991px) {
    section {
        padding: 60px 0;
    }

    .section-heading h2 {
        font-size: 32px;
    }

    .section-heading p {
        font-size: 16px;
    }
}

@media (max-width: 767px) {
    section {
        padding: 40px 0;
    }

    .section-heading h2 {
        font-size: 28px;
    }

    .dark-card {
        padding: 20px;
    }
}

/* ================================================
   UTILITY CLASSES
   ================================================ */

.text-gradient {
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.glow-text {
    text-shadow: 0 0 20px rgba(102, 126, 234, 0.8);
}

.mb-80 {
    margin-bottom: 80px;
}

.mt-80 {
    margin-top: 80px;
}

.p-60 {
    padding: 60px;
}
</style>

<script>
// Animate elements on scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
});
</script>
