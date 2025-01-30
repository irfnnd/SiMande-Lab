<?php

namespace App\Filament\Widgets;

use App\Models\KepuasanPelanggan;
use App\Models\Parameter;
use App\Models\Pelanggan;
use App\Models\PermintaanPengujian;
use App\Models\SertifikatPengujian;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Analisis Data';

protected ?string $description = 'Rincian analisis data';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Parameter Uji', Parameter::count())
                ->description('Total parameter pengujian')
                ->color('success'),
            Stat::make('Total Permohonan Uji', PermintaanPengujian::count())
                ->description('Total permohonan yang telah diajukan')
                ->color('success'),
            Stat::make('Sertifikat Diunggah', SertifikatPengujian::count())
                ->description('Jumlah sertifikat bulan ini')
                ->color('primary'),
            Stat::make('Total Pelanggan', Pelanggan::count())
                ->description('Pelanggan terdaftar')
                ->color('info'),
            Stat::make('Rata-rata Kepuasan', KepuasanPelanggan::avg('rating') ? number_format(KepuasanPelanggan::avg('rating'), 2) . ' / 5' : 'N/A')
                ->description('Rata-rata kepuasan pelanggan')
                ->color('warning'),
            Stat::make('Pengguna Aktif', User::whereNot('role', 'user')->count())
                ->description('Jumlah admin')
                ->color('secondary'),
        ];
    }
}
