<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title') | SiPetang</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="asset/frontend/img/favicon.png" rel="icon">
  <link href="asset/frontend/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="asset/frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="asset/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="asset/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="asset/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="asset/frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="asset/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="asset/frontend/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="asset/frontend/img/logo.png" alt="">
        <span>SiPetang</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#features">Visi Misi</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
          <li><a class="getstarted scrollto" href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Sistem Pelayanan Publik Kecamatan Tanggungharjo Grobogan</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Pengelolaan Surat Kecamatan Tanggungharjo Berbasis Web</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="/login" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Login</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="asset/frontend/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="asset/frontend/img/logo.png" alt="">
              <span>SiPetang</span>
            </a>
            <p>Sistem Pelayanan Publik di Kecamatan Tanggungharjo Grobogan.</p>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#features">Visi Misi</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#portfolio">Galeri</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#contact">Kontak Kami</a></li>
            </ul>
          </div>

         
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Hubungi Kami</h4>
            <p>
              Jl Raya Tanggungharjo

            <br>
            Grobogan
            Jawa Tengah<br>
            58166
            Indonesia <br><br>
              <strong>Phone:</strong> +62<br>
              <strong>Email:</strong> admin@sipetang.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SiPetang</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="asset/frontend/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="asset/frontend/vendor/aos/aos.js"></script>
  <script src="asset/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asset/frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="asset/frontend/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="asset/frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="asset/frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="asset/frontend/js/main.js"></script>

</body>

</html>