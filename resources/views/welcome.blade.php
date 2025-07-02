<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bunga Florence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-family: 'Georgia', serif; /* Font bergaya untuk toko bunga */
            font-size: 1.8rem;
            color: #d63384 !important; /* Warna bunga khas Florence */
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1549646679-b1d5a7d6e4b8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 120px 0;
            text-align: center;
            min-height: 70vh; /* Pastikan hero section cukup tinggi */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
        }
        .hero-section p.lead {
            font-size: 1.25rem;
            max-width: 700px;
            margin-bottom: 30px;
        }
        .auth-buttons .btn {
            margin: 0 10px;
            padding: 10px 30px;
            font-size: 1.1rem;
        }
        .features-section {
            padding: 60px 0;
            background-color: white;
        }
        .feature-item {
            text-align: center;
            padding: 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .feature-item:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }
        .feature-item i {
            font-size: 3rem;
            color: #d63384;
            margin-bottom: 15px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 30px 0;
            margin-top: 50px;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Florence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ route('register') }}">Register</a>
                        </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <h1 class="display-3">Sambut Keindahan Bunga di Florence</h1>
            <p class="lead">Toko bunga online terkemuka yang menyediakan beragam pilihan bunga segar untuk setiap momen spesial Anda. Login atau daftar untuk melihat koleksi lengkap kami!</p>
            <div class="auth-buttons">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">Daftar Akun Baru</a>
                @else
                    <p class="lead">Anda sudah login sebagai **{{ Auth::user()->name }}**.</p>
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Pergi ke Dashboard</a>
                @endguest
            </div>
        </div>
    </header>

    <section class="features-section container mt-5">
        <h2 class="text-center mb-5">Mengapa Memilih Florence?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-item">
                    <i class="fas fa-seedling"></i>
                    <h3>Bunga Segar Berkualitas</h3>
                    <p>Kami hanya menyediakan bunga pilihan terbaik langsung dari petani.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <i class="fas fa-truck-fast"></i>
                    <h3>Pengiriman Cepat & Aman</h3>
                    <p>Bunga Anda akan tiba di tujuan dengan cepat dan kondisi prima.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-item">
                    <i class="fas fa-palette"></i>
                    <h3>Desain Buket Kustom</h3>
                    <p>Buat buket impian Anda sendiri dengan bantuan florist profesional kami.</p>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer text-center">
        <div class="container">
            <p>&copy; {{ date('Y') }} Florence - Toko Bunga. All rights reserved.</p>
            <p>Jl. Bougenville No 25 Caturtunggal Depok Sleman</p>
            <p>Email: info@florence.com | Telp: (0274) 2543 5123 </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>