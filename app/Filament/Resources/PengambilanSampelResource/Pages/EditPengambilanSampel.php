<?php

namespace App\Filament\Resources\PengambilanSampelResource\Pages;

use App\Filament\Resources\PengambilanSampelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengambilanSampel extends EditRecord
{
    protected static string $resource = PengambilanSampelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
