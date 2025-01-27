@extends('layout')

@section('content')
<div class="" data-aos-delay="200">
    <!-- Teks Selamat Datang -->
    <div class="position-relative" style="height: 200px; overflow: hidden;">
        <!-- Hero Text -->
        <div class="hero-text position-absolute text-light p-4 w-100 d-flex flex-column justify-content-end"
            style="bottom: 0;  z-index: 10; ">
            <h2 class="fw-bold text-white text-shadow">Sertifikat Hasil Pengujian</h2>
            <p class="mb-0 text-shadow">Apabila pengujian telah selesai, sertifikat dapat diCetak oleh pengguna</p>
        </div>

        <div class="hero"
            style="background-image: url('template-bootstrap/assets/img/labor.jpg');
              background-size: cover; background-position: center; height: 500px;">
        </div>
        <!-- Carousel -->

    </div>
</div>

<section id="appointment" class="appointment section" data-aos="fade-up">

    <!-- Form Container -->
    <div class="container d-flex justify-content-center align-items-center py-5">
        <div class="p-4 rounded shadow-lg" style="width: 100%; background-color: #ffffff;">
            <h3 class="text-cente mb-4">Silahkan Download Hasil Pengujian Anda</h3>
            <div id="result-table">
                <!-- Desktop View -->
                <div id="desktop-view" class="d-none d-md-block">
                    @forelse ($data as $item)
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><strong>ID Permintaan Pengujian:</strong> {{ $item->permintaan_id }}</h5>
                                <p class="d-inline me-3"><strong>Nomor Sertifikat: </strong>{{ $item->nomor_sertifikat ?? '-' }}</p>
                                <p class="d-inline me-3"><strong>Tanggal Terbit:</strong>
                                    <span class="{{ $item->tanggal_terbit ? 'text-success' : 'text-danger' }}">
                                        {{ $item->tanggal_terbit ?? 'Belum Terbit' }}
                                    </span>
                                </p>
                                <a href="storage/{{$item->file_path}}" target="_blank" class="btn btn-primary btn-sm">
                                    <i class="fas fa-download me-2"></i>Cetak
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning text-center" role="alert">
                            Belum ada sertifikat pengujian yang telah diterbitkan.
                        </div>
                    @endforelse
                </div>

                <!-- Mobile View -->
                <div id="mobile-view" class="d-md-none">
                    @forelse ($data as $item)
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><strong>ID Permintaan Pengujian:</strong> {{ $item->permintaan_id }}</h5>
                                <p><strong>Nomor Sertifikat: </strong>{{ $item->nomor_sertifikat ?? '-' }}</p>
                                <p><strong>Tanggal Terbit: </strong>
                                    <span class="{{ $item->tanggal_terbit ? 'text-success' : 'text-danger' }}">
                                        {{ $item->tanggal_terbit ?? 'Belum Terbit' }}
                                    </span>
                                </p>
                                <a href="storage/{{$item->file_path}}" class="btn btn-primary btn-sm w-100">
                                    <i class="fas fa-download me-2"></i>Cetak
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-warning text-center" role="alert">
                            Belum ada sertifikat pengujian yang telah diterbitkan.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
