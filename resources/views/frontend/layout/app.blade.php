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
        }

        p {
            font-size: 15px;
            color: white;
            line-height: 1.8;
        }

        a {
            text-decoration: none;
        }

        .title-wrapper {
            padding: 50px;
        }

        .section-title {
            text-align: center;
            font-size: 2.3rem;
            font-weight: 600;
            color: #555;
            margin-bottom: 50px;
            text-transform: none;
            letter-spacing: normal;
        }

        /* ========== Header ========== */
        .main-header {
            background: #08075a;
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .main-header.scrolled {
            background: #06054a;
            padding: 15px 0;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.25);
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
            letter-spacing: 0.4px;
            margin: 0 15px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #555;
            transform: translateY(-2px);
        }

        /* === Carousel === */
        .carousel-container {
            position: relative;
            width: 100%;
            height: 88vh;
            overflow: hidden;
            margin-top: 75px;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 1.2s ease, transform 1.2s ease;
        }

        .carousel-slide.active {
            opacity: 1;
            transform: scale(1);
            z-index: 1;
        }

        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* === Layout Ikon === */
        .icon-section {
            display: flex;
            justify-content: center;
            padding: 60px;
            overflow: hidden;
        }

        .icon-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 900px;
            width: 100%;
        }

        .icon-item {
            flex: 0 1 calc(20% - 40px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            opacity: 0;
            transform: scale(0.8) translateY(25px);
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
            width: 70px;
            height: 70px;
            border-radius: 14px;
            background: #fff;
            padding: 12px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .icon-item:hover .icon-image {
            transform: scale(1.1);
        }

        .icon-title {
            font-size: 14px;
            font-weight: 600;
            color: #08075a;
            margin-top: 10px;
        }

        /* ========== Footer ========== */
        .custom-footer {
            background: #08075a;
            color: white;
            padding: 60px 80px 25px;
            font-family: 'Poppins', sans-serif;
        }

        .footer-main {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-left,
        .stats,
        .footer-right {
            flex: 1;
            min-width: 260px;
        }

        .footer-left p {
            margin: 6px 0;
            font-size: 15px;
            opacity: 0.9;
        }

        .footer-left .fw-bold {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 10px;
            color: white;
        }

        .footer-link {
            color: #555;
            font-weight: 500;
        }

        .footer-link:hover {
            text-decoration: underline;
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
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: white;
            color: #08075a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 8px rgba(255, 255, 255, 0.1);
        }

        .icon-circle:hover {
            transform: scale(1.1);
        }

        .footer-divider {
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin: 30px 0 20px;
        }

        .footer-bottom {
            font-size: 14px;
            text-align: center;
            opacity: 0.85;
            letter-spacing: 0.3px;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @include('frontend.partial.header')

    <!-- ===== Carousel Global ===== -->
    <div class="carousel-container">
        @yield('carousel')
    </div>

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.partial.footer')

    <script>
        // Tambahkan efek perubahan header saat scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.main-header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // === Carousel ===
        document.addEventListener("DOMContentLoaded", () => {
            const slides = document.querySelectorAll(".carousel-slide");
            let index = 0;
            setInterval(() => {
                slides[index].classList.remove("active");
                index = (index + 1) % slides.length;
                slides[index].classList.add("active");
            }, 4000);
        });

        document.addEventListener('beforeunload', () => {
            document.querySelectorAll('.icon-item').forEach(icon => {
                icon.style.animation = 'disappearToCenter 0.5s ease forwards';
            });
        });
    </script>
</body>

</html>
