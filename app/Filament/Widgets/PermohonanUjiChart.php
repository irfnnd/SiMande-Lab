<?php

namespace App\Filament\Widgets;

use App\Models\PermintaanPengujian;
use Filament\Widgets\ChartWidget;

class PermohonanUjiChart extends ChartWidget
{
    protected static ?string $heading = 'Pengujian ';
    protected static string $color = 'info';

    protected function getData(): array
{
    // Ambil jumlah permohonan uji per minggu (dimulai dari Senin)
    $data = PermintaanPengujian::selectRaw('YEARWEEK(created_at, 1) as week, COUNT(*) as total')
        ->groupBy('week')
        ->orderBy('week')
        ->get();

    // Format hasil agar minggu ditampilkan dengan rentang tanggal (Senin - Minggu)
    $weeks = $data->mapWithKeys(function ($item) {
        $year = substr($item->week, 0, 4); // Ambil tahun
        $weekNumber = substr($item->week, 4, 2); // Ambil nomor minggu

        // Tentukan tanggal awal (Senin) dan akhir (Minggu) dari minggu tersebut
        $startOfWeek = \Carbon\Carbon::now()->setISODate($year, $weekNumber)->startOfWeek();
        $endOfWeek = $startOfWeek->copy()->endOfWeek();

        // Format rentang tanggal
        $label = $startOfWeek->format('d M') . ' - ' . $endOfWeek->format('d M');

        return [$label => (int) $item->total]; // Pastikan angka total tidak berkoma
    });

    return [
        'datasets' => [
            [
                'label' => 'Jumlah Permohonan Uji (Mingguan)',
                'data' => $weeks->values()->toArray(), // Ambil total permohonan uji per minggu
                'borderColor' => 'rgba(54, 162, 235, 1)', // Warna garis biru
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Warna area bawah transparan
                'fill' => true, // Area di bawah garis akan diisi warna transparan
                'tension' => 0.3, // Membuat garis lebih halus
            ],
        ],
        'labels' => $weeks->keys()->toArray(), // Ambil label rentang tanggal
    ];
}

protected function getType(): string
{
    return 'line'; // Menggunakan Line Chart
}

}
