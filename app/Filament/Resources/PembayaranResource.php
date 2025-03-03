<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use App\Models\Pembayaran;
use App\Models\PermintaanPengujian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Tabs;

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
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan')
                    ->columnSpanFull(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rowIndex')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('permintaan.sampel.kode_sampel')
                    ->label('Kode Sampel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permintaan.pelanggan.user.name')
                    ->label('Nama Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permintaan.total_biaya')
                    ->label('Jumlah Biaya')
                    ->default('Belum ditentukan')
                    ->sortable()
                    ->money('idr', true), // Format ke Rupiah
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Menunggu Pembayaran' => 'warning',
                        'Menunggu Konfirmasi' => 'warning',
                        'Belum Bayar' => 'warning',
                        'Bukti Pembayaran Tidak Valid' => 'warning',
                        'Lunas' => 'success',
                    }),
                Tables\Columns\ImageColumn::make('bukti_pembayaran')
                    ->label('Bukti Pembayaran')
                    ->tooltip(fn($record) => 'Klik untuk memperbesar')
                    ->url(fn($record) => $record->bukti_pembayaran ? asset('storage/' . $record->bukti_pembayaran) : null)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('keterangan')
                    ->default('-'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Belum Bayar' => 'Belum Bayar',
                        'Lunas' => 'Lunas',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('validasi')
                    ->hiddenLabel()
                    ->icon('heroicon-s-check-circle')
                    ->color('success')
                    ->requiresConfirmation() // Meminta konfirmasi sebelum tindakan
                    ->action(function ($record) {

                        // Ambil riwayat status sebelumnya
                        $history = $record->permintaan->status_history ? json_decode($record->permintaan->status_history, true) : [];

                        // Tambahkan status baru ke riwayat
                        $history[] = [
                            'status' => $record->permintaan->status, // Status sebelumnya
                            'updated_at' => now()->toDateTimeString(), // Waktu perubahan
                        ];

                        $record->update([
                            'status' => 'Lunas',
                        ]);
                        $record->permintaan->update([
                            'status' => 'Proses Pengujian',
                            'status_history' => json_encode($history),
                        ]);
                    })
                    ->tooltip(fn($record) => 'Validasi Bukti Pembayaran')
                    ->visible(fn($record) => $record->status != 'Lunas'), // Hanya tampil jika status belum lunas dan bukti tersedia,
                    Tables\Actions\Action::make('invalid')
                    ->hiddenLabel()
                    ->icon('heroicon-s-x-circle')
                    ->tooltip(fn($record) => 'Bukti Pembayaran Tidak Valid')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->required()
                            ->placeholder('Masukkan alasan pembayaran tidak valid...')
                    ])
                    ->action(function ($record, array $data) {
                        // Ambil riwayat status sebelumnya
                        $history = $record->permintaan->status_history ? json_decode($record->permintaan->status_history, true) : [];

                        // Tambahkan status baru ke riwayat
                        $history[] = [
                            'status' => $record->permintaan->status, // Status sebelumnya
                            'updated_at' => now()->toDateTimeString(), // Waktu perubahan
                        ];

                        $record->update([
                            'status' => 'Bukti Pembayaran Tidak Valid',
                            'keterangan' => $data['keterangan'], // Simpan keterangan
                        ]);
                        $record->permintaan->update([
                            'status' => 'Bukti Pembayaran Tidak Valid',
                            'status_history' => json_encode($history),
                        ]);
                    }),
            ])
            ->bulkActions([
                //
            ])
            ->defaultSort('id', 'desc');
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
        ];
    }
}
