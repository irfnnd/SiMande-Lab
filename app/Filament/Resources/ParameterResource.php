<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParameterResource\Pages;
use App\Filament\Resources\ParameterResource\RelationManagers;
use App\Models\Parameter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\Fieldset;
class ParameterResource extends Resource
{
    protected static ?string $model = Parameter::class;

    protected static ?string $navigationIcon = 'heroicon-s-calculator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1) // Membagi form menjadi dua kolom
                    ->schema([
                        // Fieldset Kiri: Informasi Parameter
                        Fieldset::make('Informasi Parameter')
                            ->schema([
                                TextInput::make('kode')
                                    ->label('Kode')
                                    ->default(fn() => Parameter::generateKode()) // Mengisi otomatis kode
                                    ->disabled() // Tidak dapat diubah oleh pengguna
                                    ->required()
                                    ->prefix('PRM')
                                    ->dehydrated()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('parameter')
                                    ->label('Parameter')
                                    ->required(),
                                TextInput::make('satuan')
                                    ->label('Satuan')
                                    ->required(),
                                TextInput::make('metode_uji')
                                    ->label('Metode Uji')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->columns(3),

                        // Fieldset Kanan: Detail Sampel
                        Fieldset::make('Detail Sampel')
                            ->schema([
                                TextInput::make('wadah')
                                    ->label('Wadah')
                                    ->required(),
                                TextInput::make('volume_sampel')
                                    ->label('Volume Sampel')
                                    ->required(),

                                Textarea::make('keterangan')
                                    ->label('Keterangan')
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(1),
                        Fieldset::make('Biaya')
                            ->schema([
                                TextInput::make('tarif')
                                    ->label('Tarif')
                                    ->numeric()
                                    ->prefix('Rp') // Menambahkan "Rp" sebagai prefix
                                    ->required(),
                            ])
                            ->columns(3)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('parameter')
                    ->label('Parameter')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('satuan')
                    ->label('Satuan')
                    ->sortable(),
                    TextColumn::make('keterangan')->default('-'),
                // TextColumn::make('metode_uji')
                //     ->label('Metode Uji')
                //     ->sortable(),
                // TextColumn::make('wadah')
                //     ->label('Wadah')
                //     ->sortable(),
                // TextColumn::make('volume_sampel')
                //     ->label('Volume Sampel')
                //     ->sortable(),
                TextColumn::make('tarif')
                    ->label('Tarif')
                    ->money('IDR', true), // Format mata uang Rupiah
                // TextColumn::make('keterangan')
                //     ->label('Keterangan')
                //     ->limit(50), // Membatasi teks panjang
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListParameters::route('/'),
            'create' => Pages\CreateParameter::route('/create'),
            'edit' => Pages\EditParameter::route('/{record}/edit'),
        ];
    }
}
