@extends('layout')
@section('content')
    <!-- Appointment Section -->
    <section id="appointment" class="appointment section">

      <!-- Section Title -->
      <!-- <div class="container section-title" data-aos="fade-up">
        <h2>Appointment</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div> -->
      <!-- End Section Title -->

      <!-- Form Container -->
<div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 70vh;">
  <form action="#" method="post" role="form" class="php-email-form p-4 shadow rounded" style="width: 100%; max-width: 100vx; background-color: #D9D9D9;">
    <h3 class="text-center mb-4">Form Pembayaran</h3>

    <div class="row">
      <!-- Kode Pelanggan -->
      <div class="col-md-6 form-group">
        <label for="kode_pelanggan">Kode Pelanggan </label>
        <input type="text" name="kode_pelanggan" class="form-control" id="kode_pelanggan" placeholder="Kode Pelanggan" value="[Auto-generated]" readonly>
      </div>
      <div class="col-md-6 form-group">
        <label for="kode_pelanggan">Nama Pelanggan </label>
        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="nama Pelanggan" value="[Auto-generated]" readonly>
      </div>

  </form>

    <!-- Tabel -->
    <div id="result-table" class="mt-5">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode uji</th>
          <th>Tanggal Pengajuan</th>
          <th>Nama Perusahaan</th>
          <th>Total Harga</th>
          <th>Bukti Pembayaran</th>
          <th>Status</th>
          <th>Upload Berkas</th>
        </tr>
      </thead>
      <tbody id="table-body">
        <!-- Data dari form akan dimasukkan ke sini -->
      </tbody>
    </table>
  </div>
</div>

</div>


</section><!-- /Appointment Section -->
@endsection
