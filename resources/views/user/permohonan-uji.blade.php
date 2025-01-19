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
      <div class="row">
        <!-- Kode Pelanggan -->
        <div class="col-md-4 form-group">
          <input type="text" name="kode_pelanggan" class="form-control" id="kode_pelanggan" placeholder="Kode Pelanggan" readonly>
        </div>

        <!-- Sampel Diambil Oleh -->
        <div class="col-md-4 form-group">
          <select name="sampel_diambil_oleh" id="sampel_diambil_oleh" class="form-select" required>
            <option value="petugas">Petugas</option>
            <option value="pelanggan">Pelanggan</option>
          </select>
        </div>
      </div>

      <!-- Optional Fields -->
      <div id="optional-fields" style="display:none">
        <div class="row">
          <!-- Appointment Date -->
          <div class="col-md-4 form-group mt-3">
            <input type="datetime-local" name="date" class="form-control datepicker" id="date" placeholder="Tanggal Janji" required>
          </div>

          <!-- Department -->
          <div class="col-md-4 form-group mt-3">
          <input type="date" name="tanggal_pengambilan" class="form-control" id="tanggal_pengambilan" placeholder="tanggal pengambilan">
          </div>

          <!-- Doctor -->
          <div class="col-md-4 form-group mt-3">
          <input type="text" name="lokasi_pengambilan" class="form-control" id="lokasi_pengambilan" placeholder="lokasi pengambilan">
          </div>
          <div class="col-md-4 form-group mt-3">
          <input type="text" name="kelurahan" class="form-control" id="kelurahan" placeholder="kelurahan">
          </div>
          <div class="col-md-4 form-group mt-3">
          <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="kecamatan">
          </div>
          <div class="col-md-4 form-group mt-3">
          <input type="text" name="kabupaten" class="form-control" id="kabupaten" placeholder="kabupaten">
          </div>
          <div class="col-md-4 form-group mt-3">
          <input type="time" name="waktu_pengambilan" class="form-control" id="waktu_pengambilan" placeholder="waktu pengambilan">
          </div>
      </div>
      </div>
      <div class="mt-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Permintaan janji Anda telah berhasil dikirim. Terima kasih!</div>
        <div class="text-center">
          <button type="submit">Buat Janji</button>
        </div>

      <!-- Table Section -->
      <div class="table-responsive mt-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Parameter</th>
              <th>Nama Parameter</th>
              <th>Metode Uji</th>
              <th>Tarif</th>
              <th>Jumlah Titik</th>
              <th>Jumlah Biaya</th>
              <th>pembayaran</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name="kode_parameter[]"></td>
              <td><input type="text" name="nama_parameter[]"></td>
              <td><input type="text" name="metode_uji[]"></td>
              <td><input type="number" name="tarif[]"></td>
              <td><input type="number" name="jumlah_titik[]"></td>
              <td><input type="number" name="jumlah_biaya[]"readonly></td>
              <td><input type="text" name="pembayaran[]" value="1"></td>
            </tr>
            <tr>
              <td colspan="6" class="text-end"><strong>Total Biaya</strong></td>
              <td><input type="number" name="total_biaya" class="form-control" readonly></td>
              <td></td>
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
          <button type="reset" class="btn btn-secondary">Batal</button>
        </div>
      </div>
    </form>

  </div>

</section><!-- /Appointment Section -->

@endsection
