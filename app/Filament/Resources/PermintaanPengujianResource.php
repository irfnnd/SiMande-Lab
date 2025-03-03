<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermintaanPengujianResource\Pages;
use App\Filament\Resources\PermintaanPengujianResource\RelationManagers;
use App\Models\PermintaanPengujian;
use Filament\Tables\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PermintaanPengujianResource\Actions\PermintaanPengujianViewAction;
use App\Filament\Resources\PermintaanPengujianResource\Actions\ViewSamplePelanggan;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

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
                Tables\Columns\TextColumn::make('rowIndex')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('pelanggan.user.name')
                    ->label('Nama Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sampel.kode_sampel')
                    ->label('Kode Sampel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengambilan_sampel')
                    ->label('Pengambilan Sampel'),
                Tables\Columns\TextColumn::make('parameter')
                    ->label('Parameter')
                    ->default('Belum ditentukan'),
                Tables\Columns\TextColumn::make('jumlah_titik')->default('Belum ditentukan'),
                Tables\Columns\TextColumn::make('total_biaya')->default('Belum ditentukan')->money('idr', true), // Format ke Rupiah,
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
                Tables\Actions\Action::make('editStatus')
                    ->hiddenLabel()
                    ->icon('heroicon-s-pencil-square')
                    ->tooltip('Perbarui Status Permintaan Pengujian')
                    ->form([
                        Forms\Components\Select::make(
                            'status'
                        )->options([
                                    'Pending' => 'Pending',
                                    'Disetujui' => 'Disetujui',
                                    'Ditolak' => 'Ditolak',
                                    'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                                    'Menunggu Pengambilan Sampel' => 'Menunggu Pengambilan Sampel',
                                    'Proses Pengujian' => 'Proses Pengujian',
                                    'Selesai' => 'Selesai',
                                ]),
                    ])
                    ->action(function (Model $record, array $data): void {
                        // Ambil status baru
                        $newStatus = $data['status'];

                        // Simpan status lama ke dalam riwayat
                        $history = $record->status_history ? json_decode($record->status_history, true) : [];
                        $history[] = [
                            'status' => $record->status, // Status sebelumnya
                            'updated_at' => now()->toDateTimeString(), // Waktu perubahan
                        ];

                        // Update status dan riwayat
                        $record->update([
                            'status' => $newStatus,
                            'status_history' => json_encode($history),
                        ]);
                        Notification::make()
                            ->success()
                            ->title('Status berhasil diperbarui')
                            ->body('Status permintaan pengujian berhasil diperbarui. Perbaruan status akan dikirim ke email pelanggan.')
                            ->send();
                    })
                    ->modalHeading('Perbarui Status Permintaan Pengujian')
                    ->modalSubmitActionLabel('Perbarui')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Status berhasil diperbarui')
                            ->body('Status permintaan pengujian berhasil diperbarui. Perbaruan status akan dikirim ke email pelanggan.'),
                    )
                    ->modalWidth('lg')
                    ->visible(fn() => Auth::check() && Auth::user()->role === 'petugas'),

                PermintaanPengujianViewAction::make('sampel_petugas')
                    ->hiddenLabel()
                    ->tooltip('Lihat Sampel Pengujian Petugas')
                    ->icon('heroicon-s-clipboard-document-list')
                    ->visible(function ($record) {
                        return $record->pengambilan_sampel === 'Petugas';
                    }),
                ViewSamplePelanggan::make('sampel_pelanggan')
                    ->hiddenLabel()
                    ->tooltip('Lihat Sampel Pengujian Pelanggan')
                    ->icon('heroicon-s-clipboard-document-list')
                    ->visible(function ($record) {
                        return $record->pengambilan_sampel === 'Pelanggan';
                    }),

            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPermintaanPengujians::route('/'),
            'create' => Pages\CreatePermintaanPengujian::route('/create'),
        ];
    }
}
