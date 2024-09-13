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
      border-radius: 8px; /* Tambahkan border-radius jika diperlukan */
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
  <main class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
      @yield('container')
    </div>
  </main>

  <!-- Bootstrap JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
