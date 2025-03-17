@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Редактирование профиля</h2>

        <form action="{{ route('freelance.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="full_name">
                    Полное имя
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    id="full_name" type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}">
                @error('full_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="bio">
                    О себе
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    id="bio" name="bio" rows="4">{{ old('bio', $profile->bio) }}</textarea>
                @error('bio')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="skills">
                    Навыки
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    id="skills" type="text" name="skills" value="{{ old('skills', $profile->skills) }}">
                <p class="text-gray-500 text-xs mt-1">Укажите ваши навыки через запятую</p>
                @error('skills')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="avatar">
                    Аватар
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    id="avatar" type="file" name="avatar">
                @if($profile->avatar_url)
                    <p class="text-gray-500 text-xs mt-1">Текущий аватар: {{ basename($profile->avatar_url) }}</p>
                @endif
                @error('avatar')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Сохранить
                </button>
                <a href="{{ route('freelance.profile.show') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                    Отмена
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
