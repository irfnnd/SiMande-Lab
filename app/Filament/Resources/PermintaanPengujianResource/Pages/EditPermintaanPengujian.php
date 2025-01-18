<?php

namespace App\Filament\Resources\PermintaanPengujianResource\Pages;

use App\Filament\Resources\PermintaanPengujianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermintaanPengujian extends EditRecord
{
    protected static string $resource = PermintaanPengujianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
