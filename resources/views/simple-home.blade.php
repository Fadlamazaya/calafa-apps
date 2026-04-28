<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'DM Serif Display', serif;
            background-color: #001f3f;
        }

        .navbar {
            background-color: #FF4F45;
            /* White background for the navbar */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: #001f3f;
            /* Red color for branding text */
        }

        .hero-section {
            background-color: #001f3f;
            /* Red background matching the search area */
            color: #FF4F45;
            padding: 50px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            /* Slightly smaller text to balance the design */
            font-weight: bold;
        }

        .search-bar {
            margin: 30px 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar input {
            width: 70%;
            padding: 10px 20px;
            border-radius: 25px;
            /* Rounded input field */
            border: none;
            outline: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .search-bar input::placeholder {
            color: #888;
        }

        .search-bar button {
            margin-left: -50px;
            background: none;
            border: none;
            cursor: pointer;
        }

        .card-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
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
            border-radius: 15px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
            margin-top: 50px;
            padding: 20px 0;
            background-color: #FF4F45;
            text-align: center;
        }

        .footer p {
            margin: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .hero-section {
            background-color: #001f3f;
            /* Red background matching the search area */
            background-image: url('{{ asset('assets-admin/img/brand/welcome.png') }}');
            background-size: cover;
            background-position: center;
            color: #FF4F45;
            padding: 325px 0;
            text-align: center;
        }

        .card-desc {
            font-size: 0.9rem;
            color: #001f3f;
            line-height: 1.5;
        }

        /* Container untuk Filter Kategori */
        .category-filter {
            margin-bottom: 20px;
        }

        /* Tombol Filter */
        .category-filter .btn {
            background-color: #ff7569;
            /* Warna merah sesuai tema */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .category-filter .btn:hover {
            background-color: #ffd269;
            /* Warna hover */
            transform: scale(1.1);
            /* Efek membesar saat hover */
        }

        .category-filter .btn:focus {
            outline: none;
            box-shadow: 0 0 5px #ff4f45;
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
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to Calafa Food</h1>
            <p class="lead">Mau pesan apa ?</p>
        </div>
    </section> --}}

    <section class="hero-section">
        <div class="container">
            {{-- <h1>Welcome to Calafa Food</h1>
            <p class="lead">Mau pesan apa ?</p> --}}
        </div>
    </section>

    {{-- <div class="container">
        <h1> OUR MENU </h1>
        <p class="lead">Mau pesan apa ?</p>
    </div> --}}

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="What food for today..." onkeyup="filterFood()">
        <button type="submit">
            <img src="https://img.icons8.com/ios-filled/50/000000/search--v1.png" alt="Search Icon" width="25px">
        </button>
    </div>

    <!-- Cards Section -->
    <div class="container mt-5">
        <div class="card-container">

            <div class="category-filter text-center mt-4">
                <button class="btn btn-primary mx-2" onclick="filterCategory('all')">All</button>
                <button class="btn btn-primary mx-2" onclick="filterCategory('Makanan')">Makanan</button>
                <button class="btn btn-primary mx-2" onclick="filterCategory('Snack')">Snack</button>
                <button class="btn btn-primary mx-2" onclick="filterCategory('Minuman')">Minuman</button>

            </div>

            <div class="card-container">
                @foreach ($katalogs as $katalog)
                    <div class="card" data-category="{{ $katalog->kategori }}">
                        <img src="{{ asset('storage/' . $katalog->gambar) }}" alt="Food Image">
                        <h2 class="card-title">{{ $katalog->nama_katalog }}</h2>
                        <p class="card-text">Rp {{ number_format($katalog->harga, 0, ',', '.') }}</p>
                        <p class="card-desc">{{ $katalog->deskripsi }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- About Us Modal -->
    {{-- <div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutUsModalLabel">About Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Tempat terbaik untuk menikmati makanan dan minuman lezat dengan harga terjangkau! Kami selalu
                        mengutamakan
                        bahan-bahan segar dan bumbu pilihan yang diracik dengan sempurna, menghadirkan cita rasa
                        autentik yang dapat
                        dinikmati kapan saja. Dari menu klasik yang akrab di lidah hingga kreasi inovatif yang menggugah
                        selera,
                        setiap hidangan kami dibuat dengan sepenuh hati untuk memberikan pengalaman kuliner yang tak
                        terlupakan di
                        setiap suapan.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- JavaScript untuk Fitur Pencarian -->
    <script>
        function filterFood() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let cards = document.querySelectorAll('.card');
            cards.forEach(function(card) {
                let title = card.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(input)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>

    <script>
        function filterCategory(category) {
            let cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                let cardCategory = card.getAttribute('data-category').toLowerCase();
                if (category === 'all' || cardCategory === category.toLowerCase()) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

    </script>


    <!-- Bootstrap JS -->
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
