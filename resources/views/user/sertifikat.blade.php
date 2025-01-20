@extends('layout')

@section('content')
<section id="appointment" class="appointment section">

  <!-- Form Container -->
  <div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 70vh;">
    <form action="#" method="post" role="form" class="php-email-form p-4 shadow rounded" style="width: 100%; max-width: 600px; background-color;">
      <h3 class="text-center mb-4">Silahkan Download Hasil Pengujian Anda</h3>

      <div class="row">
        <!-- Kode Pelanggan -->
        <div class="col-md-6 form-group">
          <label for="kode_pelanggan">Kode Pelanggan</label>
          <input type="text" name="kode_pelanggan" class="form-control" id="kode_pelanggan" placeholder="Kode Pelanggan" value="[Auto-generated]" readonly>
        </div>
        <!-- Nama Pelanggan -->
        <div class="col-md-6 form-group">
          <label for="nama_pelanggan">Nama Pelanggan</label>
          <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Nama Pelanggan" value="[Auto-generated]" readonly>
        </div>
      </div>

      <!-- Buttons -->
      <div class="row justify-content-end mt-3">
        <div class="col-md-auto form-group">
          <button type="submit" class="btn btn-primary w-100">Cetak</button>
        </div>
        <div class="col-md-auto form-group">
          <button type="submit" class="btn btn-primary w-100">Download</button>
        </div>
      </div>
    </form>
  </div>

</section>
@endsection
