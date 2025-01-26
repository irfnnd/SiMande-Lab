<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';
    protected static ?string $label = 'Data Pengguna';

    protected static ?string $navigationGroup = 'Auth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('password')
                ->label('Password')
                    ->password()
                    ->required()
                    ->revealable()
                    ->dehydrated(fn($state) => filled($state))
                    ->required(fn(string $operation): bool => $operation === 'create'),
                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->revealable()
                    ->label('Konfirmasi Password')
                    ->dehydrated(false), // Tidak perlu menyimpan field ini ke database
                Forms\Components\Select::make('role')
                    ->required()
                    ->options([
                        'admin' => 'Admin',
                        'petugas' => 'Petugas',
                    ])
                ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pengguna')->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Alamat Email')->searchable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Role')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'admin' => 'Admin Dinas Lingkungan Hidup',
                            'user' => 'Pengguna atau Pelanggan',
                            'petugas' => 'Admin UPTD Laboratorium',
                        };
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin Dinas Lingkungan Hidup',
                        'user' => 'Pengguna atau Pelanggan',
                        'petugas' => 'Admin UPTD Laboratorium',
                    ])
            ])->actions([
                    Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
