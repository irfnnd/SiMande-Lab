<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SertifikatPengujianResource\Pages;
use App\Filament\Resources\SertifikatPengujianResource\RelationManagers;
use App\Models\SertifikatPengujian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;

class SertifikatPengujianResource extends Resource
{
    protected static ?string $model = SertifikatPengujian::class;
    protected static ?string $navigationGroup = 'Permohonan Uji';

    protected static ?string $navigationLabel = 'Sertifikat Pengujian';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-s-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('permintaan_id')
                    ->label('Kode Sampel - Nama Pelanggan')
                    ->options(
                        \App\Models\PermintaanPengujian::with('pelanggan')
                            ->get()
                            ->pluck('display_name', 'id')
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('nomor_sertifikat')
                    ->label('Nomor Sertifikat')
                    ->unique()
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_terbit')
                    ->label('Tanggal Terbit')
                    ->required(),
                Forms\Components\FileUpload::make('file_path')
                    ->label('File Sertifikat')
                    ->directory('sertifikat')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rowIndex')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('permintaanPengujian.sampel.kode_sampel')
                    ->label('Kode Sampel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('permintaanPengujian.pelanggan.user.name')
                    ->label('Nama Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_terbit')
                    ->label('Tanggal Terbit')
                    ->default('Belum Diisi'),
                Tables\Columns\TextColumn::make('file_path')
                    ->badge()
                    ->label('File')
                    ->url(fn($record) => asset('storage/' . $record->file_path), true)
                    ->color('info')
                    ->openUrlInNewTab()
                    ->default('Belum Diisi'),
            ])
            ->filters([
                Filter::make('tanggal_terbit')
                    ->form([
                        DatePicker::make('dari_tanggal_terbit'),
                        DatePicker::make('sampai_tanggal_terbit'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari_tanggal_terbit'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tanggal_terbit', '>=', $date),
                            )
                            ->when(
                                $data['sampai_tanggal_terbit'],
                                fn(Builder $query, $date): Builder => $query->whereDate('tanggal_terbit', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\ViewAction::make()
                    ->label('Lihat Detail')
                    ->icon('heroicon-s-clipboard-document-list')
                    ->color('info'),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSertifikatPengujians::route('/'),
            'create' => Pages\CreateSertifikatPengujian::route('/create'),
            'edit' => Pages\EditSertifikatPengujian::route('/{record}/edit'),
        ];
    }
}
