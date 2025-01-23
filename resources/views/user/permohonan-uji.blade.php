@extends('layout')

@section('content')
    <section id="page-title" class="page-title-mini p-4 " style="background-color: var(--accent-color)">
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
                                                <div class="row g-3 mt-3">
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
                    <div class="tab-pane fade" id="data-permohonan">
                        <div class="card border-0">
                            <div class="card-header mb-3 bg-white">
                                <h4 class="">Daftar Data Permohonan Uji</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Pelanggan</th>
                                                <th>Pengambilan Sampel</th>
                                                <th>Parameter Uji</th>
                                                <th>Jumlah Titik</th>
                                                <th>Total Biaya</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($permohonan as $index => $data)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $data->pelanggan_id }}</td>
                                                    <td>{{ $data->pengambilan_sampel }}</td>
                                                    <td>{{ $data->parameter ?? 'Belum ditentukan' }}
                                                    <td>{{ $data->jumlah_titik ?? 'Belum ditentukan'}}</td>
                                                    <td>{{ $data->total_biaya ?? 'Belum ditentukan'}}</td>
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
                                                        @if ($data->status == 'Pending' && $data->pengambilan_sampel == 'Pelanggan'  && $data->parameter != null)
                                                            <a href="#">Batalkan</a>
                                                        @elseif ($data->status == 'Pending' && $data->pengambilan_sampel == 'Petugas' && $data->parameter != null)
                                                            <a href="#">Setuju</a>
                                                        @endif

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
        document.getElementById('parameter_id').addEventListener('change', function() {
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
@endsection
