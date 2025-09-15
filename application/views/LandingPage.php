<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PaKSa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets/img/img_properties/logoNew.png" rel="icon">
  <link href="<?php echo base_url()?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/aos/aos.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/glightbox/css/glightbox.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/swiper/swiper-bundle.min.css">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo" class="d-flex align-items-center">
        <a href="#hero">
            <img src="<?php echo base_url()?>assets/img/img_properties/logoNew.png" alt="img" class="w-25">
        </a>
        <!-- <h1 class="mb-0 ml-3">
            <a href="#hero"><span>P</span>aksa</a>
        </h1> -->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li class="nav-link scrollto active"><a href="#features"><span>Features</span></a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#about-us">About</a></li>
          <li><a class="nav-link" href="<?php echo base_url(); ?>login">Login</a></li>      
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-in">
      <h1>Welcome to PAKSA</h1>
      <h2>Solusi Pintar Kelola Kas Siswa</h2>
      <img src="<?php echo base_url()?>assets/img/login.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100">
      <a href="<?= site_url('Login') ?>" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="padd-section text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">

          <h2>Our Service</h2>
          <p class="separator">Indonesia Emas 2024</p>

        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-block">

              <img src="<?php echo base_url()?>assets/img/svg/cloud.svg" alt="img">
              <h4>P</h4>
              <p>Mencatat transaksi uang masuk dan pengeluaran dengan cepat</p>

            </div>
          </div>

          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-block">

              <img src="<?php echo base_url()?>assets/img/svg/cloud.svg" alt="img">
              <h4>Safe</h4>
              <p>Mengelola data siswa dan pengguna secara efisien</p>

            </div>
          </div>

          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-block">

              <img src="<?php echo base_url()?>assets/img/svg/planet.svg" alt="img">
              <h4>user friendly interface</h4>
              <p>Menyediakan laporan keuangan yang terperinci dan mudah dipahami</p>

            </div>
          </div>

          <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-block">

              <img src="<?php echo base_url()?>assets/img/svg/asteroid.svg" alt="img">
              <h4>Flexible</h4>
              <p>Mengakses informasi keuangan kapan saja dan di mana saja melalui smartphone atau komputer</p>

            </div>
          </div>

        </div>
      </div>

    </section><!-- End Get Started Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="padd-section text-center">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Amazing Features.</h2>
          <p class="separator">Menuju Indonesia Emas</p>
        </div>

        <div class="row">

          <!-- 4 kolom bagian atas -->
          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/paint-palette.svg" alt="img">
              <h4>Dashboard</h4>
              <p>Dashboard</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/vector.svg" alt="img">
              <h4>User</h4>
              <p>Manajemen User</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/design-tool.svg" alt="img">
              <h4>Siswa</h4>
              <p>Manajemen Siswa</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/asteroid.svg" alt="img">
              <h4>Uang Kas</h4>
              <p>Mencatat Pemasukan Uang Kas</p>
            </div>
          </div>

          <!-- 3 kolom di tengah -->
          <div class="col-md-6 col-lg-4 mb-4 mx-auto" data-aos="fade-up" data-aos-delay="500">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/asteroid.svg" alt="img">
              <h4>Pengeluaran</h4>
              <p>Mencatat Pengeluaran Uang Kas</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mx-auto" data-aos="fade-up" data-aos-delay="600">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/cloud-computing.svg" alt="img">
              <h4>Laporan</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mx-auto" data-aos="fade-up" data-aos-delay="700">
            <div class="feature-block">
              <img src="<?php echo base_url()?>assets/img/svg/cloud-computing.svg" alt="img">
              <h4>Riwayat Pemasukan dan Pengeluaran</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Features Section -->

<!-- ======= Team Section ======= -->
    <section id="team" class="padd-section text-center">

      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">

          <h2>Team Member</h2>
          <p class="separator">Indonesia Future</p>
        </div>

        <div class="row justify-content-center">

          <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="team-block bottom">
              <img src="<?php echo base_url()?>assets/img/team/1.jpg" class="img-responsive" alt="img">
              <div class="team-content">
                <span>Full-stack Developer</span>
                <h4>Ramashani Nur Sarjito</h4>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-block bottom">
              <img src="<?php echo base_url()?>assets/img/team/2.png" class="img-responsive" alt="img">
              <div class="team-content">
                <span>System Analyst</span>
                <h4>Azzan Dwi Riski</h4>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="team-block bottom">
              <img src="<?php echo base_url()?>assets/img/team/3.png" class="img-responsive" alt="img">
              <div class="team-content">
                <span>UI/UX Designer</span>
                <h4>Muhamad Randy Destawijaya</h4>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us padd-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">

          <div class="col-md-7 col-lg-5">
            <img src="<?php echo base_url()?>assets/img/aboutImg.png" alt="About" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-md-5 col-lg-5">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2><span>PaKSa</span>Solusi Pintar Kelola Kas Siswa</h2>
              <p>Sebuah platform digital yang memudahkan bendahara kelas dalam mencatat dan mengelola transaksi kas kelas dengan transparan dan akurat
              </p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End About Us Section -->
  </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="main-footer">
      <div class="text-center">
        <p>&copy; Copyrights PaKSa. All rights reserved.</p>
      </div>
    </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets/js/main.js"></script>

</body>

</html>