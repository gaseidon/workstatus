@extends('layouts.base')

@section('title', 'Главная страница')

@section('content')

<div class="container">
    <form class="flex" action="{{route('registerEvent')}}">
        @csrf
        <input type="text" name="username" value="{{ old('username') }}" placeholder="Введите ваше имя">
        <input type="text" name="login" value="{{ old('login') }}" placeholder="Введите ваш логин">
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Введите ваш маил">
        <input type="password" name="password" placeholder="Введите ваш пароль">
        <input type="password" name="password_confirmation" placeholder="Повторите ваш пароль">
        <button type="submit">Зарегистрироваться</button>
    </form>
</div>
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
@error('username')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

@endsection
