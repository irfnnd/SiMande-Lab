<?php

namespace App\Filament\Resources\SertifikatPengujianResource\Pages;

use App\Filament\Resources\SertifikatPengujianResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSertifikatPengujian extends EditRecord
{
    protected static string $resource = SertifikatPengujianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
