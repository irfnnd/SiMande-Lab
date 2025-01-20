<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SiMande-Lab</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  @vite(['resources/template-bootstrap/css/app.css', 'resources/template-bootstrap/js/app.js'])


  <!-- Favicons -->
  <link href="https://biropbj.sumbarprov.go.id/img/sumbar.png" rel="icon" >
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('template-bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('template-bootstrap/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('template-bootstrap/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('template-bootstrap/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('template-bootstrap/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('template-bootstrap/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('template-bootstrap/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center">

      <div class="container position-absolute d-flex align-items-center justify-content-between">
        <a href="index.html" class=" d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <img src="https://biropbj.sumbarprov.go.id/img/sumbar.png" alt="Logo SiMande-Lab" class="logo me-2"
            style="height: 40px;">
          <h1 class="fs-5" style="margin:0">SiMande-Lab</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/">Home<br></a></li>
            <li><a href="/permohonan-uji">Permohonan uji</a></li>
            <li><a href="/pembayaran">Pembayaran</a></li>
            <li><a href="/tracking">Tracking</a></li>
            <li><a href="/feedback">Feedback</a></li>
            <li><a href="/sertifikat">Sertifikat</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="cta-btn d-none d-sm-block" href="#appointment">login</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        <a class="cta-btn d-none d-sm-block" href="#"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>

      </div>

    </div>

  </header>

  <main class="main">
    @yield("content")
  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Medilab</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Hic solutasetp</h4>
          <ul>
            <li><a href="#">Molestiae accusamus iure</a></li>
            <li><a href="#">Excepturi dignissimos</a></li>
            <li><a href="#">Suscipit distinctio</a></li>
            <li><a href="#">Dilecta</a></li>
            <li><a href="#">Sit quas consectetur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Nobis illum</h4>
          <ul>
            <li><a href="#">Ipsam</a></li>
            <li><a href="#">Laudantium dolorum</a></li>
            <li><a href="#">Dinera</a></li>
            <li><a href="#">Trodelas</a></li>
            <li><a href="#">Flexo</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Medilab</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('template-bootstrap/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template-bootstrap/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('template-bootstrap/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('template-bootstrap/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('template-bootstrap/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('template-bootstrap/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('template-bootstrap/js/main.js')}}"></script>
  <script>
    // Tangkap elemen-elemen penting
    const form = document.getElementById('form-pengajuan');
    const table = document.getElementById('result-table');
    const tableBody = document.getElementById('table-body');

    // Event listener untuk form
    form.addEventListener('submit', function (e) {
      e.preventDefault(); // Mencegah reload halaman

      // Ambil nilai dari form
      const kodePelanggan = document.getElementById('kode_pelanggan').value;
      const sampelDiambilOleh = document.getElementById('sampel_diambil_oleh').value;
      const kodeSample = document.getElementById('kode_sample').value;

      // Validasi sederhana
      if (!kodePelanggan || !sampelDiambilOleh || !kodeSample) {
        alert('Mohon lengkapi semua field!');
        return;
      }

      // Buat baris baru di tabel
      const newRow = `
      <tr>
        <td>${kodePelanggan}</td>
        <td>${sampelDiambilOleh}</td>
        <td>${kodeSample}</td>
      </tr>
    `;
      tableBody.innerHTML += newRow;

      // Tampilkan tabel
      table.style.display = 'block';

      // Reset form
      form.reset();
    });
  </script>


</body>

</html>