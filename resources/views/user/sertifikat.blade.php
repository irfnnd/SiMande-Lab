@extends('layout')

@section('content')

<div id="page-title" class="page-title-mini p-4" data-aos="fade-up" style="background-color: var(--accent-color)">
    <div class="container clearfix ">
        <h4 class="text-white mb-1">Sertifikat Hasil Pengujian</h4>
        <p class="mb-0 text-white-50">Apabila pengujian telah selesai, sertifikat dapat diCetak oleh pengguna</p>
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
