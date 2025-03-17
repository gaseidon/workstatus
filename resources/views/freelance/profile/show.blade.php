@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <div class="flex items-center space-x-6 mb-4">
            <img class="h-24 w-24 rounded-full"
                src="{{ $profile->avatar_url ? asset('storage/' . $profile->avatar_url) : asset('img/profile/void.png') }}"
                alt="Profile avatar">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $profile->full_name }}</h2>
                <p class="text-gray-600 dark:text-gray-300">{{ Auth::user()->email }}</p>
                <div class="flex items-center mt-1">
                    <span class="text-yellow-400">★</span>
                    <span class="ml-1 text-gray-600 dark:text-gray-300">{{ number_format($profile->rating, 1) }}</span>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">О себе</h3>
            <p class="text-gray-600 dark:text-gray-300">{{ $profile->bio ?? 'Информация не указана' }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Навыки</h3>
            <p class="text-gray-600 dark:text-gray-300">{{ $profile->skills ?? 'Навыки не указаны' }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2 text-gray-900 dark:text-white">Часовая ставка</h3>
            <p class="text-gray-600 dark:text-gray-300">{{ $profile->hourly_rate ? $profile->hourly_rate . ' ₽/час' : 'Не указана' }}</p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('freelance.profile.edit') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Редактировать профиль
            </a>
        </div>
    </div>
</div>
@endsection
