<?php

namespace App\Policies;

use App\Models\PermintaanPengujian;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermintaanPengujianPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PermintaanPengujian $permintaanPengujian): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PermintaanPengujian $permintaanPengujian): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PermintaanPengujian $permintaanPengujian): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PermintaanPengujian $permintaanPengujian): bool
    {
        return $user->role == 'petugas';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PermintaanPengujian $permintaanPengujian): bool
    {
        return $user->role == 'petugas';
    }
}
