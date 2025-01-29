<?php

namespace App\Http\Controllers\Freelance\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Freelance\BaseController;

class LoginController extends Controller
{
    // Показ формы для входа
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Обработка входа
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home'); // Редирект на главную страницу
        }

        return back()->withErrors(['email' => 'Неверные учетные данные.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Выход из системы

        $request->session()->invalidate(); // Очистка сессии
        $request->session()->regenerateToken(); // Регенерация CSRF-токена

        return redirect()->route('main'); // Перенаправление на главную страницу
    }
}
