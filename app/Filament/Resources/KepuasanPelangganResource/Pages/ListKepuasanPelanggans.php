<?php

namespace App\Filament\Resources\KepuasanPelangganResource\Pages;

use App\Filament\Resources\KepuasanPelangganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKepuasanPelanggans extends ListRecords
{
    protected static string $resource = KepuasanPelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
