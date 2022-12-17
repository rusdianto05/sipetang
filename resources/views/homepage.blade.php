@extends('layouts.frontend')
@section('title', 'Home')
@section('content')
<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Tentang Kami</h3>
              <h2>Sejarah Kecamatan Tanggungharjo</h2>
              <p>
                Tanggungharjo adalah sebuah kecamatan di Kabupaten Grobogan, Provinsi Jawa Tengah, Indonesia.

                Sebelum menjadi kecamatan, dahulu Tanggungharjo merupakan satu wilayah dengan kecamatan Kedungjati, namun sekarang sudah dimekarkan dan menjadi kecamatan sendiri dan merupakan salah satu kecamatan terkecil di Kabupaten Grobogan.
              </p>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="asset/frontend/img/about.jpeg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

      <div class="container" data-aos="fade-up">

        <!-- Feature Tabs -->
        <div class="row feture-tabs" data-aos="fade-up">
          <div class="col-lg-6">
            <h3>Visi Misi Kecamatan Tanggungharjo</h3>

            <!-- Tabs -->
            <ul class="nav nav-pills mb-3">
              <li>
                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Visi</a>
              </li>
              <li>
                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Misi</a>
              </li>
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">
                <p></p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Visi Kami</h4>
                </div>
                <p>Terwujudnya Grobogan yang Lebih Sejahtera, Berdaya Saing, Beriman dan Berbudaya.</p>

              </div><!-- End Tab 1 Content -->

              <div class="tab-pane fade show" id="tab2">
                <p></p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Misi Kami</h4>
                </div>
                <p>Terwujudnya Pelayanan Primadi KecamatanTanggungharjo dengan Dukungan Sumber Daya Manusia yang Potensial dan Bermartabat.</p>
              </div><!-- End Tab 2 Content -->


            </div>

          </div>

          <div class="col-lg-6">
            <img src="asset/frontend/img/features-2.png" class="img-fluid" alt="">
          </div>

        </div><!-- End Feature Tabs -->

      </div>

    </section><!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Galeri</h2>
          <p>Kantor Kecamatan Tanggungharjo</p>
        </header>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="asset/frontend/img/galeri1.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Foto 1</h4>
                <p>Kantor Kecamatan Tanggungharjo</p>
                <div class="portfolio-links">
                  <a href="asset/frontend/img/galeri1.jpeg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Kantor Kecamatan Tanggungharjo"><i class="bi bi-plus"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="asset/frontend/img/galeri2.jpeg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Foto 2</h4>
                <p>Kantor Kecamatan Tanggungharjo</p>
                <div class="portfolio-links">
                  <a href="asset/frontend/img/galeri2.jpeg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="Kantor Kecamatan Tanggungharjo"><i class="bi bi-plus"></i></a>
                 
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Hubungi Kami</p>
        </header>

        <div class="row gy-4 ">

          <div class="col-lg-6 mx-auto">

            <div class="row gy-4 ">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>Jl Raya Tanggungharjo
                    <br>Grobogan Jawa Tengah
                    58166 Indonesia</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Hubungi Kami</h3>
                  <p>+62 858-2625-3017</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>kec_tanggungharjo@grobogan.go.id</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Buka Saat</h3>
                  <p>Senin - Jumat<br>8:00 Pagi - 16:00 Sore</p>
                </div>
              </div>
            </div>

          </div>

          {{-- <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>

          </div> --}}

        </div>

      </div>

    </section>

  </main>

  @endsection