<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $setting->title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero-slider {
      background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://source.unsplash.com/1600x600/?store,shopping') no-repeat center center/cover;
      color: white;
      height: 60vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero-slider h1 {
      font-size: 3rem;
      font-weight: bold;
    }
    .category-card img {
      height: 150px;
      object-fit: cover;
    }
    .product-card img {
      height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">{{ $setting->app_name }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#kategori">Kategori</a></li>
          <li class="nav-item"><a class="nav-link" href="#produk">Produk</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Slider -->
  <section class="hero-slider">
    <div class="container">
      <h1>{{ $setting->banner_content }}</h1>
      <p class="lead">Temukan produk terbaik pilihanmu di sini</p>
      <a href="#produk" class="btn btn-primary">Lihat Produk</a>
    </div>
  </section>

  <!-- Kategori -->
  <section id="kategori" class="py-5">
    <div class="container">
      <h2 class="mb-4 text-center">Kategori Produk</h2>
      <div class="row g-4">

        @foreach($category as $cat) 
            <div class="col-md-4">
              <div class="card category-card">
                <div class="card-body text-center">
                  <h5 class="card-title">{{ $cat->name }}</h5>
                </div>
              </div>
            </div>
        @endforeach
       
       
      </div>
    </div>
  </section>

  <!-- Produk Terbaru -->
  <section id="produk" class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 text-center">Produk Terbaru</h2>
      <div class="row g-4">
        @foreach ($products as $prod)
           <div class="col-md-3">
              <div class="card product-card">
                <img src="{{ asset('storage/'.$prod->product_image) }}" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                  <h5 class="card-title">{{ $prod->product_name }}</h5>
                  <p class="card-text">Rp {{ $prod->price }}</p>
                  <a href="#" class="btn btn-outline-primary w-100">Beli Sekarang</a>
                </div>
              </div>
            </div>
        @endforeach
       
       
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
      <p class="mb-1">&copy; 2025 TokoOnline. All rights reserved.</p>
      <p class="mb-0">Dibuat dengan <span style="color:red;">&hearts;</span> dan Bootstrap 5</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
