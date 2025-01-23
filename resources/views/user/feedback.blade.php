@extends('layout')
@section('content')
<section id="page-title" class="page-title-mini p-4" style="background-color: var(--accent-color)">
    <div class="container clearfix">
        <h4 class="text-white m-0">Feedback</h4>
    </div>
</section>
<section class="content mt-4">
    <div class="container">
        <div class="row">
            <!-- Kolom Kiri -->
            <div class="col-md-4">
                <div class="bg-light p-4 rounded shadow-sm">
                    <p class="mb-2 fw-bold">Need to get in touch? No problem! You can use our contact form to send us a message.</p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <span class="fw-bold">Need a support?</span> Check our available
                            <a href="#" class="text-primary text-decoration-underline">support options</a>.
                        </li>
                        <li>
                            <span class="fw-bold">Want to remove the back links to BootstrapMade?</span> Check our available
                            <a href="#" class="text-primary text-decoration-underline">licensing options</a>.
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

                        <!-- Input Usia -->
                        <div class=" p-3 mb-4 rounded">
                            <label class="fw-bold">Usia Anda:</label>
                            <div class="d-flex gap-4 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="kurang-20" class="form-check-input"> Kurang dari 20</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="21-30" class="form-check-input"> 21-30</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="31-40" class="form-check-input"> 31-40</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="41-50" class="form-check-input"> 41-50</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="51-60" class="form-check-input"> 51-60</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="usia" value="lebih-dari-60" class="form-check-input"> Lebih dari 60</label>
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
                        <!-- Input Pengalaman -->
                        <div class="p-3 mb-4 rounded">
                            <label class="fw-bold">Bagaimana pendapat saudara tentang pelayanan yang diberikan?</label>
                            <div class="d-flex gap-4 mt-2 flex-wrap">
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="1" class="form-check-input"> Sangat Tidak Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="2" class="form-check-input"> Tidak Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="3" class="form-check-input"> Cukup Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="4" class="form-check-input"> Puas</label>
                                <label class="d-flex align-items-center gap-2"><input type="radio" name="pendapat" value="5" class="form-check-input"> Sangat Puas</label>
                            </div>
                        </div>

                        <!-- Input Feedback -->
                        <div class="p-3 mb-4 rounded">
                            <label for="feedback" class="form-label fw-bold">Feedback</label>
                            <textarea name="feedback" id="feedback" class="form-control" rows="5" required></textarea>
                        </div>

                        <!-- Checkbox Privacy Policy -->
                        <div class=" p-3 form-check mb-3">
                            <input type="checkbox" name="agree" class="form-check-input" id="privacyPolicy" required>
                            <label class="form-check-label" for="privacyPolicy">I've read and accept the privacy policy.</label>
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
