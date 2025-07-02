@extends('adminlte.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Hero Section -->
  <div class="content-header p-0">
    <div class="hero-section text-white text-center">
      <div class="container py-5">
        <h1 class="display-4 fw-bold">Sambut Keindahan Bunga di Florence</h1>
        <p class="lead mb-4">
          Toko bunga online dengan pilihan bunga segar terbaik untuk momen spesial Anda.
        </p>
        <div class="d-flex justify-content-center flex-wrap">
          @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2 mb-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg mb-2">Daftar Akun Baru</a>
          @else
            <p class="lead">Anda login sebagai <strong>{{ Auth::user()->name }}</strong>.</p>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg mt-2">Pergi ke Dashboard</a>
          @endguest
        </div>
      </div>
    </div>
  </div>

  <!-- Features Section -->
  <div class="content py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-5">Mengapa Memilih Florence?</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card text-center h-100 shadow-sm feature-item">
            <div class="card-body">
              <i class="fas fa-seedling fa-3x mb-3 text-pink"></i>
              <h5 class="card-title">Bunga Segar</h5>
              <p class="card-text">Kami hanya menyediakan bunga terbaik langsung dari petani.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center h-100 shadow-sm feature-item">
            <div class="card-body">
              <i class="fas fa-truck-fast fa-3x mb-3 text-pink"></i>
              <h5 class="card-title">Pengiriman Cepat</h5>
              <p class="card-text">Bunga Anda akan sampai dengan kondisi prima.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center h-100 shadow-sm feature-item">
            <div class="card-body">
              <i class="fas fa-palette fa-3x mb-3 text-pink"></i>
              <h5 class="card-title">Desain Kustom</h5>
              <p class="card-text">Buat buket impian Anda dengan florist kami.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Produk Terbaru Section -->
  <div class="content py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Produk Terbaru Kami</h2>
      <div class="row g-4">
        @forelse ($produkTerbaru as $produk)
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              <img src="{{ asset('storage/produks/' . $produk->gambar) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $produk->nama }}">
              <div class="card-body">
                <h5 class="card-title">{{ $produk->nama }}</h5>
                <p class="card-text" style="font-size: 0.9rem;">{!! Str::limit(strip_tags($produk->deskripsi), 100) !!}</p>
                <p class="fw-bold text-pink">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center">
            <p class="text-muted">Belum ada produk tersedia.</p>
          </div>
        @endforelse
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center text-white bg-dark py-4 mt-5">
    <div class="container">
      <p class="mb-1">&copy; {{ date('Y') }} Florence - Toko Bunga. All rights reserved.</p>
      <p class="mb-1">Jl. Bougenville No 25 Caturtunggal Depok Sleman</p>
      <p>Email: info@florence.com | Telp: (0274) 2543 5123</p>
    </div>
  </footer>
</div>

<style>
  .hero-section {
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
    url('https://images.unsplash.com/photo-1549646679-b1d5a7d6e4b8?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
    no-repeat center center;
    background-size: cover;
    min-height: 70vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .text-pink {
    color: #d63384;
  }

  .feature-item:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease-in-out;
  }
</style>
@endsection
