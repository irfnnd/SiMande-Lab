<?php

namespace App\Filament\Widgets;

use App\Models\PermintaanPengujian;
use Filament\Widgets\Widget;

class RecentActivities extends Widget
{
    protected static string $view = 'filament.widgets.recent-activities';
    public $activities; // Properti untuk menampung data

    public function mount(): void
    {
        $this->activities = PermintaanPengujian::with('pelanggan') // Pastikan relasi pelanggan tersedia
            ->latest()
            ->take(5)
            ->get();
    }
    
}
