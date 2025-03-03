<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Pelanggan;
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
                    ->label('Nama')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->revealable()
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->dehydrated(fn($state) => filled($state)),

                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->label('Konfirmasi Password')
                    ->required(fn(string $operation): bool => $operation === 'create')
                    ->revealable()
                    ->dehydrated(false), // Tidak disimpan ke database

                Forms\Components\Select::make('role')
                    ->label('Pilih Role')
                    ->options([
                        'admin' => 'Admin',
                        'petugas' => 'Petugas',
                        'user' => 'Pelanggan',
                    ])
                    ->reactive() // Memicu perubahan tampilan form
                    ->required(),

                Forms\Components\TextInput::make('kode_pelanggan')
                    ->label('Kode Pelanggan')
                    ->default(fn() => Pelanggan::generateKode()) // Generate kode otomatis
                    ->disabled()
                    ->visible(fn($get) => $get('role') === 'user'),

                Forms\Components\TextInput::make('no_hp')
                    ->label('Nomor HP')
                    ->visible(fn($get) => $get('role') === 'user')
                    ->required(fn($get) => $get('role') === 'user'),

                Forms\Components\TextInput::make('nama_perusahaan')
                    ->label('Nama Perusahaan')
                    ->visible(fn($get) => $get('role') === 'user')
                    ->required(fn($get) => $get('role') === 'user'),
                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->visible(fn($get) => $get('role') === 'user')
                    ->required(fn($get) => $get('role') === 'user'),
                Forms\Components\Radio::make('verifikasi_email')
                    ->label('Verifikasi Email?')
                    ->options([
                        '1' => 'Ya',
                        '0' => 'Tidak',
                    ])
                    ->inline()
                    ->inlineLabel(false)
                    ->visible(fn($get) => $get('role') === 'user')
                    ->required(fn($get) => $get('role') === 'user'),
            ])
            ->columns(2);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rowIndex')
                    ->label('No')
                    ->rowIndex(),
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
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Tidak Aktif' => 'danger',
                    })
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
                    Tables\Actions\Action::make('aktifkan')
                        // ->hiddenLabel()
                        ->icon('heroicon-s-check-circle')
                        ->color('success')
                        ->requiresConfirmation() // Meminta konfirmasi sebelum tindakan
                        ->action(function ($record) {
                            $record->update([
                                'status' => 'Aktif',
                            ]);
                        })
                        ->tooltip(fn($record) => 'Aktifkan Pengguna')
                        ->visible(fn($record) => $record->status != 'Aktif'),

                    Tables\Actions\Action::make('nonaktifkan')
                        // ->hiddenLabel()
                        ->icon('heroicon-s-x-circle')
                        ->color('danger')
                        ->requiresConfirmation() // Meminta konfirmasi sebelum tindakan
                        ->action(function ($record) {


                            $record->update([
                                'status' => 'Tidak Aktif',
                            ]);
                        })
                        ->tooltip(fn($record) => 'Nonaktifkan Pengguna')
                        ->visible(fn($record) => $record->status != 'Tidak Aktif'),
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

    public static function beforeSave(Form $form, array &$data): void
    {
        if ($data['role'] === 'user') {
            $data['alamat'] = request()->input('alamat');
            $data['no_telepon'] = request()->input('no_telepon');
            $data['nama_perusahaan'] = request()->input('nama_perusahaan');
            $data['kode_pelanggan'] = Pelanggan::generateKode();
        }
    }
}
