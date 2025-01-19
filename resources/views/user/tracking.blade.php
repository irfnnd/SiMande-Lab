@extends('layout')
@section('content')
<main class="main">

<div class="containertimenline">
      <!-- Sidebar -->
      <div class="sidebar">
          <div class="card">
              <h3>Tracking Proses Pengujian</h3>
          </div>
          <div class="card">
              <p>Informasi tambahan dapat ditambahkan di sini.</p>
          </div>
      </div>

      <!-- Timeline -->
      <div class="timeline">
          <h2>Progres Pengujian</h2>
          <ul>
              <li>
                  <span class="date">2 Ags 2024</span>
                  <h4>Pengajuan Pengujian Oleh Pelanggan</h4>
                  <p>Pengajuan pengujian disetujui oleh kasi pengujian.</p>
                  <p>Pembayaran retribusi telah dilakukan oleh pelanggan.</p>
              </li>
              <li>
                  <span class="date">5 Ags 2024</span>
                  <h4>Penerimaan Sampel oleh PPC</h4>
                  <p>Pelabelan sampel oleh PPC.</p>
                  <p>Pengecekan sampel oleh penyelia.</p>
              </li>
              <li>
                  <span class="date">6 Ags 2024</span>
                  <h4>Pengujian Sampel oleh Analis</h4>
                  <p>Pengecekan data hasil uji oleh analis.</p>
              </li>
              <li>
                  <span class="date">12 Ags 2024</span>
                  <h4>Verifikasi Laporan Hasil</h4>
                  <p>Verifikasi laporan hasil uji sementara oleh penyelia.</p>
              </li>
              <li>
                  <span class="date">14 Ags 2024</span>
                  <h4>Penerbitan LHU</h4>
                  <p>Penerbitan LHU oleh Pengendalian Mutu.</p>
              </li>
          </ul>
      </div>
  </div>
</main>
@endsection