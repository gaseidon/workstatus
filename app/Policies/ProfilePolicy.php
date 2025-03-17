<?php

namespace App\Policies;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Определяет, может ли пользователь просматривать список профилей.
     */
    public function viewAny(User $user)
    {
        return true; // Все авторизованные пользователи могут видеть список
    }

    /**
     * Определяет, может ли пользователь просматривать профиль.
     */
    public function view(User $user, Profile $profile)
    {
        return true; // Все авторизованные пользователи могут видеть профили
    }

    /**
     * Определяет, может ли пользователь создать профиль.
     */
    public function create(User $user)
    {
        // Пользователь может создать профиль, если у него еще нет профиля
        return !$user->profile()->exists();
    }

    /**
     * Определяет, может ли пользователь обновить профиль.
     */
    public function update(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id;
    }

    /**
     * Определяет, может ли пользователь удалить профиль.
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id;
    }
}
