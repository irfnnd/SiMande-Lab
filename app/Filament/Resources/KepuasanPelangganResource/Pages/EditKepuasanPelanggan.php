<?php

namespace App\Filament\Resources\KepuasanPelangganResource\Pages;

use App\Filament\Resources\KepuasanPelangganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKepuasanPelanggan extends EditRecord
{
    protected static string $resource = KepuasanPelangganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
