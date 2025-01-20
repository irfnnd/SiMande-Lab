@extends('layout')
@section('content')
<section id="appointment" class="appointment section">
    <div class="container d-flex justify-content-center align-items-center mt-5" style="min-height: 70vh;">
      <form action="#" method="post" role="form" class="php-email-form p-4 shadow rounded" style="width: 100%; max-width: 600px; background-color: #ffffff;">
        <h3 class="text-center mb-4 text-black text-bold">Feedback</h3>

        <!-- Jenis Kelamin -->
        <div class="bg-white p-3 mb-3 rounded">
          <label class="fw-bold">Jenis Kelamin:</label>
          <div class="d-flex gap-3 mt-2 flex-wrap">
            <label class="d-flex align-items-center gap-2"><input type="radio" name="jenis_kelamin" value="Laki-Laki" class="radio-custom"> Laki-Laki</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="jenis_kelamin" value="Perempuan" class="radio-custom"> Perempuan</label>
          </div>
        </div>

        <!-- Usia -->
        <div class="bg-white p-3 mb-3 rounded">
          <label class="fw-bold">Usia Anda:</label>
          <div class="d-flex gap-3 mt-2 flex-wrap">
            <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="kurang-20" class="radio-custom"> Kurang 20</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="21-30" class="radio-custom"> 21-30</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="31-40" class="radio-custom"> 31-40</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="41-50" class="radio-custom"> 41-50</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="51-60" class="radio-custom"> 51-60</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="lebih-dari-60" class="radio-custom"> Lebih dari 60</label>
          </div>
        </div>

        <!-- Pendidikan Terakhir -->
        <div class="bg-white p-3 mb-3 rounded">
          <label class="fw-bold">Pendidikan Terakhir:</label>
          <div class="d-flex gap-3 mt-2 flex-wrap">
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="sd" class="radio-custom"> SD</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="smp" class="radio-custom"> SMP</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="sma" class="radio-custom"> SMA</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="diploma" class="radio-custom"> Diploma</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="sarjana" class="radio-custom"> Sarjana</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="tidak-tamat" class="radio-custom"> Tidak Tamat</label>
          </div>
        </div>

        <!-- Pekerjaan -->
        <div class="bg-white p-3 mb-3 rounded">
          <label class="fw-bold">Pekerjaan:</label>
          <div class="d-flex gap-3 mt-2 flex-wrap">
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="wiraswasta" class="radio-custom"> Wiraswasta</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="PNS/TNI/POLRI" class="radio-custom"> PNS/TNI/POLRI</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="Pegawai Swasta" class="radio-custom"> Pegawai Swasta</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="Lainnya" class="radio-custom"> Lainnya</label>
          </div>
        </div>

        <!-- Pendapat Responden -->
        <div class="bg-white p-3 mb-3 rounded">
          <label class="fw-bold">1. Bagaimana pendapat saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label>
          <div class="d-flex gap-3 mt-2 flex-wrap">
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="Sangat Sesuai" class="radio-custom"> Sangat Sesuai</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="Sesuai" class="radio-custom"> Sesuai</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="Tidak Sesuai" class="radio-custom"> Tidak Sesuai</label>
            <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="Sangat Tidak Sesuai" class="radio-custom"> Sangat Tidak Sesuai</label>
          </div>
        </div>

        <!-- Tombol Submit -->
        <div class="text-center mt-4">
          <button type="submit" class="btn btn-primary">Berikutnya</button>
        </div>
      </form>
    </div>
  </section>
  @endsection