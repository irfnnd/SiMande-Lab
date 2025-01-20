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
  <form action="#" method="post" role="form" class="php-email-form p-4 shadow rounded" style="width: 100%; max-width: 100vx; background-color: #ffffff;">
    <h3 class="text-center mb-4">Form Pembayaran</h3>

    <div class="row">
  </form>

<!-- Tabel Responsif dengan Tampilan Kartu -->
<div id="result-table" class="mt-5">
  <table class="table table-striped table-hover table-bordered align-middle d-none d-md-table">
    <thead class="table-primary text-center">
      <tr>
        <th>No</th>
        <th>Id Permintaan</th>
        <th>Total Harga</th>
        <th>Bukti Pembayaran</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="table-body">
      <tr>
        <td class="text-center">1</td>
        <td class="text-center">PMT-001</td>
        <td class="text-end">Rp 500.000</td>
        <td class="text-center"><a href="#" class="btn btn-sm btn-success">Lihat</a></td>
        <td class="text-center"><span class="badge bg-success">Diterima</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-primary">Edit</button>
          <button class="btn btn-sm btn-danger">Hapus</button>
        </td>
      </tr>
      <tr>
        <td class="text-center">2</td>
        <td class="text-center">PMT-002</td>
        <td class="text-end">Rp 1.000.000</td>
        <td class="text-center"><a href="#" class="btn btn-sm btn-success">Lihat</a></td>
        <td class="text-center"><span class="badge bg-warning text-dark">Pending</span></td>
        <td class="text-center">
          <button class="btn btn-sm btn-primary">Edit</button>
          <button class="btn btn-sm btn-danger">Hapus</button>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- Tampilan Mobile -->
  <div id="mobile-view" class="d-md-none">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">PMT-001</h5>
        <p><strong>Total Harga:</strong> Rp 500.000</p>
        <p><strong>Status:</strong> <span class="badge bg-success">Diterima</span></p>
        <p><strong>Bukti Pembayaran:</strong> <a href="#" class="btn btn-sm btn-success">Lihat</a></p>
        <div class="text-end">
          <button class="btn btn-sm btn-primary">Edit</button>
          <button class="btn btn-sm btn-danger">Hapus</button>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">PMT-002</h5>
        <p><strong>Total Harga:</strong> Rp 1.000.000</p>
        <p><strong>Status:</strong> <span class="badge bg-warning text-dark">Pending</span></p>
        <p><strong>Bukti Pembayaran:</strong> <a href="#" class="btn btn-sm btn-success">Lihat</a></p>
        <div class="text-end">
          <button class="btn btn-sm btn-primary">Edit</button>
          <button class="btn btn-sm btn-danger">Hapus</button>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

</div>

</div>


</section><!-- /Appointment Section -->
@endsection
