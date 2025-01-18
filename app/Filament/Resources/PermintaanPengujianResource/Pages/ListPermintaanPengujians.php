<?php

namespace App\Filament\Resources\PermintaanPengujianResource\Pages;

use App\Filament\Resources\PermintaanPengujianResource;
use App\Models\SertifikatPengujian;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermintaanPengujians extends ListRecords
{
    protected static string $resource = PermintaanPengujianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

   
}
