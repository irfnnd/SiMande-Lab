@extends('layout')
@section('content')
<!-- Doctors Section -->

<section id="doctors" class="doctors section position-relative">
<div class=""  data-aos-delay="200">
    <!-- Teks Selamat Datang -->
    <div class="position-relative" style="height: 500px; overflow: hidden;">
      <!-- Hero Text -->
      <div class="hero-text position-absolute text-light p-4 w-100 d-flex flex-column justify-content-end"
           style="bottom: 0; background: rgba(0, 0, 0, 0.2); z-index: 10;">
        <h1 class="fw-bold text-white text-shadow">Selamat Datang Di SiMande-Lab</h1>
        <p class="mb-0 text-shadow">Temukan informasi dan layanan terbaik yang kami tawarkan untuk memenuhi kebutuhan Anda</p>
      </div>

      <!-- Carousel -->
      <div id="heroCarousel" class="carousel slide position-relative m-0" data-bs-ride="carousel" data-bs-interval="2000">
        <!-- Carousel Items -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="hero"
                 style="background-image: url('template-bootstrap/assets/img/rumah-gadang.png');
                        background-size: cover; background-position: center; height: 400px;">
            </div>
          </div>
          <div class="carousel-item">
            <div class="hero"
                 style="background-image: url('template-bootstrap/assets/img/labor.jpg');
                        background-size: cover; background-position: center; height: 400px;">
            </div>
          </div>
          <div class="carousel-item">
            <div class="hero"
                 style="background-image: url('template-bootstrap/assets/img/labor2.jpg');
                        background-size: cover; background-position: center; height: 400px;">
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


  <!-- Container -->
  <div class="container mt-5 pb-5">
    <div class="row gy-4">
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
          <div class="team-member d-flex align-items-start">
            <div class="pic">
              <img src="https://iik.ac.id/blog/wp-content/uploads/2023/06/tlm-1206.jpeg" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>Permohonan Uji</h4>
              <span>Ajukan Pengujian Anda Sekarang!</span>
              <p>Kami siap membantu memenuhi kebutuhan pengujian Anda dengan layanan profesional dan terpercaya.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="team-member d-flex align-items-start">
            <div class="pic">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQThjXjEUHN9J6gm4MsUOrBW0jK4QqiHIWcoA&s" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>Pembayaran</h4>
              <span>Transaksi Aman dan Mudah</span>
              <p>Lakukan pembayaran dengan berbagai metode yang kami sediakan secara cepat dan terjamin keamanannya.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="team-member d-flex align-items-start">
            <div class="pic">
              <img src="https://nordvpn.com/wp-content/uploads/blog-cross-site-tracking.svg" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>Tracking</h4>
              <span>Lacak Progres Uji Anda</span>
              <p>Ketahui status dan perkembangan proses pengujian Anda secara real-time kapan pun dan di mana pun.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <div class="team-member d-flex align-items-start">
            <div class="pic">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWGqJQwCYSeqe-NcLdPQCaJCZtmLNEi6vvcA&s" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>Feedback</h4>
              <span>Sampaikan Pendapat Anda</span>
              <p>Bantu kami meningkatkan kualitas layanan dengan memberikan masukan atau ulasan terhadap layanan yang Anda terima.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 offset-lg-3 mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="team-member d-flex align-items-start">
            <div class="pic">
              <img src="https://png.pngtree.com/png-vector/20230526/ourmid/pngtree-gold-luxury-certified-badge-with-red-ribbon-and-white-combination-color-vector-png-image_7109577.png" class="img-fluid" alt="">
            </div>
            <div class="member-info">
              <h4>Sertifikat</h4>
              <span>Bukti Resmi Pengujian</span>
              <p>Dapatkan sertifikat resmi sebagai tanda bukti bahwa produk Anda telah melalui proses pengujian sesuai standar.</p>
            </div>
          </div>
        </div>
      </div>

  </div>
</section>
@endsection
