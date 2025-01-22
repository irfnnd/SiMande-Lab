@extends('layout')

@section('content')
    <section id="page-title" class="page-title-mini p-4" style="background-color: var(--accent-color)">
        <div class="container clearfix">
            <h4 class="text-white m-0">Permohonan Uji</h4>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap pt-5 pb-5">
            <!-- Tab Navigation -->
            <div class="row mb-4">
                <div class="col">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" id="pmikel-tab" data-bs-toggle="tab" href="#pmikel">Ajukan Permohonan
                                Uji</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masyarakat-tab" data-bs-toggle="tab" href="#masyarakat">Lihat Data
                                Permohonan</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="tab-content">
                    <!-- Form Permohonan Uji -->
                    <div class="tab-pane fade show active" id="pmikel">
                        <div class="card">
                            <div class="card-header">
                                <p class="mb-0">Formulir Permohonan Pengujian</p>
                            </div>
                            <div class="card-body">
                                <form action="/permohonan-uji" method="POST">
                                    @csrf
                                    <div class="card mt-4">
                                        <div class="card-header">
                                            <p class="mb-0">Informasi Sampel</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="id_pelanggan" class="form-label">ID Pelanggan <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="id_pelanggan" id="id_pelanggan"
                                                        class="form-control" required readonly value="{{ $idPelanggan }}">
                                                </div>
                                                <div class="col-md-6">
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
                                    <div class="card mt-4" id="informasiSampelCard">
                                        <div class="card-header">
                                            <p class="mb-0">Informasi Sampel</p>
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
                                    <div class="card mt-4" id="parameterPengujianCard">
                                        <div class="card-header">
                                            <p class="mb-0">Parameter Pengujian</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label for="parameter" class="form-label">Parameter Pengujian <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" name="parameter" id="parameter" required>
                                                        <option value="">-- Pilih Parameter --</option>
                                                        @foreach ($parameters as $parameter)
                                                            <option value="{{ $parameter->id }}">{{ $parameter->parameter }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="kode_parameter" class="form-label">Kode Parameter</label>
                                                    <input type="text" name="kode_parameter" id="kode_parameter"
                                                        class="form-control" readonly disabled>
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
                                                <div class="row g-3 mt-3">
                                                    <div class="col-md-6">
                                                        <label for="jumlah_titik" class="form-label fw-bold">Jumlah Titik</label>
                                                        <input type="number" name="jumlah_titik" id="jumlah_titik"
                                                            data-name="jumlah_titik" class="form-control" required placeholder="Masukkan jumlah titik yang diinginkan"
                                                            min="1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="jumlah_biaya" class="form-label fw-bold">Jumlah Biaya</label>
                                                    <input type="number" hidden name="jumlah_biaya" id="jumlah_biaya"
                                                        data-name="jumlah_biaya" class="form-control fw-bold text-danger fs-5" readonly>
                                                    <h1 id="jumlah_biaya_display" class="text-danger fw-bold">Rp. 0</h1>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Ajukan Permohonan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Data Permohonan -->
                    <div class="tab-pane fade" id="masyarakat">
                        <div class="card">
                            <div class="card-header mb-3">
                                <p class="mb-0 fw-bold">Daftar Data Permohonan Uji</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pelanggan</th>
                                                <th>Kode Sampel</th>
                                                <th>Tanggal Pengambilan</th>
                                                <th>Waktu Pengambilan</th>
                                                <th>Parameter Uji</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>318031</td>
                                                <td>SP2023001</td>
                                                <td>2025-01-20</td>
                                                <td>10:00</td>
                                                <td>Parameter A</td>
                                                <td><span class="badge bg-success">Selesai</span></td>
                                                <td>
                                                    <button class="btn btn-info btn-sm">Detail</button>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </td>
                                            </tr>
                                            <!-- Data dinamis bisa ditampilkan dengan looping dari backend -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
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
        document.getElementById('parameter').addEventListener('change', function() {
            const parameterId = this.value;

            if (parameterId) {
                fetch(`/get-parameter/${parameterId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.kode_parameter) {
                            document.getElementById('kode_parameter').value = data.kode_parameter;
                            document.getElementById('satuan').value = data.satuan;
                            document.getElementById('wadah').value = data.satuan;
                            document.getElementById('volume_sampel').value = data.volume_sampel;
                            document.getElementById('metode_uji').value = data.metode_uji;
                            document.getElementById('tarif').value = data.tarif;
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
                document.getElementById('satuan').value = '';
                document.getElementById('metode_uji').value = '';
                document.getElementById('tarif').value = '';
            }
        });
    </script>

    <script>
        document.getElementById('jumlah_titik').addEventListener('input', function() {
            const tarif = parseFloat(document.getElementById('tarif').value) || 0;
            const jumlahTitik = parseFloat(this.value) || 1;
            const jumlahBiaya = tarif * jumlahTitik;
            document.getElementById('jumlah_biaya').value = jumlahBiaya;
            document.getElementById('jumlah_biaya_display').textContent = `Rp. ${jumlahBiaya.toLocaleString('id-ID')}`;
        });
    </script>
@endsection
