<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">
  
  <title>Loker Difabel</title>
  
  <style>
    .navbar-nav .nav-link.active {
      font-weight: bold;
      color: #0056b3; /* Warna khusus untuk item aktif */
      radius 8px;
    }

    .footer-widgets {
      background-color: #343a40; /* Dark background */
      color: #ffffff; /* White text */
    }

    .footer-widgets .widget-title {
      font-weight: bold;
      margin-bottom: 20px;
    }

    .footer-widgets .menu-item a {
      color: #ffffff;
      text-decoration: none;
      display: block;
      margin-bottom: 10px;
    }

    .footer-widgets .menu-item a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #C1DDF6;">
  <div class="container">
    <a class="navbar-brand" href="#">
      <!-- Uncomment if you have a logo -->
      <!-- <img src="img/loker-removebg-preview.png" alt="loker" style="height: 50px;"> -->
      <h2 class="fw-bold">Lowongan Kerja</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">BERANDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('loker') ? 'active' : '' }}" href="/loker">CARI LOKER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('pelatihan') ? 'active' : '' }}" href="/pelatihan">CARI PELATIHAN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('infopelatihan') ? 'active' : '' }}" href="/infopelatihan">INFO PELATIHAN</a>
        </li>
        @auth('member')
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../img/teamm.jpg" alt="Profile" class="rounded-circle" width="30" height="30">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/dashboard">Kelola akun</a></li>
            <li>
              <form method="POST" action="/member-logout">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>


  <!-- Carousel -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/teamm.jpg') }}" class="d-block w-100" alt="Hanifah">
        <div class="carousel-caption d-none d-md-block">
          <!-- Optional caption text here -->
        </div>
      </div>
      <!-- Add more carousel items if needed -->
    </div>
  </div>

  <!-- Main Content -->
  <main>
    @yield('container')
  </main>

  <!-- Footer -->
  <footer id="footer">
    <div class="footer-widgets bg-dark text-light pt-5">
      <div class="container">
        <div class="row">
          <div id="text-6" class="widget widget-footer-item widget_text widget-count-4 col-md-3 mb-4">
            <h4 class="widget-title text-uppercase">Tentang Loker</h4>
            <div class="textwidget">Job portal loker difabel adalah layanan berbasis software (Software as a Service) hadir sejak 2007 fokus dibidang rekrutmen untuk mempermudah cari pekerjaan dan perekrutan karyawan.</div>
          </div>
          <div id="nav_menu-3" class="widget widget-footer-item widget_nav_menu widget-count-4 col-md-3 mb-4">
            <h4 class="widget-title text-uppercase">Tentang Kami</h4>
            <ul id="menu-tentang-kami" class="list-unstyled">
              <li class="menu-item"><a href="#" class="text-light">Hubungi Kami</a></li>
              <li class="menu-item"><a href="#" class="text-light">Pusat Bantuan</a></li>
              <li class="menu-item"><a href="#" class="text-light">Logo</a></li>
              <li class="menu-item"><a href="#" class="text-light">Kebijakan Privasi</a></li>
              <li class="menu-item"><a href="#" class="text-light">Kondisi dan Ketentuan</a></li>
            </ul>
          </div>
          <div id="nav_menu-31" class="widget widget-footer-item widget_nav_menu widget-count-4 col-md-3 mb-4">
            <h4 class="widget-title text-uppercase">Pencari Kerja</h4>
            <ul id="menu-anonymous-jobseeker-footer" class="list-unstyled">
              <li class="menu-item"><a href="#" class="text-light">Registrasi Pencari Kerja</a></li>
              <li class="menu-item"><a href="#" class="text-light">Buat Resume Online</a></li>
              <li class="menu-item"><a href="#" class="text-light">Cari Lowongan Kerja</a></li>
              <li class="menu-item"><a href="#" class="text-light">Job Alerts</a></li>
              <li class="menu-item"><a href="#" class="text-light">Kategori Loker</a></li>
              <li class="menu-item"><a href="#" class="text-light">Tips Loker</a></li>
            </ul>
          </div>
          <div id="nav_menu-32" class="widget widget-footer-item widget_nav_menu widget-count-4 col-md-3 mb-4">
            <h4 class="widget-title text-uppercase">Perusahaan</h4>
            <ul id="menu-anonymous-employer-footer" class="list-unstyled">
              <li class="menu-item"><a href="#" class="text-light">Registrasi Perusahaan</a></li>
              <li class="menu-item"><a href="#" class="text-light">Pasang Lowongan</a></li>
              <li class="menu-item"><a href="#" class="text-light">Produk</a></li>
              <li class="menu-item"><a href="#" class="text-light">Paket</a></li>
            </ul>
          </div>
        </div>
        <hr class="bg-light">
        <div class="text-center py-3">
          <p class="mb-0">&copy; 2024 Loker Difabel. All rights reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
