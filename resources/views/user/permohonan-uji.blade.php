@extends('layout')

@section('content')

<section id="appointment" class="appointment section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Permohonan Uji</h2>
    <p>masukan data yang diminta</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <form action="forms/appointment.php" method="post" role="form" class="php-email-form">
      <!-- Kode Pelanggan -->
      <div class="row">
        <div class="col-md-4 form-group">
        <label>kode pelanggan</label>
          <input type="text" name="kode_pelanggan" class="form-control" id="kode_pelanggan" placeholder="Kode Pelanggan" readonly>
        </div>

        <!-- Sampel Diambil Oleh -->
        <div class="col-md-4 form-group">
          <label>sampel diambil oleh</label>
          <select name="sampel_diambil_oleh" id="sampel_diambil_oleh" class="form-select" required>
            <option value="petugas">Petugas</option>
            <option value="pelanggan">Pelanggan</option>
          </select>
        </div>
      </div>

      <!-- Optional Fields -->
      <div id="optional-fields" style="display:none">
        <div class="row">
          <!-- kode sampel -->
          <div class="col-md-4 form-group mt-3">
          <label>kode sampel</label>
            <input type="text" name="kode-sampel" class="form-control" id="kode-sampel" placeholder="kode sampel" required>
          </div>
          <!-- tanggal pengambilan -->
          <div class="col-md-4 form-group mt-3">
          <label>tanggal pengambilan</label>
            <input type="date" name="tanggal-pengambilan" class="form-control datepicker" id="tanggal-pengambilan" placeholder="Tanggal Janji" required>
          </div>
          <!-- lokasi pengambilan -->
          <div class="col-md-4 form-group mt-3">
            <label>lokasi pengambilan</label>
          <input type="text" name="lokasi-pengambilan" class="form-control" id="lokasipengambilan" placeholder="lokasi pengambilan">
          </div>
          <!-- kelurahan -->
          <div class="col-md-4 form-group mt-3">
            <label>kelurahan</label>
          <input type="text" name="kelurahan" class="form-control" id="kelurahan" placeholder="kelurahan">
          </div>
          <!-- kecamatan -->
          <div class="col-md-4 form-group mt-3">
            <label>kecamatan</label>
          <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="kecamatan">
          </div>
          <!-- kota -->
          <div class="col-md-4 form-group mt-3">
            <label>kota</label>
          <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="kabupaten">
          </div>
          <!-- waktu pengambilan -->
          <div class="col-md-4 form-group mt-3">
            <label>waktu pengambilan</label>
          <input type="time" name="waktu-pengambilan" class="form-control" id="waktu-pengambilan" placeholder="waktu pengambilan">
          </div>
      </div>
      </div>

<!-- Table Section -->
<div class="table-responsive mt-4">
  <table class="table table-bordered table-hover align-middle">
    <thead class="text-center">
      <tr>
        <th>Kode Parameter</th>
        <th>Nama Parameter</th>
        <th>Metode Uji</th>
        <th>Tarif</th>
        <th>Jumlah Titik</th>
        <th>Jumlah Biaya</th>
      </tr>
    </thead>
    <tbody>
      <!-- Baris Input -->
      <tr>
        <td><input type="text" name="kode_parameter" class="form-control"></td>
        <td><input type="text" name="nama_parameter" class="form-control"></td>
        <td><input type="text" name="metode_uji" class="form-control"></td>
        <td><input type="number" name="tarif" class="form-control" readonly></td>
        <td><input type="number" name="jumlah_titik" class="form-control"></td>
        <td><input type="number" name="jumlah_biaya" class="form-control" readonly></td>
      </tr>

      <!-- Total Biaya -->
      <tr>
        <td colspan="5" class="text-end"><strong>Total Biaya</strong></td>
        <td>
          <input type="number" name="total_biaya" class="form-control text-center fw-bold" readonly>
        </td>
      </tr>
    </tbody>
  </table>
</div>


      <!-- Submit Button -->
      <div class="mt-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Permintaan janji Anda telah berhasil dikirim. Terima kasih!</div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-danger">Batal</button>
        </div>
      </div>
    </form>

  </div>

</section><!-- /Appointment Section -->

@endsection
