<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KATALOG LAYANAN</title>

    <!-- Font modern & profesional -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        /* ========== Global Typography ========== */
        body {
            font-family: 'Poppins', sans-serif;
            color: #222;
            margin: 0;
            padding: 0;
            line-height: 1.7;
            background-color: #f9f9fb;
        }

        h1,
        h2,
        h3,
        h4 {
            font-weight: 600;
            letter-spacing: 0.3px;
            color: #08075a;
            margin: 0;
        }

        p {
            font-size: 15px;
            color: white;
            line-height: 1.8;
            margin: 0;
        }

        a {
            text-decoration: none;
            margin: 0;
        }

        .global-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 25px 40px;
            margin: 25px 0;
            text-align: center;
        }

        .section-title {
            margin-top: 50px;
            text-align: center;
            font-size: 2.3rem;
            font-weight: 600;
            color: #555;
            text-transform: none;
            letter-spacing: normal;
        }

        /* ========== HEADER PREMIUM DYNAMIC REFLECTIVE (LIGHT MODE) ========== */
        .main-header {
            background: linear-gradient(90deg, #0e0d68, #08075a, #0e0d68);
            background-size: 300% 300%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 22px 0;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            backdrop-filter: blur(6px);
            animation: gradientFlow 10s ease infinite;
            overflow: hidden;
        }

        .main-header::before {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 25px;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.15), transparent);
            opacity: 0.8;
            filter: blur(10px);
            pointer-events: none;
        }

        .main-header::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 10px;
            background: radial-gradient(circle at 50% 100%, rgba(0, 128, 255, 0.4), transparent 80%);
            filter: blur(12px);
            opacity: 0.9;
            pointer-events: none;
            transition: opacity 0.4s ease;
        }

        .main-header.scrolled {
            background: linear-gradient(90deg, #0e0d68, #08075a, #0e0d68);
            padding: 15px 0;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.5);
        }

        .main-header.scrolled::after {
            opacity: 0.5;
        }

        .logo-container {
            position: absolute;
            left: 30px;
            display: flex;
            align-items: center;
        }

        .logo {
            height: 60px;
            width: auto;
        }

        .nav-center {
            text-align: center;
        }

        .nav-link {
            color: white;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 0.6px;
            margin: 0 18px;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -5px;
            transform: translateX(-50%) scaleX(0);
            width: 60%;
            height: 2px;
            background: linear-gradient(to right, #00d4ff, #0072ff);
            border-radius: 2px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover::after {
            transform: translateX(-50%) scaleX(1);
        }

        .nav-link:hover {
            color: #e0e0ff;
            transform: translateY(-2px);
        }

        /* === Tombol Dark Mode === */
        #toggle-dark-mode {
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            background: none;
            border: none;
            outline: none;
            width: auto;
            height: auto;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        #toggle-dark-mode:hover {
            transform: translateY(-50%) scale(1.15);
        }

        /* === Halaman Layanan === */
        .layanan-hero {
            margin-top: 75px;
            margin-bottom: 75px;
            position: relative;
            width: 100%;
            min-height: 40vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: url('{{ asset('templateadmin/dist/img/layananbg.jpg') }}') no-repeat center center;
            background-size: 100% auto;
            overflow: hidden;
        }

        .layanan-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 0;
        }

        .layanan-hero-content {
            position: relative;
            z-index: 1;
            color: #fff;
            padding: 40px 20px;
            max-width: 900px;
        }

        .layanan-hero-content h1 {
            font-size: 2.5rem;
            color: #f0f0f0;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .layanan-hero-content p {
            font-size: 0.90rem;
            color: #f0f0f0;
            margin: 0;
        }

        .icon-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 25px;
            width: calc(100% - 40px);
            justify-items: center;
        }

        .icon-item {
            width: 100%;
            max-width: 250px;
            background: none;
            flex-direction: none;
            border: none;
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
            text-align: center;
            transition: all 0.3s ease;
            animation: appearFromCenter 0.6s ease forwards;
        }

        @keyframes appearFromCenter {
            0% {
                opacity: 0;
                transform: scale(0.8) translateY(25px);
            }

            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        @keyframes disappearToCenter {
            0% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }

            100% {
                opacity: 0;
                transform: scale(0.8) translateY(25px);
            }
        }

        .icon-item:nth-child(3) {
            animation-delay: 0.1s;
        }

        .icon-item:nth-child(2),
        .icon-item:nth-child(4) {
            animation-delay: 0.25s;
        }

        .icon-item:nth-child(1),
        .icon-item:nth-child(5) {
            animation-delay: 0.4s;
        }

        .icon-item:nth-child(8) {
            animation-delay: 0.1s;
        }

        .icon-item:nth-child(7),
        .icon-item:nth-child(9) {
            animation-delay: 0.25s;
        }

        .icon-item:nth-child(6),
        .icon-item:nth-child(10) {
            animation-delay: 0.4s;
        }

        .icon-image {
            width: 65px;
            height: 65px;
            margin-bottom: 10px;
            background: none;
            object-fit: contain;
            transform-origin: center center;
            backface-visibility: hidden;
            will-change: transform;
            transition: transform 0.3s ease;
        }

        .icon-item:hover .icon-image {
            transform: scale(1.1);
        }

        .icon-title {
            font-size: 1rem;
            font-weight: 600;
            color: #000;
            font-family: inherit;
            transition: color 0.3s ease;
        }

        .icon-item:hover .icon-title {
            background: linear-gradient(to right, #08075a, #3c46ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.4s ease;
        }

        /* ========== DARK MODE ========== */
        body.dark-mode {
            background: linear-gradient(135deg,
                    rgba(10, 15, 30, 0.98),
                    rgba(15, 22, 35, 0.98),
                    rgba(8, 12, 25, 1));
            color: #e4e6eb;
        }

        body.dark-mode::before {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at top left,
                    rgba(255, 255, 255, 0.03),
                    transparent 70%);
            pointer-events: none;
        }

        body.dark-mode::after {
            content: "";
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at bottom right,
                    rgba(0, 40, 80, 0.12),
                    transparent 70%);
            pointer-events: none;
            z-index: -1;
        }

        body.dark-mode .icon-circle:hover {
            color: #b4c6ff;
            transition: all 0.3s ease;
        }

        body.dark-mode h1,
        body.dark-mode h2,
        body.dark-mode h3,
        body.dark-mode h4 {
            color: #e4e6eb;
        }

        body.dark-mode .main-header {
            background: linear-gradient(90deg, #0c111d, #141b2e, #0c111d);
            background-size: 300% 300%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.6);
            animation: gradientFlow 10s ease infinite;
        }

        body.dark-mode .main-header::before {
            background: linear-gradient(to top, rgba(255, 255, 255, 0.08), transparent);
        }

        body.dark-mode .main-header::after {
            background: radial-gradient(circle at 50% 100%, rgba(90, 120, 255, 0.25), transparent 80%);
            opacity: 0.7;
        }

        body.dark-mode .main-header.scrolled {
            background: linear-gradient(90deg, #080c18, #11182b, #080c18);
        }


        body.dark-mode .nav-link {
            color: #e4e6eb;
        }

        body.dark-mode .nav-link:hover {
            color: #aab8ff;
        }

        body.dark-mode .nav-link::after {
            background: linear-gradient(to right, #708bff, #4a61ff);
        }

        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes glowPulse {

            0%,
            100% {
                filter: drop-shadow(0 0 8px rgba(50, 100, 255, 0.6)) drop-shadow(0 0 20px rgba(20, 80, 255, 0.4));
            }

            50% {
                filter: drop-shadow(0 0 14px rgba(90, 150, 255, 0.9)) drop-shadow(0 0 30px rgba(40, 110, 255, 0.5));
            }
        }

        body.dark-mode .global-section {
            color: #e4e6eb;
        }

        body.dark-mode .service-name {
            color: #e4e6eb;
        }

        body.dark-mode .service-item:hover .service-name,
        body.dark-mode .icon-item:hover .icon-title {
            background: linear-gradient(to right, #2a29a3, #3c3af0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.4s ease;
        }

        body.dark-mode .icon-title {
            color: #e4e6eb;
        }

        body.dark-mode .icon-circle {
            background: #141b28;
            color: #e4e6eb;
            box-shadow: 0 3px 8px rgba(255, 255, 255, 0.05);
        }

        /* === DARK MODE - BERITA & PENGUMUMAN === */
        body.dark-mode .card-elev,
        body.dark-mode .announcement-card {
            background: linear-gradient(160deg,
                    rgba(18, 24, 38, 0.96),
                    rgba(12, 18, 30, 0.98));
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        body.dark-mode .card-elev:hover,
        body.dark-mode .announcement-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.6),
                0 0 10px rgba(80, 130, 255, 0.15);
        }

        body.dark-mode .card-body,
        body.dark-mode .announcement-body {
            color: #e4e6eb;
        }

        body.dark-mode .card-title,
        body.dark-mode .announcement-title {
            color: #f1f3f8;
        }

        body.dark-mode .card-date,
        body.dark-mode .announcement-date {
            color: rgba(200, 210, 230, 0.6);
        }

        body.dark-mode .card-excerpt,
        body.dark-mode .announcement-excerpt {
            color: rgba(220, 225, 235, 0.8);
        }

        body.dark-mode .card-link,
        body.dark-mode .announcement-link {
            color: #e4e6eb;
            position: relative;
            text-decoration: none;
            transition: color 0.25s ease;
        }

        body.dark-mode .card-link:hover,
        body.dark-mode .announcement-link:hover {
            background: linear-gradient(to right, #2a29a3, #3c3af0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: all 0.4s ease;
        }

        body.dark-mode .card-img-top,
        body.dark-mode .announcement-img {
            filter: brightness(0.85) contrast(1.1);
            transition: filter 0.3s ease;
        }

        body.dark-mode .card-elev:hover .card-img-top,
        body.dark-mode .announcement-card:hover .announcement-img {
            filter: brightness(1) contrast(1.15);
        }

        body.dark-mode .custom-footer {
            background: linear-gradient(180deg,
                    rgba(12, 17, 29, 1),
                    rgba(8, 12, 25, 0.98),
                    rgba(5, 8, 18, 1));
            color: #e4e6eb;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        body.dark-mode .custom-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(rgba(255, 255, 255, 0.12) 1px, transparent 1px),
                radial-gradient(rgba(0, 150, 255, 0.08) 1.5px, transparent 1.5px),
                radial-gradient(rgba(255, 255, 255, 0.06) 2px, transparent 2px);
            background-size: 70px 70px, 110px 110px, 150px 150px;
            background-position: 0 0, 35px 55px, 70px 110px;
            animation: particle-move 45s linear infinite;
            z-index: 1;
            opacity: 0.4;
            pointer-events: none;
        }

        body.dark-mode .social-icons {
            display: flex;
            gap: 16px;
        }

        body.dark-mode .icon-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, rgba(50, 80, 200, 0.2), rgba(10, 15, 30, 1));
            box-shadow:
                inset 0 2px 6px rgba(255, 255, 255, 0.05),
                inset 0 -3px 8px rgba(0, 0, 0, 0.7),
                0 0 10px rgba(50, 100, 255, 0.25);
            color: #cfd2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.4s ease;
        }

        body.dark-mode .icon-circle:hover {
            transform: scale(1.15) rotate(8deg);
            color: #ffffff;
        }

        body.dark-mode .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        /* === Tombol Kembali Ke Atas === */
        #backToTopBtn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: none;
            border: none;
            outline: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
        }

        #backToTopBtn.show {
            opacity: 1;
            visibility: visible;
        }

        #backToTopBtn:hover {
            transform: scale(1.1);
        }

        #backToTopBtn svg {
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .progress-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            transform: rotate(-90deg);
        }

        #progressRing {
            stroke: #00bfff;
            transition: stroke-dashoffset 0.25s linear;
        }

        #backToTopBtn i {
            position: absolute;
            font-size: 28px;
            color: #00bfff;
            text-shadow:
                0 0 8px #00bfff,
                0 0 16px #00bfff,
                0 0 32px #00bfff;
        }

        /* ========== Footer ========== */
        .custom-footer {
            background: linear-gradient(90deg, #0e0d68, #08075a, #0e0d68);
            padding: 15px 0;
            color: white;
            padding: 40px 60px 20px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 -4px 15px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .custom-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(rgba(255, 255, 255, 0.25) 1.2px, transparent 1.2px),
                radial-gradient(rgba(255, 255, 255, 0.15) 1.5px, transparent 1.5px),
                radial-gradient(rgba(255, 255, 255, 0.1) 2px, transparent 2px);
            background-size: 70px 70px, 110px 110px, 150px 150px;
            background-position: 0 0, 35px 55px, 70px 110px;
            animation: particle-move 40s linear infinite;
            z-index: 1;
            opacity: 0.5;
            pointer-events: none;
        }

        @keyframes particle-move {
            0% {
                background-position: 0 0, 35px 55px, 70px 110px;
            }

            100% {
                background-position: 140px 140px, 175px 195px, 210px 260px;
            }
        }

        .footer-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .footer-left,
        .stats,
        .footer-right {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .footer-left p {
            margin: 5px 0;
            font-size: 15px;
            opacity: 0.9;
        }

        .footer-left .fw-bold {
            font-weight: 600;
            font-size: 17px;
            margin-bottom: 10px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .footer-link,
        .footer-email {
            color: #c9c9ff;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .footer-link:hover,
        .footer-email:hover {
            color: #ffffff;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
            transform: translateX(4px);
        }

        .stats .bi {
            display: block;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .stats p {
            margin: 4px 0;
            opacity: 0.9;
        }

        .social-icons {
            display: flex;
            gap: 16px;
        }

        .icon-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(to right, #ffffff, #d9d9ff);
            color: #08075a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.4s ease;
            box-shadow: 0 3px 10px rgba(255, 255, 255, 0.15);
        }

        .icon-circle:hover {
            transform: scale(1.15) rotate(8deg);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
        }

        .footer-divider {
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin: 25px 0 15px;
        }

        .footer-bottom {
            font-size: 14px;
            text-align: center;
            opacity: 0.9;
            letter-spacing: 0.4px;
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @include('frontend.partial.header')

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.partial.footer')

    <!-- Tombol Kembali ke Atas -->
    <button onclick="scrollToTop()" id="backToTopBtn" title="Kembali ke atas" aria-label="Kembali ke atas">
        <svg class="progress-circle" viewBox="0 0 100 100">
            <circle id="progressRing" cx="50" cy="50" r="35" stroke="rgba(0, 0, 0, 0.7)" stroke-width="4"
                fill="none" stroke-linecap="round" stroke-dasharray="283" stroke-dashoffset="283" />
        </svg>
        <i class="bi bi-arrow-up-short"></i>
    </button>

    <script>
        // Tombol Kembali Ke Atas
        window.onscroll = function() {
            const btn = document.getElementById("backToTopBtn");
            const circle = document.getElementById("progressRing");
            if (!btn || !circle) return;

            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const progress = scrollTop / scrollHeight;

            const radius = 35;
            const circumference = 2 * Math.PI * radius;
            const offset = circumference * (1 - progress);

            btn.classList.toggle("show", scrollTop > 300);
            circle.style.strokeDasharray = `${circumference}`;
            circle.style.strokeDashoffset = `${offset}`;
        };

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }

        window.onload = function() {
            const circle = document.getElementById("progressRing");
            if (!circle) return;
            const radius = 35;
            const circumference = 2 * Math.PI * radius;
            circle.style.strokeDasharray = `${circumference}`;
            circle.style.strokeDashoffset = `${circumference}`;
        };

        // Dark Mode
        const toggleButton = document.getElementById('toggle-dark-mode');
        toggleButton.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = toggleButton.querySelector('i');
            if (document.body.classList.contains('dark-mode')) {
                icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            } else {
                icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
            }
        });

        // Efek Perubahan Saat Scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.main-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
