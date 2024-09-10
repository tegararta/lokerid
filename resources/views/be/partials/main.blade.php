<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css') }}">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


  <style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    .container {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .header {
        background: #0000ff;
        color: white;
        padding: 15px;
        text-align: center;
    }
    .content {
        flex: 1; /* Konten akan mengambil ruang yang tersisa */
        overflow-y: auto; /* Scroll secara vertikal jika konten melebihi tinggi */
        padding: 20px;
        background-color: #f4f4f4;
    }
    .footer {
        background: #ddd;
        color: black;
        padding: 10px;
        text-align: center;
    }
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Loker</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       @include('be.partials.navbar')

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Kelola Admin') ? '' : 'collapsed' }}" href="/admin">
          <i class="bi bi-people"></i>
          <span>Kelola Admin</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Kelola Loker') ? '' : 'collapsed' }}" href="{{ route('lokerbe.index') }}">
          <i class="bi bi-journal-text"></i>
          <span>Kelola Loker</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Kelola Pelatihan') ? '' : 'collapsed' }}" href="{{ route('pelatihanbe.index') }}">
          <i class="bi bi-emoji-wink"></i>
          <span>Kelola Pelatihan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Kelola Pendaftaran') ? '' : 'collapsed' }}" href="/daftarlokerbe">
          <i class="bi bi-person-workspace"></i>
          <span>Kelola Pendaftaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Pengajuan Dana') ? '' : 'collapsed' }}" href="/profilee">
          <i class="bi bi-wrench-adjustable"></i>
          <span>Kelola Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Info Pelatihan') ? '' : 'collapsed' }}" href="/infopel">
          <i class="bi bi-book"></i>
          <span>Info Pelatihan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ ($title === 'Peserta Pelatihan') ? '' : 'collapsed' }}" href="/pesertapelatihan">
          <i class="bi bi-person-add"></i>
          <span>Peserta Pelatihan</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->


      {{-- <li class="nav-heading">Pages</li> --}}
{{-- @can('posisi-ketua')
      <li class="nav-item">
        <a class="nav-link {{ ($title ==="Data Anggota") ? '' : 'collapsed' }}" href="/anggota">
          <i class="bi bi-person"></i>
          <span>Anggota</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endcan --}}
      {{-- <li class="nav-item">
        <a class="nav-link {{ ($title ==="Register") ? '' : 'collapsed' }}" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav --> --}}

     <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      {{-- <div class="row"> --}}

      
        @yield('container')

        <br><br><br><br>
      {{-- </div> --}}
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer fixed-bottom bg-white text-dark">
    <div class="copyright">
      &copy; Copyright <strong><span>LokerDifabel</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="">LokerDifabel</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script type="text/javascript" charset="utf8" src="{{ asset('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js') }}"></script>
</body>

</html>