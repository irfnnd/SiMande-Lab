@extends('layout')

@section('content')
    <div class="" data-aos-delay="200">
        <!-- Teks Selamat Datang -->
        <div class="position-relative" style="height: 200px; overflow: hidden;">
            <!-- Hero Text -->
            <div class="hero-text position-absolute text-light p-4 w-100 d-flex flex-column justify-content-end"
                style="bottom: 0;  z-index: 10; ">
                <h2 class="fw-bold text-white text-shadow">Permohonan Uji</h2>
                <p class="mb-0 text-shadow">Permohonan akan diterima oleh petugas penguji</p>
            </div>

            <div class="hero"
                style="background-image: url('template-bootstrap/assets/img/labor.jpg');
                  background-size: cover; background-position: center; height: 500px;">
            </div>
            <!-- Carousel -->

        </div>
    </div>

    <div id="content" data-aos="fade-up">
        <div class="content-wrap pt-5 pb-5">
            <!-- Tab Navigation -->
            <div class="row mb-4">
                <div class="col">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="form-tab" data-bs-toggle="tab" href="#form">Ajukan Permohonan
                                Uji</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="data-permohonan-tab" data-bs-toggle="tab" href="#data-permohonan">Lihat
                                Data
                                Permohonan</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="tab-content">
                    <!-- Form Permohonan Uji -->
                    <div class="tab-pane fade show active" id="form">
                        <div class="card border-0">
                            <div class="card-header border-0 bg-white">
                                <h4 class=" mb-0 text-center">Formulir Permohonan Pengujian</h4>
                            </div>
                            <div class="card-body">
                                <form action="/permohonan-uji" method="POST" onsubmit="enableInputs()">
                                    @csrf
                                    <div class="card border-0 mt-4">
                                        <div class="card-header border-0 bg-white">
                                            <h5 class=" mb-0">Informasi Sampel</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-4">
                                                    <label for="id_pelanggan" class="form-label">ID Pelanggan <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="id_pelanggan" id="id_pelanggan"
                                                        class="form-control" required readonly value="{{ $pelanggan->id }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="nama_pelanggan" id="nama_pelanggan"
                                                        class="form-control" required readonly
                                                        value="{{ $pelanggan->nama_pelanggan }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="kode_sampel" class="form-label">Kode Sampel <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="kode_sampel" id="kode_sampel"
                                                        class="form-control" required readonly value="{{ $kodeSampel }}">
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-3">
                                                <div class="col-md-6">
                                                    <label>Pengambilan Sampel Oleh <span
                                                            class="text-danger">*</span></label>
                                                    <div class="d-flex align-items-center mt-3">
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input"
                                                                name="pengambilan_sampel" id="pelanggan" value="pelanggan"
                                                                required onchange="toggleCards()">
                                                            <label class="form-check-label"
                                                                for="pelanggan">Pelanggan</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" class="form-check-input"
                                                                name="pengambilan_sampel" id="petugas" value="petugas"
                                                                required onchange="toggleCards()">
                                                            <label class="form-check-label" for="petugas">Petugas</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Informasi Sampel -->
                                    <div class="card border-0 mt-4" id="informasiSampelCard">
                                        <div class="card-header border-0 bg-white">
                                            <h5 class="mb-0">Informasi Sampel</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="tanggal_pengambilan" class="form-label">Tanggal Pengambilan
                                                        <span class="text-danger">*</span></label>
                                                    <input type="date" name="tanggal_pengambilan"
                                                        data-name="tanggal_pengambilan" id="tanggal_pengambilan"
                                                        class="form-control" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="waktu_pengambilan" class="form-label">Waktu Pengambilan
                                                        <span class="text-danger">*</span></label>
                                                    <input type="time" name="waktu_pengambilan" id="waktu_pengambilan"
                                                        data-name="waktu_pengambilan" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Parameter Pengujian -->
                                    <div class="card mt-4 border-0 bg-white" id="parameterPengujianCard">
                                        <div class="card-header border-0 bg-white">
                                            <h5 class="mb-0">Parameter Pengujian</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label for="parameter_id" class="form-label">Parameter Pengujian <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" name="parameter_id" id="parameter_id"
                                                        disabled>
                                                        <option value="">-- Pilih Parameter --</option>
                                                        @foreach ($parameters as $parameter)
                                                            <option value="{{ $parameter->id }}">
                                                                {{ $parameter->parameter }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="kode_parameter" class="form-label">Kode Parameter</label>
                                                    <input type="text" name="kode_parameter" id="kode_parameter"
                                                        class="form-control" readonly disabled>
                                                    <input type="text" hidden name="parameter" id="parameter"
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="satuan" class="form-label">Satuan</label>
                                                    <input type="text" name="satuan" id="satuan"
                                                        class="form-control" readonly disabled>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="wadah" class="form-label">Wadah</label>
                                                    <input type="text" name="wadah" id="wadah"
                                                        class="form-control" readonly disabled>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="volume_sampel" class="form-label">Volume Sampel</label>
                                                    <input type="text" name="volume_sampel" id="volume_sampel"
                                                        class="form-control" readonly disabled>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="metode_uji" class="form-label">Metode Uji</label>
                                                    <input type="text" name="metode_uji" id="metode_uji"
                                                        class="form-control" readonly disabled>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="tarif" class="form-label">Tarif</label>
                                                    <input type="number" name="tarif" id="tarif"
                                                        class="form-control" readonly disabled>
                                                </div>
                                                <div class="row g-3 mt-3 mb-3">
                                                    <div class="col-md-6">
                                                        <label for="jumlah_titik" class="form-label fw-bold">Jumlah
                                                            Titik</label>
                                                        <input type="number" name="jumlah_titik" id="jumlah_titik"
                                                            data-name="jumlah_titik" class="form-control" required
                                                            placeholder="Masukkan jumlah titik yang diinginkan"
                                                            min="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jumlah_biaya" class="form-label fw-bold">Jumlah
                                                        Biaya</label>
                                                    <input type="number" hidden name="jumlah_biaya" id="jumlah_biaya"
                                                        data-name="jumlah_biaya"
                                                        class="form-control fw-bold text-danger fs-5" readonly>
                                                    <h3 id="jumlah_biaya_display" class="text-danger">Rp. 0</h3>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 d-flex ms-3">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa-solid fa-paper-plane me-2"></i>Ajukan Permohonan </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Data Permohonan -->
                    <div class="tab-pane fade" id="data-permohonan">
                        <div class="card border-0">
                            <div class="card-header border-0 mb-1 bg-white">
                                <h4 class="text-center">Daftar Data Permohonan Uji</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Permintaan</th>
                                                <th>Pengambilan Sampel</th>
                                                <th>Parameter Uji</th>
                                                <th>Jumlah Titik</th>
                                                <th>Total Biaya</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($permohonan as  $data)
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->pengambilan_sampel }}</td>
                                                    <td>{{ $data->parameter ?? 'Belum ditentukan' }}
                                                    <td>{{ $data->jumlah_titik ?? 'Belum ditentukan' }}</td>
                                                    <td>{{ $data->total_biaya ?? 'Belum ditentukan' }}</td>
                                                    <td>{{ $data->status }}</td>
                                                    {{-- <td>
                                                    @if ($data->status == 'selesai')
                                                    <span class="badge bg-success">Selesai</span>
                                                    @else
                                                    <span class="badge bg-warning">Proses</span>
                                                    @endif
                                                </td> --}}
                                                    <td>
                                                        {{-- <a href="{{ route('permohonan.detail', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <form action="{{ route('permohonan.hapus', $data->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus permohonan ini?')">Hapus</button>
                                                    </form> --}}

                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#detailModal"
                                                            onclick="getPermintaanDetail('{{ $data->id }}')">
                                                            <i class="fa-solid fa-circle-info me-2"></i>
                                                            Detail
                                                        </button>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak ada data permohonan.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Permintaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Data akan diisi secara dinamis -->
                        <div class="container">
                            <div id="modal-content">
                                <p>Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if (empty($data))
                            @if ($data->pengambilan_sampel == 'Pelanggan' && $data->status == 'Pending')
                                <form action="{{ route('permohonan.updateStatus', ['id' => $data->id]) }}" method="POST"
                                    class="confirm-form">
                                    @csrf
                                    <input type="hidden" name="status" value="Dibatalkan Pelanggan">
                                    <button type="submit" class="btn btn-danger">Batalkan</button>
                                </form>
                            @elseif ($data->status == 'Pending' && $data->pengambilan_sampel == 'Petugas' && $data->parameter != null)
                                <form action="{{ route('permohonan.updateStatus', ['id' => $data->id]) }}" method="POST"
                                    class="confirm-form">
                                    @csrf
                                    <input type="hidden" name="status" value="Disetujui Pelanggan">
                                    <button type="submit" class="btn btn-primary">Setuju</button>
                                </form>
                            @endif
                        @endif
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <script>
            function enableInputs() {
                document.querySelectorAll("input[disabled], select[disabled]").forEach(input => {
                    input.removeAttribute("disabled");
                });
            }

            function toggleCards() {
                const pelangganRadio = document.getElementById("pelanggan");
                const informasiSampelCard = document.getElementById("informasiSampelCard");
                const parameterPengujianCard = document.getElementById("parameterPengujianCard");

                // Elemen input yang perlu dimodifikasi
                const informasiInputs = informasiSampelCard.querySelectorAll("input, select");
                const parameterInputs = parameterPengujianCard.querySelectorAll("input, select");

                if (pelangganRadio.checked) {
                    // Tampilkan card dan aktifkan input
                    informasiSampelCard.style.display = "block";
                    parameterPengujianCard.style.display = "block";
                    informasiInputs.forEach(input => input.removeAttribute("disabled"));
                    parameterInputs.forEach(input => input.removeAttribute("disabled"));
                } else {
                    // Sembunyikan card dan nonaktifkan input
                    informasiSampelCard.style.display = "none";
                    parameterPengujianCard.style.display = "none";
                    informasiInputs.forEach(input => input.setAttribute("disabled", true));
                    parameterInputs.forEach(input => input.setAttribute("disabled", true));
                }
            }

            // Sembunyikan card saat halaman dimuat
            document.addEventListener("DOMContentLoaded", () => {
                toggleCards();
            });
        </script>
        <script>
            document.getElementById('parameter_id').addEventListener('change', function() {
                const parameterId = this.value;

                if (parameterId) {
                    fetch(`/get-parameter/${parameterId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.kode_parameter) {
                                document.getElementById('kode_parameter').value = data.kode_parameter;
                                document.getElementById('satuan').value = data.satuan;
                                document.getElementById('wadah').value = data.wadah;
                                document.getElementById('volume_sampel').value = data.volume_sampel;
                                document.getElementById('metode_uji').value = data.metode_uji;
                                document.getElementById('tarif').value = data.tarif;
                                document.getElementById('parameter').value = data.parameter;
                            } else {
                                alert('Parameter not found');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching parameter data:', error);
                        });
                } else {
                    // Kosongkan input jika tidak ada parameter yang dipilih
                    document.getElementById('kode_parameter').value = '';
                    document.getElementById('metode_uji').value = '';
                    document.getElementById('wadah').value = '';
                    document.getElementById('volume_sampel').value = '';
                    document.getElementById('satuan').value = '';
                    document.getElementById('tarif').value = '';
                    document.getElementById('parameter').value = '';
                }
            });
        </script>

        <script>
            document.getElementById('jumlah_titik').addEventListener('input', function() {
                const tarif = parseFloat(document.getElementById('tarif').value) || 0;
                const jumlahTitik = parseFloat(this.value) || 1;
                const jumlahBiaya = tarif * jumlahTitik;
                document.getElementById('jumlah_biaya').value = jumlahBiaya;
                document.getElementById('jumlah_biaya_display').textContent =
                    `Rp. ${jumlahBiaya.toLocaleString('id-ID')}`;
            });
        </script>
        <script>
            function getPermintaanDetail(permintaanId) {
                // Gunakan fetch untuk mendapatkan data dari backend
                fetch(`/permohonan-uji/${permintaanId}`)
                    .then(response => response.json())
                    .then(data => {
                        const permintaan = data; // Data dari model Permintaan
                        const sampel = permintaan.sampel; // Data dari model Sampel (relasi)
                        let modalContent = "";

                        // Jika pengambilan sampel dilakukan oleh petugas
                        if (data.pengambilan_sampel === "Petugas") {
                            modalContent = `
                        <div class="card mb-3">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Detail Permintaan Pengujian</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderess table-hover">
                                    <tr><th>ID Permintaan</th><td>${data.id}</td></tr>
                                    <tr><th>Nama Pelanggan</th><td>${data.pelanggan_id}</td></tr>
                                    <tr><th>Pengambilan Sampel</th><td>${data.pengambilan_sampel}</td></tr>
                                    <tr><th>Nama Petugas</th><td>${data.petugas_pengambilan}</td></tr>
                                    <tr><th>Jumlah Titik</th><td>${data.jumlah_titik}</td></tr>
                                    <tr><th>Total Biaya</th><td>${data.total_biaya}</td></tr>
                                    <tr><th>Status</th><td>${data.status}</td></tr>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Sampel Pengujian oleh Petugas</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderess table-hover">
                                    <tr><th>ID Sampel</th><td>${sampel.id}</td></tr>
                                    <tr><th>Kode Sampel</th><td>${sampel.kode_sampel}</td></tr>
                                    <tr><th>Permintaan ID</th><td>${sampel.permintaan_id}</td></tr>
                                    <tr><th>Parameter</th><td>${sampel.parameter}</td></tr>
                                    <tr><th>Jumlah Titik</th><td>${sampel.jumlah_titik}</td></tr>
                                    <tr><th>Total Biaya</th><td>${sampel.total_biaya}</td></tr>
                                    <tr><th>Kelurahan</th><td>${sampel.kelurahan}</td></tr>
                                    <tr><th>Kecamatan</th><td>${sampel.kecamatan}</td></tr>
                                    <tr><th>Kota</th><td>${sampel.kota}</td></tr>
                                    <tr><th>Tanggal Pengambilan</th><td>${sampel.tanggal_pengambilan}</td></tr>
                                    <tr><th>Waktu Pengambilan</th><td>${sampel.waktu_pengambilan}</td></tr>
                                    <tr><th>Petugas Pengambilan</th><td>${sampel.petugas_pengambilan}</td></tr>
                                    <tr><th>Acuan Metode</th><td>${sampel.acuan_metode}</td></tr>
                                    <tr><th>Teknik Pengambilan</th><td>${sampel.teknik_pengambilan}</td></tr>
                                    <tr><th>Wadah</th><td>${sampel.wadah}</td></tr>
                                    <tr><th>Volume Sampel</th><td>${sampel.volume_sampel}</td></tr>
                                    <tr><th>pH</th><td>${sampel.ph}</td></tr>
                                    <tr><th>DHL</th><td>${sampel.dhl}</td></tr>
                                    <tr><th>Suhu Air</th><td>${sampel.suhu_air}</td></tr>
                                    <tr><th>DO</th><td>${sampel.do}</td></tr>
                                    <tr><th>Warna</th><td>${sampel.warna}</td></tr>
                                    <tr><th>Sanity</th><td>${sampel.sanity}</td></tr>
                                    <tr><th>YDS</th><td>${sampel.yds}</td></tr>
                                    <tr><th>Cuaca</th><td>${sampel.cuaca}</td></tr>
                                    <tr><th>Musim</th><td>${sampel.musim}</td></tr>
                                    <tr><th>Bau</th><td>${sampel.bau}</td></tr>
                                    <tr><th>Lab Minyak</th><td>${sampel.lab_minyak}</td></tr>
                                    <tr><th>Suhu Udara</th><td>${sampel.suhu_udara}</td></tr>
                                    <tr><th>Kuat Arus</th><td>${sampel.kuat_arus}</td></tr>
                                    <tr><th>Debit Air</th><td>${sampel.debit_air}</td></tr>
                                    <tr><th>Titik Koordinat</th><td>${sampel.titik_koordinat}</td></tr>
                                    <tr><th>Alasan Sampel Tidak Diambil</th><td>${sampel.alasan_sampel_tidak_diambil}</td></tr>
                                    <tr><th>Rincian Kondisi</th><td>${sampel.rincian_kondisi}</td></tr>
                                </table>
                            </div>
                        </div>
                    `;
                        }
                        // Jika pengambilan sampel dilakukan oleh pelanggan
                        else if (data.pengambilan_sampel === "Pelanggan") {
                            modalContent = `
                        <div class="card mb-3">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Detail Pemintaan Pengujian</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderess table-hover">
                                    <tr><th>ID Permintaan</th><td>${data.id}</td></tr>
                                    <tr><th>Nama Pelanggan</th><td>${data.pelanggan_id}</td></tr>
                                    <tr><th>Pengambilan Sampel</th><td>${data.pengambilan_sampel}</td></tr>
                                    <tr><th>Jumlah Titik</th><td>${data.jumlah_titik}</td></tr>
                                    <tr><th>Total Biaya</th><td>${data.total_biaya}</td></tr>
                                    <tr><th>Status</th><td>${data.status}</td></tr>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-white">
                                <h5 class="mb-0">Parameter Pengujian oleh Pelanggan</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderess table-hover">
                                    <tr><th>ID Sampel</th><td>${sampel.id}</td></tr>
                                    <tr><th>Kode Sampel</th><td>${sampel.kode_sampel}</td></tr>
                                    <tr><th>Tanggal Pengambilan</th><td>${sampel.tanggal_pengambilan}</td></tr>
                                    <tr><th>Waktu Pengambilan</th><td>${sampel.waktu_pengambilan}</td></tr>
                                </table>
                            </div>
                        </div>
                    `;
                        }

                        // Masukkan konten tabel ke dalam modal
                        document.getElementById('modal-content').innerHTML = modalContent;
                        // Pastikan tombol dimasukkan ke dalam modal-footer
                        const modalFooter = document.querySelector('.modal-footer');

                        if (modalFooter) {
                            let footerContent = '';

                            if (data.status === 'Proses Pengajuan' && data.pengambilan_sampel === 'Pelanggan') {
                                footerContent += `
                                    <form action="/permohonan/updateStatus/${data.id}" method="POST" class="confirm-form">
                                        <input type="hidden" name="status" value="Dibatalkan Pelanggan">
                                        <button type="submit" class="btn btn-danger">Batalkan</button>
                                    </form>
                                `;
                            }

                            if (data.status === 'Proses Pengajuan' && data.pengambilan_sampel === 'Petugas' && data.parameter != null) {
                                footerContent += `
                                <form action="/permohonan/updateStatus/${data.id}" method="POST" class="confirm-form">
                                    <input type="hidden" name="status" value="Disetujui Pelanggan">
                                    <button type="submit" class="btn btn-primary">Setuju</button>
                                </form>
                            `;
                            }

                            // Tambahkan tombol close agar selalu ada
                            footerContent += `
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            `;

                            modalFooter.innerHTML = footerContent;
                        }


                    })
                    .catch(error => {
                        console.error("Error fetching data:", error);
                        document.getElementById('modal-content').innerHTML =
                            `<p class="text-danger">Gagal memuat data.</p>`;
                    });
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Ambil semua form dengan class "confirm-form"
                document.querySelectorAll(".confirm-form").forEach(function(form) {
                    form.addEventListener("submit", function(event) {
                        event.preventDefault(); // Hentikan submit form

                        Swal.fire({
                            title: "Apakah Anda yakin?",
                            text: "Setelah dibatalkan, maka pengajuan dianggap dibatalkan dan tidak dapat dikembalikan.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Ya, batalkan!",
                            cancelButtonText: "Batal",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); // Jika dikonfirmasi, submit form
                            }
                        });
                    });
                });
            });
        </script>
    @endsection
