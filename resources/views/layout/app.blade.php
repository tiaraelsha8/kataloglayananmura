<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>

    {{-- CSS langsung di sini --}}
    <style>
        /* Reset dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #222;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .main-header {
            background: #08075a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 25px 0;
        }

        .logo-container {
            position: absolute;
            left: 25px;
            display: flex;
            align-items: center;
        }

        .logo {
            height: 75px;
            width: auto;
            display: block;
        }

        /* Teks tengah */
        .nav-center {
            text-align: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 25px;
            letter-spacing: 0.5px;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        /* Konten utama */
        main {
            flex: 1;
            padding: 40px 20px;
            text-align: center;
        }

        /* Footer */
        /* Footer */
        .custom-footer {
            background: #08075a;
            color: white;
            padding: 50px 60px 25px;
            font-family: Arial, sans-serif;
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

        /* Kolom kiri (kontak) */
        .footer-left {
            flex: 1;
            min-width: 300px;
            line-height: 1.6;
        }

        .footer-left p {
            margin-bottom: 6px;
            font-size: 15px;
        }

        .footer-left .fw-bold {
            font-size: 16px;
            margin-bottom: 8px;
        }

        .footer-link {
            color: #ffcc00;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        /* Kolom tengah (statistik) */
        .stats {
            flex: 1;
            min-width: 250px;
            line-height: 1.6;
            font-size: 15px;
        }

        .stats .bi {
            display: block;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }

        /* Kolom kanan (sosial media) */
        .footer-right {
            flex: 0.8;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .social-icons {
            display: flex;
            gap: 15px;
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
            transition: all 0.3s ease;
            font-size: 20px;
            box-shadow: 0 2px 5px rgba(255, 255, 255, 0.2);
        }

        .icon-circle:hover {
            background: #ffcc00;
            transform: translateY(-3px);
        }

        /* Garis pembatas */
        .footer-divider {
            border: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin: 25px 0 15px;
        }

        /* Copyright */
        .footer-bottom {
            font-size: 14px;
            text-align: center;
            opacity: 0.85;
        }
    </style>
</head>

<body>
    {{-- Header --}}
    @include('partial.header')

    {{-- Konten halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partial.footer')
</body>

</html>
