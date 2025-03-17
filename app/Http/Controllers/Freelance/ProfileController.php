<?php

namespace App\Http\Controllers\Freelance;

use App\Http\Requests\Profile\StoreProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends BaseController
{
    /**
     * Конструктор с проверкой авторизации
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Отображение списка профилей
     */
    public function index()
    {
        $profiles = Profile::paginate(10);
        return view('profile.index', compact('profiles'));
    }

    /**
     * Показать форму создания профиля
     */
    public function create()
    {
        // Проверяем, есть ли уже профиль у пользователя
        if (Auth::user()->profile) {
            return redirect()->route('profile.edit', Auth::user()->profile)
                ->with('info', 'У вас уже есть профиль. Вы можете его отредактировать.');
        }

        return view('profile.create');
    }

    /**
     * Сохранить новый профиль
     */
    public function store(StoreProfileRequest $request)
    {
        // Проверяем, есть ли уже профиль у пользователя
        if (Auth::user()->profile) {
            return redirect()->route('profile.edit', Auth::user()->profile)
                ->with('info', 'У вас уже есть профиль. Вы можете его отредактировать.');
        }

        $profile = new Profile($request->validated());
        $profile->user_id = Auth::id();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar_url = $avatarPath;
        }

        $profile->save();

        return redirect()->route('profile.show', $profile)
            ->with('success', 'Профиль успешно создан');
    }

    /**
     * Показать профиль пользователя
     */
    public function show(Profile $profile)
    {
        // Проверка авторизации
        $this->authorize('view', $profile);

        return view('profile.show', compact('profile'));
    }

    /**
     * Показать форму редактирования профиля
     */
    public function edit(Profile $profile)
    {
        // Проверка авторизации
        $this->authorize('update', $profile);

        return view('profile.edit', compact('profile'));
    }

    /**
     * Обновить профиль пользователя
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        // Проверка авторизации происходит в Request классе

        if ($request->hasFile('avatar')) {
            // Удаляем старый аватар, если он существует
            if ($profile->avatar_url) {
                Storage::disk('public')->delete($profile->avatar_url);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar_url = $avatarPath;
        }

        $profile->update($request->validated());

        return redirect()->route('profile.show', $profile)
            ->with('success', 'Профиль успешно обновлен');
    }

    /**
     * Удалить профиль
     */
    public function destroy(Profile $profile)
    {
        // Проверка авторизации
        $this->authorize('delete', $profile);

        // Удаляем аватар, если он существует
        if ($profile->avatar_url) {
            Storage::disk('public')->delete($profile->avatar_url);
        }

        $profile->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Профиль успешно удален');
    }
}
