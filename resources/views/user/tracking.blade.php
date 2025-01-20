@extends('layout')
@section('content')
<main class="main">

<div class="container">

    <!-- Card untuk Tabel Tracking dengan Efek Timbul -->
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h2>Progres Pengujian</h2>
        </div>
        <div class="card-body">
            <!-- Tabel Tracking Responsif -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                            <th>Detail Tracking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2 Ags 2024</td>
                            <td>Pengajuan Pengujian Oleh Pelanggan</td>
                            <td>Disetujui, Pembayaran Selesai</td>
                            <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" onclick="setDetail('Pengajuan Pengujian')">Detail Tracking</a></td>
                        </tr>
                        <tr>
                            <td>5 Ags 2024</td>
                            <td>Penerimaan Sampel oleh PPC</td>
                            <td>Pelabelan dan Pengecekan Selesai</td>
                            <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" onclick="setDetail('Penerimaan Sampel')">Detail Tracking</a></td>
                        </tr>
                        <tr>
                            <td>6 Ags 2024</td>
                            <td>Pengujian Sampel oleh Analis</td>
                            <td>Pengecekan Data Hasil Uji</td>
                            <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" onclick="setDetail('Pengujian Sampel')">Detail Tracking</a></td>
                        </tr>
                        <tr>
                            <td>12 Ags 2024</td>
                            <td>Verifikasi Laporan Hasil</td>
                            <td>Verifikasi oleh Penyelia</td>
                            <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" onclick="setDetail('Verifikasi Laporan')">Detail Tracking</a></td>
                        </tr>
                        <tr>
                            <td>14 Ags 2024</td>
                            <td>Penerbitan LHU</td>
                            <td>Diterbitkan oleh Pengendalian Mutu</td>
                            <td><a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailModal" onclick="setDetail('Penerbitan LHU')">Detail Tracking</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Modal Detail Tracking -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Tracking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="tracking-detail-content">Detail tracking akan ditampilkan di sini.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengubah konten detail tracking di dalam modal
    function setDetail(detail) {
        var detailText = {
            'Pengajuan Pengujian': 'Detail mengenai pengajuan pengujian oleh pelanggan...',
            'Penerimaan Sampel': 'Detail mengenai penerimaan sampel oleh PPC...',
            'Pengujian Sampel': 'Detail mengenai pengujian sampel oleh analis...',
            'Verifikasi Laporan': 'Detail mengenai verifikasi laporan hasil...',
            'Penerbitan LHU': 'Detail mengenai penerbitan LHU oleh pengendalian mutu...'
        };

        // Mengubah konten modal sesuai dengan detail yang dipilih
        document.getElementById('tracking-detail-content').innerText = detailText[detail] || 'Detail tidak tersedia';
    }
</script>

</main>
@endsection
