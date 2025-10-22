<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelangganResource\Pages;
use App\Filament\Resources\PelangganResource\RelationManagers;
use App\Models\Pelanggan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PelangganResource extends Resource
{
    protected static ?string $model = Pelanggan::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?string $label = 'Data Pelanggan';


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
                Tables\Columns\TextColumn::make('kode_pelanggan')
                    ->label('Kode Pelanggan')->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pelanggan')->searchable(),
                Tables\Columns\TextColumn::make('nama_perusahaan')
                    ->label('Nama Perusahaan')->searchable(),
                Tables\Columns\TextColumn::make('no_telepon')
                    ->label('No Telepon'),
                // Tables\Columns\TextColumn::make('user.email')
                //     ->label('Email'),
                // Tables\Columns\TextColumn::make('alamat')
                //     ->label('Alamat'),
                Tables\Columns\TextColumn::make('user.status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Tidak Aktif' => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Lihat')
                    ->icon('heroicon-s-eye')
                    ->modalHeading('Detail Pelanggan')
                    ->modalSubheading('Data lengkap pelanggan.')
                    ->modalButton('Tutup')
                    ->form(fn (Tables\Actions\Action $action) => [
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('kode_pelanggan')
                                    ->label('Kode Pelanggan')
                                    ->disabled(),
                                Forms\Components\TextInput::make('user_name')
                                    ->label('Nama Pelanggan')
                                    ->disabled(),
                                Forms\Components\TextInput::make('nama_perusahaan')
                                    ->label('Nama Perusahaan')
                                    ->disabled(),
                                Forms\Components\TextInput::make('no_telepon')
                                    ->label('No Telepon')
                                    ->disabled(),
                                Forms\Components\TextInput::make('user_email')
                                    ->label('Email')
                                    ->disabled(),
                                Forms\Components\TextInput::make('user_status')
                                    ->label('Status')
                                    ->disabled(),
                                Forms\Components\Textarea::make('alamat')
                                    ->label('Alamat')
                                    ->disabled()
                                    ->columnSpan(2),
                            ]),
                    ])
                    ->fillForm(function (Pelanggan $record) {
                        return [
                            'kode_pelanggan' => $record->kode_pelanggan,
                            'user_name' => $record->user->name ?? '-',
                            'nama_perusahaan' => $record->nama_perusahaan,
                            'no_telepon' => $record->no_telepon,
                            'user_email' => $record->user->email ?? '-',
                            'user_status' => $record->user->status ?? '-',
                            'alamat' => $record->alamat,
                        ];
                    }),
            ])

            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListPelanggans::route('/'),
        ];
    }
}
