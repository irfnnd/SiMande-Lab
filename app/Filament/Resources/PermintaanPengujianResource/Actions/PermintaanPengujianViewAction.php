<?php

namespace App\Filament\Resources\PermintaanPengujianResource\Actions;

use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Model;

class PermintaanPengujianViewAction extends ViewAction
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
                        TextInput::make('kelurahan')->label('Kelurahan')->disabled(),
                        TextInput::make('kecamatan')->label('Kecamatan')->disabled(),
                        TextInput::make('kota')->label('Kota')->disabled(),
                        DatePicker::make('tanggal_pengambilan')->label('Tanggal Pengambilan')->disabled(),
                        TimePicker::make('waktu_pengambilan')->label('Waktu Pengambilan')->disabled(),
                        TextInput::make('petugas_pengambilan')->label('Petugas Pengambilan')->disabled(),
                    ])->columns(3),

                Section::make('Detail Teknikal')
                    ->description('Detail teknis terkait sampel pengujian.')
                    ->schema([
                        TextInput::make('acuan_metode')->label('Acuan Metode')->disabled(),
                        TextInput::make('teknik_pengambilan')->label('Teknik Pengambilan')->disabled(),
                        TextInput::make('wadah')->label('Wadah')->disabled(),
                        TextInput::make('volume_sampel')->label('Volume Sampel')->disabled(),
                        TextInput::make('ph')->label('pH')->disabled(),
                        TextInput::make('dhl')->label('DHL')->disabled(),
                        TextInput::make('suhu_air')->label('Suhu Air')->disabled(),
                        TextInput::make('do')->label('DO')->disabled(),
                        TextInput::make('warna')->label('Warna')->disabled(),
                        TextInput::make('sanity')->label('Sanity')->disabled(),
                        TextInput::make('yds')->label('YDS')->disabled(),
                    ])->columns(3),

                Section::make('Kondisi Lingkungan')
                    ->description('Detail kondisi lingkungan selama pengambilan sampel.')
                    ->schema([
                        TextInput::make('cuaca')->label('Cuaca')->disabled(),
                        TextInput::make('musim')->label('Musim')->disabled(),
                        TextInput::make('bau')->label('Bau')->disabled(),
                        TextInput::make('lab_minyak')->label('Lab Minyak')->disabled(),
                        TextInput::make('suhu_udara')->label('Suhu Udara')->disabled(),
                        TextInput::make('kuat_arus')->label('Kuat Arus')->disabled(),
                        TextInput::make('debit_air')->label('Debit Air')->disabled(),
                        TextInput::make('titik_koordinat')->label('Titik Koordinat')->disabled(),
                    ])->columns(3),

                Section::make('Catatan Tambahan')
                    ->description('Catatan tambahan terkait pengujian.')
                    ->schema([
                        TextInput::make('alasan_sampel_tidak_diambil')->label('Alasan Sampel Tidak Diambil')->disabled(),
                        TextInput::make('rincian_kondisi')->label('Rincian Kondisi')->disabled(),
                    ])->columns(2),
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
                'petugas_pengambilan' => $sampel->petugas_pengambilan,
                'acuan_metode' => $sampel->acuan_metode,
                'teknik_pengambilan' => $sampel->teknik_pengambilan,
                'wadah' => $sampel->wadah,
                'volume_sampel' => $sampel->volume_sampel,
                'ph' => $sampel->ph,
                'dhl' => $sampel->dhl,
                'suhu_air' => $sampel->suhu_air,
                'do' => $sampel->do,
                'warna' => $sampel->warna,
                'sanity' => $sampel->sanity,
                'yds' => $sampel->yds,
                'cuaca' => $sampel->cuaca,
                'musim' => $sampel->musim,
                'bau' => $sampel->bau,
                'lab_minyak' => $sampel->lab_minyak,
                'suhu_udara' => $sampel->suhu_udara,
                'kuat_arus' => $sampel->kuat_arus,
                'debit_air' => $sampel->debit_air,
                'titik_koordinat' => $sampel->titik_koordinat,
                'alasan_sampel_tidak_diambil' => $sampel->alasan_sampel_tidak_diambil,
                'rincian_kondisi' => $sampel->rincian_kondisi,
            ];
        });
    }
}
