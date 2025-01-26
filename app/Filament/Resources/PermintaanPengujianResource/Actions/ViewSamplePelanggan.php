<?php

namespace App\Filament\Resources\PermintaanPengujianResource\Actions;

use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Model;

class ViewSamplePelanggan extends ViewAction
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->modalWidth('4xl')
            ->form([
                Section::make('Informasi Umum')
                    ->description('Detail informasi umum terkait sampel pengujian.')
                    ->schema([
                        TextInput::make('kode_sampel')->label('Kode Sampel')->disabled(),
                        DatePicker::make('tanggal_pengambilan')->label('Tanggal Pengambilan')->disabled(),
                        TimePicker::make('waktu_pengambilan')->label('Waktu Pengambilan')->disabled(),
                    ])->columns(3),
            ]);

        $this->fillForm(function (Model $record): array {
            $sampel = $record->sampel;

            if (!$sampel) {
                return [];
            }

            return [
                'kode_sampel' => $sampel->kode_sampel,
                'kelurahan' => $sampel->kelurahan,
                'kecamatan' => $sampel->kecamatan,
                'kota' => $sampel->kota,
                'tanggal_pengambilan' => $sampel->tanggal_pengambilan,
                'waktu_pengambilan' => $sampel->waktu_pengambilan,
            ];
        });
    }
}
