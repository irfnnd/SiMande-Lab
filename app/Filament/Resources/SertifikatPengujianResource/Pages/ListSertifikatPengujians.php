<?php

namespace App\Filament\Resources\SertifikatPengujianResource\Pages;

use App\Filament\Resources\SertifikatPengujianResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSertifikatPengujians extends ListRecords
{
    protected static string $resource = SertifikatPengujianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data'),
        ];
    }
}
