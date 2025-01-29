<?php

namespace App\Http\Controllers\Freelance\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Freelance\BaseController;

class RegisterController extends BaseController
{
    // Показ формы для ввода email
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Проверка email
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Если пользователь с таким email существует, редирект на страницу входа
            return redirect()->route('login')->with('email', $request->email);
        } else {
            // Если пользователя нет, показываем форму для ввода логина и пароля
            return view('auth.register-details', ['email' => $request->email]);
        }
    }

    // Регистрация нового пользователя
    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|string|min:4|max:20|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
            'email' => $request->email,
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ]);


        // // Автоматически авторизуем пользователя после регистрации
        auth()->login($user);

        return redirect()->route('main'); // Редирект на главную страницу
    }


}
