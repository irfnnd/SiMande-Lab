<?php

namespace App\Filament\Resources\PengambilanSampelResource\Pages;

use App\Filament\Resources\PengambilanSampelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengambilanSampels extends ListRecords
{
    protected static string $resource = PengambilanSampelResource::class;
    protected static ?string $title = 'Pengambilan Sampel oleh Petugas';
    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

}
