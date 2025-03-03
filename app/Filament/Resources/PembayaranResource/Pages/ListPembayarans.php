<?php

namespace App\Filament\Resources\PembayaranResource\Pages;

use App\Filament\Resources\PembayaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPembayarans extends ListRecords
{
    protected static string $resource = PembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua'),
            'menunggu_pembayaran' => Tab::make('Menunggu Pembayaran')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'Menunggu Pembayaran' )),
            'menunggu_konfirmasi' => Tab::make('Menunggu Konfirmasi')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'Menunggu Konfirmasi' )),
            'tidak_valid' => Tab::make('Tidak Valid')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'Bukti Pembayaran Tidak Valid' )),
            'lunas' => Tab::make('Lunas')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', 'Lunas')),
        ];
    }
}
