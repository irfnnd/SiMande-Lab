@extends('layout')
@section('content')
    <!-- Appointment Section -->
    <div class="" data-aos-delay="200">
        <!-- Teks Selamat Datang -->
        <div class="position-relative" style="height: 200px; overflow: hidden;">
            <!-- Hero Text -->
            <div class=" hero-text position-absolute text-light p-4 w-100 d-flex flex-column justify-content-end"
                style="bottom: 0;  z-index: 10; ">
                <h2 class="fw-bold text-white text-shadow">Pembayaran</h2>
                <p class="mb-0 text-shadow">Pengujian akan dilakukan setelah proses pembayaran selesai</p>
            </div>

            <div class="hero"
                style="background-image: url('template-bootstrap/assets/img/labor.jpg');
                  background-size: cover; background-position: center; height: 200px;">
            </div>
            <!-- Carousel -->

        </div>
    </div>
    <section id="appointment" class="appointment section" data-aos="fade-up">
        <div class="container d-flex justify-content-center align-items-center pt-5 pb-5">
            <div class="p-3 rounded" style="width: 100%; max-width: 100vx; background-color: #ffffff;">
                <h4 class="mb-3 fw-bold">Daftar tagihan</h4>
                <div class="row"></div>

                <!-- Tabel Responsif dengan Tampilan Kartu -->
                <div id="result-table">
                    <!-- Desktop View -->
                    <div id="desktop-view" class="d-none d-md-block">
                        @forelse ($data as $item)
                            <div class="card shadow-sm border-0 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title mt-3"><strong>ID Permintaan Pengujian:</strong>
                                        {{ $item->permintaan_id }}</h5>
                                    <p class="d-inline me-3"><strong>Total Harga:</strong> Rp.
                                        {{ number_format($item->permintaan->total_biaya, 0, ',', '.') }}</p>
                                    <p class="d-inline me-3"><strong>Status:</strong> <span
                                            class="text-success">{{ $item->status }}</span></p>
                                    @if($item->bukti_pembayaran == null)
                                        <p class="d-inline me-3"><strong>Bukti Pembayaran: </strong><span class="text-danger"> Bukti pembayaran belum diupload</span></p>
                                    @else
                                        <p class="d-inline me-3"><strong>Bukti Pembayaran:</strong> <a
                                                href="storage/{{ $item->bukti_pembayaran }}" class="text-info">Lihat</a></p>
                                    @endif
                                    <p class="d-inline me-3"><strong>Tagihan:</strong> <a
                                            href="{{ route('tagihan.unduh', ['id' => $item->id]) }}"
                                            class="text-primary">Cetak</a></p>
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#uploadImageModal"
                                            onclick="pembayaranId('{{ $item->id }}')">
                                            Upload Bukti Pembayaran
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
                    <div id="mobile-view" class="d-md-none">
                        @forelse ($data as $item)
                            <div class="card shadow-sm border-0 mb-3">
                                <div class="card-body">
                                    <h5 class="card-title mt-3"><strong>ID Permintaan Pengujian:</strong>
                                        {{ $item->permintaan_id }}</h5>
                                    <p class=""><strong>Total Harga:</strong> Rp.
                                        {{ number_format($item->permintaan->total_biaya, 0, ',', '.') }}</p>
                                    <p class=""><strong>Status:</strong> <span
                                            class="text-success">{{ $item->status }}</span></p>
                                    <p class=""><strong>Tagihan:</strong> <a
                                            href="{{ route('tagihan.unduh', ['id' => $item->id]) }}"
                                            class="text-primary">Cetak</a></p>
                                    <p class=""><strong>Bukti Pembayaran:</strong> <a
                                            href="storage/{{ $item->bukti_pembayaran }}" class="text-info">Lihat</a></p>
                                    <div class="text-end">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#uploadImageModal"
                                            onclick="pembayaranId('{{ $item->id }}')">
                                            Upload Bukti Pembayaran
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

        <!-- Modal untuk Upload Gambar -->
        <div class="modal fade" id="uploadImageModal" tabindex="-1" aria-labelledby="uploadImageModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadImageModalLabel">Upload Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bukti.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Input ID Permintaan -->
                            <input type="hidden" id="pembayaranId" name="pembayaran_id">
                            <!-- Input File -->
                            <div class="mb-3">
                                <label for="imageInput" class="form-label">Pilih Gambar</label>
                                <input type="file" class="form-control" id="imageInput" name="image" accept="image/*">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Unggah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    // Fungsi untuk menyetel ID permintaan ke input tersembunyi
    function pembayaranId(pembayaranId) {
        document.getElementById('pembayaranId').value = pembayaranId;
    }
</script>
