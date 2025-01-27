@extends('layout')
@section('content')
<div class="" data-aos-delay="200">
    <!-- Teks Selamat Datang -->
    <div class="position-relative" style="height: 200px; overflow: hidden;">
        <!-- Hero Text -->
        <div class="hero-text position-absolute text-light p-4 w-100 d-flex flex-column justify-content-end"
            style="bottom: 0;  z-index: 10; ">
            <h2 class="fw-bold text-white text-shadow">Pelacakan Proses Pengujian</h2>
            <p class="mb-0 text-shadow">Proses yang dilakukan akan diperbarui secara real-time</p>
        </div>

        <div class="hero"
            style="background-image: url('template-bootstrap/assets/img/labor.jpg');
              background-size: cover; background-position: center; height: 500px;">
        </div>
        <!-- Carousel -->

    </div>
</div>
    <section id="appointment" data-aos="fade-up" class="appointment section">
        <div class="container d-flex justify-content-center align-items-center pt-5 pb-5">
            <div class="p-3 rounded" style="width: 100%; max-width: 100vx; background-color: #ffffff;">
                <h4 class="mb-3 fw-bold">Daftar Permintaan Pengujian</h4>
                <div class="row"></div>

                <!-- Tabel Responsif dengan Tampilan Kartu -->
                <div id="result-table">
                    <!-- Desktop View -->
                    <div id="desktop-view" class="d-none d-md-block">
                        <div class="card shadow-sm border-0 mb-3">
                            <div class="card-body">
                                @forelse ($data as $item)
                                <div class="mb-4">
                                    <h5 class="card-title mt-3"><strong>ID Permintaan Pengujian:</strong>
                                        {{ $item->id }}</h5>
                                    <p class="d-inline me-3"><strong>Parameter Uji:</strong> <span
                                            class="text-success">{{ $item->parameter }}</span></p>
                                    <p class="d-inline me-3"><strong>Jumlah Titik:</strong> <span
                                            class="text-success">{{ $item->jumlah_titik }}</span></p>
                                    <p class="d-inline me-3"><strong>Status:</strong> <span
                                            class="text-success">{{ $item->status }}</span></p>
                                    <a class="btn btn-sm btn-primary d-inline end-0" data-bs-toggle="modal"
                                        data-bs-target="#detailStatus" onclick="permintaanId('{{ $item->id }}')">
                                        Lacak Proses
                                    </a>
                                </div>
                                @empty
                                    <div class="card shadow-sm mb-3 border-0">
                                        <div class="card-body p-4">
                                            <p class="text-center mb-0">Belum ada tagihan atau permintaan pengujian</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div id="mobile-view" class="d-md-none">
                        @forelse ($data as $item)
                            <div class="card shadow-sm border-0 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title mt-3"><strong>ID Permintaan Pengujian:</strong>
                                        {{ $item->id }}</h5>
                                    <p class="d-inline me-3"><strong>Parameter Uji:</strong> <span
                                            class="text-success">{{ $item->parameter }}</span></p>
                                    <p class="d-inline me-3"><strong>Jumlah Titik:</strong> <span
                                            class="text-success">{{ $item->jumlah_titik }}</span></p>
                                    <p class="d-inline me-3"><strong>Status:</strong> <span
                                            class="text-success">{{ $item->status }}</span></p>
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#detailStatus" onclick="permintaanId('{{ $item->id }}')">
                                            Lacak Proses
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card shadow-sm mb-3 border-0">
                                <div class="card-body p-4">
                                    <p class="text-center mb-0">Belum ada tagihan atau permintaan pengujian</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal untuk Timeline -->
        <div class="modal fade" id="detailStatus" tabindex="-1" aria-labelledby="detailStatusLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailStatusLabel">Riwayat Proses Pengujian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="conatiner">

                        </div>
                        <div class="timeline">
                            <!-- Timeline akan diisi dengan data dari AJAX -->
                        </div>
                        <p class="mt-4">Status Saat Ini: <span class="badge bg-success" id="currentStatus"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function permintaanId(id) {
        // Hapus isi modal sebelumnya
        document.querySelector('.timeline').innerHTML = '';
        document.getElementById('currentStatus').textContent = '';

        // Fetch data status history melalui AJAX
        fetch(`/get-status-history/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.history && data.history.length > 0) {
                    data.history.forEach(item => {
                        const timelineItem = `
                            <div class="timeline-item mb-3">
                                <p class="text-muted">${item.updated_at}</p>
                                <span class="badge bg-primary">${item.status}</span>
                            </div>`;
                        document.querySelector('.timeline').insertAdjacentHTML('beforeend', timelineItem);
                    });
                } else {
                    document.querySelector('.timeline').innerHTML =
                        '<p class="text-muted">Tidak ada riwayat status.</p>';
                }

                document.getElementById('currentStatus').textContent = data.permintaan.status;
            })
            .catch(error => console.error('Error:', error));
    }
</script>
