<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KepuasanPelangganResource\Pages;
use App\Filament\Resources\KepuasanPelangganResource\RelationManagers;
use App\Models\KepuasanPelanggan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KepuasanPelangganResource extends Resource
{
    protected static ?string $model = KepuasanPelanggan::class;
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-bottom-center-text';

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
                TextColumn::make('pelanggan.nama_pelanggan')->label('Nama Pelanggan')->searchable(),
                TextColumn::make('jenis_kelamin'),
                TextColumn::make('umur'),
                TextColumn::make('pekerjaan'),
                TextColumn::make('pendidikan')->label('Pendidikan Terakhir'),
                TextColumn::make('rating')->label('Rating')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    '1' => 'warning',
                    '2' => 'success',
                    '3' => 'success',
                    '4' => 'success',
                    '5' => 'success',
                }),
                TextColumn::make('feedback')->label('Umpan Balik'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ])
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListKepuasanPelanggans::route('/'),
        ];
    }
}
