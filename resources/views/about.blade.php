<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #001f3f;
        }

        .navbar {
            background-color: #FF4F45;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #001f3f;
        }

        .btn-back {
            background-color: white;
            color: #FF4F45;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
        }

        .hero-section {
            background-image: url('assets/images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            color: #FF4F45;
            padding: 50px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 20px;
            padding: 20px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card img {
            width: 220px;
            height: 180px;
            padding: 0px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 15px 0 10px;
            color: #FF4F45;
        }

        .card-text {
            font-size: 1rem;
            color: #001f3f;
        }

        .footer {
            margin: 0;
            padding: 20px 0;
            background-color: #FF4F45;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #ffffff;
        }

        .description {
            margin: 40px auto;
            text-align: center;
            color: #ffffff;
            font-size: 1.1rem;
            line-height: 1.8;
            max-width: 800px;
        }
    </style>
</head>

<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand">
                <img src="{{ asset('assets-admin/img/brand/logocalafa.png') }}" height="55" width="55"
                    alt="Calafa Logo">
                Calafa Food</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('about')}}">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth') }}">Dashboard Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <h1>About Us</h1>
        {{-- <p>HOME / ABOUT US</p> --}}
    </div>

    <div class="container mt-5">
        <div class="card-container">
            <div class="card">
                <img src="{{ asset('assets/images/4.jpg') }}">
                <h2 class="card-title">Makanan</h2>
                <p class="card-text">Terdiri dari berbagai menu makanan seperti nasi goreng,
                    mie goreng, mie kwetiau, mie sagu yang dibuat dengan bumbu rumahan</p>
            </div>
            <div class="card">
                <img src="{{ asset('assets/images/6.jpeg') }}" >
                <h2 class="card-title">Snacks</h2>
                <p class="card-text">Terdiri dari berbagai menu snacks seperti kentang goreng, indomie,
                    ubi goreng yang siap disajikan dengan hangat</p>
            </div>
            <div class="card">
                <img src="{{ asset('assets/images/9.jpeg') }}">
                <h2 class="card-title">Minuman</h2>
                <p class="card-text">Teridiri dari berbagai minuman panas hingga dingin dengan
                    menu andalan kopi milo gunung
                </p>
            </div>
        </div>
        <div class="description">
            Tempat terbaik untuk menikmati makanan dan minuman lezat dengan harga terjangkau! Kami selalu mengutamakan bahan-bahan segar dan bumbu pilihan yang diracik dengan sempurna, menghadirkan cita rasa autentik yang dapat dinikmati kapan saja. Dari menu klasik yang akrab di lidah hingga kreasi inovatif yang menggugah selera, setiap hidangan kami dibuat dengan sepenuh hati untuk memberikan pengalaman kuliner yang tak terlupakan di setiap suapan.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<footer class="footer bg-light rounded shadow p-4">
    <div class="footer-header text-start mb-4">
        <p class="mb-0 fw-normal text-primary">© 2024- Themesberg</p>
    </div>
    <div class="footer-content d-flex flex-column flex-md-row justify-content-between align-items-center gap-4">
        <!-- Kontak Section -->
        <div class="footer-section text-center flex-grow-1">
            <div class="info-item d-flex flex-column align-items-center gap-2">
                <div class="symbol symbol-50px">
                    <img src="{{ asset('assets-admin/img/brand/wa.png') }}" height="50" width="50" alt="Logo Kontak" />
                </div>
                <div>
                    <a href="https://wa.me/6282383851281" target="_blank"
                        class="text-primary fw-bold text-hover-primary mb-1 fs-6 fs-md-5">
                        Kontak Pemesanan
                    </a>
                        <span class="text-gray-600 fw-semibold d-block fs-8 fs-md-7">082383851281</span>
                </div>
            </div>
        </div>
        <!-- Email Kami Section -->
        <div class="footer-section text-center flex-grow-1">
            <div class="info-item d-flex flex-column align-items-center gap-2">
                <div class="symbol symbol-50px">
                    <img src="{{ asset('assets-admin/img/brand/logoemail.png') }}" height="50" width="50" alt="Logo Email" />
                </div>
                <div>
                    <p class="text-primary fw-bold fs-5 mb-1">Email Calafa</p>
                    <p class="text-dark fw-semibold fs-6 mb-0">calafa_food@gmail.com</p>
                </div>
            </div>
        </div>
        <!-- Sosial Media Section -->
        <div class="footer-section text-center flex-grow-1">
            <div class="info-item d-flex flex-column align-items-center gap-2">
                <div class="symbol symbol-50px">
                    <img src="{{ asset('assets-admin/img/brand/ig.png') }}" height="50" width="50" alt="Logo Sosial Media" />
                </div>
                <div>
                    <p class="text-primary fw-bold fs-5 mb-1">Sosial Media</p>
                    <a href="https://www.instagram.com/calafa.food/" class="text-gray-600 fw-semibold fs-6">@calafa.food</a>
                </div>
            </div>
        </div>
        <!-- Lokasi Kami Section -->
        <div class="footer-section text-center flex-grow-1">
            <h5 class="text-primary fw-bold mb-2">Lokasi Kami</h5>
            <div class="map-container rounded shadow-sm overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2082.2412771686745!2d101.3950458494665!3d0.4565416372782725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9dad8c6f931%3A0x8fa0d338376b249e!2sRR%20Arena%20Pekanbaru!5e0!3m2!1sen!2sid!4v1734510937842!5m2!1sen!2sid" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</footer>
