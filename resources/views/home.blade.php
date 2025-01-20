@extends('layout')
@section('content')
<!-- Doctors Section -->
<section id="doctors" class="doctors section position-relative">

  <!-- Teks Selamat Datang -->
  <div class="hero-text position-absolute text-light p-4 w-100"
    style="top: 400px; left: 0px; background: rgba(0, 0, 0, 0.3); z-index: 10;">
    <h1 class="fw-bold text-white text-shadow">Selamat Datang Di SiMande-Lab</h1>
    <p class="mb-0 text-shadow">Temukan informasi dan layanan terbaik yang kami tawarkan untuk memenuhi kebutuhan Anda
    </p>
  </div>

  <!-- Carousel -->
  <div id="heroCarousel" class="carousel slide position-relative m-0" data-bs-ride="carousel" data-bs-interval="2000">
    <!-- Carousel Items -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="hero"
          style="background-image: url('https://2.bp.blogspot.com/-gKDim8_9Mas/UQeBbWsyhbI/AAAAAAAAC4Y/YaDeuYab5U0/s1600/3.JPG'); background-size: cover; background-position: center; height: 400px;">
        </div>
      </div>
      <div class="carousel-item">
        <div class="hero"
          style="background-image: url('https://www.hseprime.com/wp-content/uploads/2018/09/lab-pic-800x480-1.jpeg'); background-size: cover; background-position: center; height: 400px;">
        </div>
      </div>
      <div class="carousel-item">
        <div class="hero"
          style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeIyF-j6RaJCxNfVDMKas56G6DFG3smSGetQ&s'); background-size: cover; background-position: center; height: 400px;">
        </div>
      </div>
    </div>
  </div>

  <!-- Container -->
  <div class="container mt-5 mb-2">
    <div class="row gy-4">
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="https://iik.ac.id/blog/wp-content/uploads/2023/06/tlm-1206.jpeg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Permohonan Uji</h4>
            <span>Ajukan Pengujian Anda Sekarang!</span>
            <p>Kami siap membantu memenuhi kebutuhan pengujian Anda dengan layanan profesional dan terpercaya</p>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQThjXjEUHN9J6gm4MsUOrBW0jK4QqiHIWcoA&s" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Pembayaran</h4>
            <span>Anesthesiologist</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
          </div>
        </div>
      </div><!-- End Team Member -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="https://nordvpn.com/wp-content/uploads/blog-cross-site-tracking.svg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Tracking</h4>
            <span>Anesthesiologist</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
          </div>
        </div>
      </div><!-- End Team Member -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWGqJQwCYSeqe-NcLdPQCaJCZtmLNEi6vvcA&s" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Feedback</h4>
            <span>Anesthesiologist</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
          </div>
        </div>
      </div><!-- End Team Member -->
      <div class="col-lg-6 offset-lg-3 mb-2" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="https://png.pngtree.com/png-vector/20230526/ourmid/pngtree-gold-luxury-certified-badge-with-red-ribbon-and-white-combination-color-vector-png-image_7109577.png" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Sertifikat</h4>
            <span>Anesthesiologist</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
          </div>
        </div>
      </div><!-- End Team Member -->
    </div>
  </div>
</section>
@endsection