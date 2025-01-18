<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermintaanPengujianResource\Pages;
use App\Filament\Resources\PermintaanPengujianResource\RelationManagers;
use App\Models\PermintaanPengujian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PermintaanPengujianResource\Actions\PermintaanPengujianViewAction;
use App\Filament\Resources\PermintaanPengujianResource\Actions\ViewSamplePelanggan;
class PermintaanPengujianResource extends Resource
{
    protected static ?string $model = PermintaanPengujian::class;
    protected static ?string $navigationGroup = 'Permohonan Uji';
    protected static ?string $navigationIcon = 'heroicon-s-beaker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pelanggan.nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengambilan_sampel')
                    ->label('Pengambilan Sampel'),
                Tables\Columns\TextColumn::make('parameter.parameter')
                    ->label('Parameter'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Pending' => 'gray',
                        'Disetujui' => 'success',
                        'Ditolak' => 'danger',
                        'Menunggu Pembayaran' => 'warning',
                        'Bukti Pembayaran Tidak Valid' => 'danger',
                        'Bukti Pembayaran Valid' => 'success',
                        'Menunggu Pengambilan Sampel' => 'warning',
                        'Proses Pengujian' => 'info',
                        'Selesai' => 'success',
                        default => 'secondary',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Disetujui' => 'Disetujui',
                        'Ditolak' => 'Ditolak',
                        'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                        'Bukti Pembayaran Tidak Valid' => 'Bukti Pembayaran Tidak Valid',
                        'Bukti Pembayaran Valid' => 'Bukti Pembayaran Valid',
                        'Menunggu Pengambilan Sampel' => 'Menunggu Pengambilan Sampel',
                        'Proses Pengujian' => 'Proses Pengujian',
                        'Selesai' => 'Selesai',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                PermintaanPengujianViewAction::make('sampel_petugas')->label('Sampel Pengujian')->icon('heroicon-s-clipboard-document-list')
                ->visible(function ($record) {
                    return $record->pengambilan_sampel === 'Petugas';
                }),
                ViewSamplePelanggan::make('sampel_pelanggan')->label('Sampel Pengujian')->icon('heroicon-s-clipboard-document-list')
                ->visible(function ($record) {
                    return $record->pengambilan_sampel === 'Pelanggan';
                }),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPermintaanPengujians::route('/'),
            'create' => Pages\CreatePermintaanPengujian::route('/create'),
            'edit' => Pages\EditPermintaanPengujian::route('/{record}/edit'),
        ];
    }
}
