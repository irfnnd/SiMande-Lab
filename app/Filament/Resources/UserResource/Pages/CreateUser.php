<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Pelanggan;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function handleRecordCreation(array $data): User
    {
        $user = User::create($data);

        // Pastikan data user sudah dibuat, kemudian panggil hook
        $this->afterCreateHook($user, $data);

        return $user;
    }


    protected function afterCreateHook(User $user, array $data): void
{
    if ($user->role === 'user') {
        $verifikasiEmail = filter_var($data['verifikasi_email'], FILTER_VALIDATE_BOOLEAN);

        if ($verifikasiEmail) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        } else {
            $user->email_verified_at = now();
        }

        $user->save(); // Pastikan perubahan disimpan

        Pelanggan::create([
            'user_id' => $user->id,
            'kode_pelanggan' => Pelanggan::generateKode(),
            'nama_pelanggan' => $user->name,
            'alamat' => $data['alamat'] ?? null,
            'nama_perusahaan' => $data['nama_perusahaan'] ?? null,
            'no_telepon' => $data['no_hp'] ?? null,
            'email' => $user->email,
        ]);
    }
}



}
