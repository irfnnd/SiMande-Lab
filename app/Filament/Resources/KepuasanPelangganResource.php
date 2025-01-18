<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KepuasanPelangganResource\Pages;
use App\Filament\Resources\KepuasanPelangganResource\RelationManagers;
use App\Models\KepuasanPelanggan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                //
            ])
            ->filters([
                //
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
            'create' => Pages\CreateKepuasanPelanggan::route('/create'),
            'edit' => Pages\EditKepuasanPelanggan::route('/{record}/edit'),
        ];
    }
}
