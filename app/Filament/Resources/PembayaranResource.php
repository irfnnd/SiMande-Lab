<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use App\Models\Pembayaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranResource extends Resource
{
    protected static ?string $model = Pembayaran::class;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-s-banknotes';
    protected static ?string $navigationGroup = 'Permohonan Uji';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('permintaan_id')
                    ->label('Permintaan')
                    ->relationship('permintaan', 'id') // Pastikan hubungan ini sesuai
                    ->required(),

                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah Biaya')
                    ->numeric()
                    ->step(0.01)
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status Pembayaran')
                    ->options([
                        'Belum Bayar' => 'Belum Bayar',
                        'Lunas' => 'Lunas',
                    ])
                    ->default('Belum Bayar')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_pembayaran')
                    ->label('Tanggal Pembayaran')
                    ->nullable(),

                Forms\Components\FileUpload::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->directory('bukti-pembayaran') // Lokasi penyimpanan file
                    ->nullable(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('permintaan.id')
                    ->label('ID Permintaan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permintaan.pelanggan.nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah Biaya')
                    ->sortable()
                    ->money('idr', true), // Format ke Rupiah
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Belum Bayar' => 'warning',
                        'Lunas' => 'success',
                    }),
                Tables\Columns\TextColumn::make('tanggal_pembayaran')
                    ->label('Tanggal Pembayaran')
                    ->date(),
                Tables\Columns\ImageColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->tooltip(fn($record) => 'Klik untuk memperbesar') // Tambahkan tooltip
                    ->url(fn($record) => asset('storage/' . $record->bukti_pembayaran)) // Link ke gambar asli
                    ->openUrlInNewTab(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Belum Bayar' => 'Belum Bayar',
                        'Lunas' => 'Lunas',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('validasi')
                ->label('Validasi')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->requiresConfirmation() // Meminta konfirmasi sebelum tindakan
                ->action(function ($record) {
                    $record->update([
                        'status' => 'Lunas',
                        'tanggal_pembayaran' => now(), // Set tanggal pembayaran ke waktu saat ini
                    ]);
                    $record->permintaan->update([
                        'status' => 'Bukti Pembayaran Valid',
                    ]);
                })
                ->visible(fn ($record) => $record->status === 'Belum Bayar' && $record->bukti_pembayaran), // Hanya tampil jika status belum lunas dan bukti tersedia,
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
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
}
