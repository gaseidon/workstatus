@extends('layouts.base')

@section('title', 'Регистрация')

@section('content')
<div class="h-full max-w-sm mx-auto flex flex-col justify-center p-10">
    <form class="" action="{{route('register.submit')}}" method="POST">
        @csrf
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Регистрация</h1>
        <div class="mb-5">
            <label for="login" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Логин')}}</label>
            <input type="text" id="login" name="login" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            @if ($errors->has('login'))
            <span class="text-sm text-red-600">{{ $errors->first('login') }}</span>
            @endif
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">{{ __('Пароль')}}</label>
            <input type="password" id="password" name="password" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            @if ($errors->has('password'))
            <span class="text-sm text-red-600">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <input type="hidden" id="email" name="email"  value="{{$email}}" required />
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Регистрация</button>
    </form>
</div>
@endsection
