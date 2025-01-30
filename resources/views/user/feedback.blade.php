@extends('layout')
@section('content')
<div class="" data-aos-delay="200">
    <!-- Teks Selamat Datang -->
    <div class="position-relative" style="height: 200px; overflow: hidden;">
        <!-- Hero Text -->
        <div class="hero-text position-absolute text-light p-4 w-100 d-flex flex-column justify-content-end"
            style="bottom: 0;  z-index: 10; ">
            <h2 class="fw-bold text-white text-shadow">Umpan Balik Pengguna</h2>
            <p class="mb-0 text-shadow">Terima kasih telah menggunakan layanan kami</p>
        </div>

        <div class="hero"
            style="background-image: url('template-bootstrap/assets/img/labor.jpg');
              background-size: cover; background-position: center; height: 500px;">
        </div>
        <!-- Carousel -->

    </div>
</div>
<section class="content mt-4" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm">
                    <p class="mb-2 fw-bold">Pendapat dan saran dari pengguna sangat diperlukan untuk meningkatkan layanan kami</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="fw-bold">Jika ada pertanyaan mengenai layanan kami?</span> Silahkan hubungi kontak yang tertera
                        </li>
                        <li>
                            <span class="fw-bold">Dinas Lingkungan Hidup Provinsi Sumatra Barat</span> UPTD Laboatorium Lingkungan
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="col-md-8">
                <div class="card shadow-sm mb-3">
                    <div class="card-header bg-white border-bottom-0">
                        <h4 class="m-3">Feedback Kepuasan Pelanggan</h4>
                    </div>
                    <form action="" method="post" role="form" class="card-body p-4">
                        @csrf
                        <input type="hidden" name="pelanggan_id" value="{{ $pelanggan_id }}">
                        <!-- Input Usia -->
                        <div class=" p-3 mb-4 rounded">
                            <label class="fw-bold">Usia Anda:</label>
                            <div class="d-flex gap-4 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="umur" value="kurang-20" class="form-check-input"> Kurang dari 20</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="umur" value="20-30" class="form-check-input"> 20-30</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="umur" value="31-40" class="form-check-input"> 31-40</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="umur" value="41-50" class="form-check-input"> 41-50</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="umur" value="51-60" class="form-check-input"> 51-60</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="umur" value="lebih-dari-60" class="form-check-input"> Lebih dari 60</label>
                            </div>
                        </div>

                        <!-- Input Gender -->
                        <div class=" p-3 mb-4 rounded">
                            <label class="fw-bold">Jenis Kelamin:</label>
                            <div class="d-flex gap-5 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2">
                                    <input type="radio" name="jenis_kelamin" value="Laki-Laki" class="form-check-input"> Laki-Laki
                                </label>
                                <label class="d-flex align-items-center gap-2">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-check-input"> Perempuan
                                </label>
                            </div>
                        </div>
                        <div class=" p-3 mb-4 rounded">
                            <label class="fw-bold">Pekerjaan:</label>
                            <div class="d-flex gap-4 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="wiraswasta" class="form-check-input"> Wiraswasta</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="PNS/TNI/POLRI" class="form-check-input"> PNS/TNI/POLRI</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="Pegawai Swasta" class="form-check-input"> Pegawai Swasta</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pekerjaan" value="Lainnya" class="form-check-input"> Lainnya</label>
                            </div>
                        </div>
                        <div class=" p-3 mb-4 rounded">
                            <label class="fw-bold">Pendidikan Terakhir:</label>
                            <div class="d-flex gap-4 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="SD/Sederajat" class="form-check-input"> SD/Sederajat</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="SMP/Sederajat" class="form-check-input"> SMP/Sederajat</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="SMA/Sederajat" class="form-check-input"> SMA/Sederajat</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="Srata 1" class="form-check-input"> Srata 1</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="Srata 2" class="form-check-input"> Srata 2</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendidikan" value="Srata 3" class="form-check-input"> Srata 3</label>
                            </div>
                        </div>
                        <!-- Input Pengalaman -->
                        <div class="p-3 mb-4 rounded">
                            <label class="fw-bold">Bagaimana pendapat saudara tentang pelayanan yang diberikan?</label>
                            <div class="d-flex gap-4 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="rating" value="1" class="form-check-input"> Sangat Tidak Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="rating" value="2" class="form-check-input"> Tidak Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="rating" value="3" class="form-check-input"> Cukup Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="rating" value="4" class="form-check-input"> Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="rating" value="5" class="form-check-input"> Sangat Puas</label>
                            </div>
                        </div>

                        <!-- Input Feedback -->
                        <div class="p-3 mb-4 rounded">
                            <label for="feedback" class="form-label fw-bold">Pendapat dan Saran Anda</label>
                            <textarea name="feedback" id="feedback" class="form-control" rows="5" required></textarea>
                        </div>
                        <!-- Tombol Submit -->
                        <div class="d-grid ">
                            <button type="submit" class="btn btn-primary py-2">Kirim Feedback</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
