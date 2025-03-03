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
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat'),
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
