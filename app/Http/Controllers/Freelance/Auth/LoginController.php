<?php

namespace App\Http\Controllers\Freelance\Auth;
use App\Models\User;
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
        'signin' => 'required|string',
        'password' => 'required|string',
    ]);

    // Определяем тип авторизации (email или username)
    $fieldType = filter_var($request->signin, FILTER_VALIDATE_EMAIL)
        ? 'email'
        : 'username'; // Убедитесь, что ваше поле в БД называется 'username'

    // Проверяем существование пользователя
    $userExists = User::where($fieldType, $request->signin)->exists();

    if (!$userExists) {
        $errorMessage = $fieldType === 'email'
            ? 'Пользователь с таким email не найден'
            : 'Пользователь с таким логином не найден';

        return back()
            ->withErrors(['signin' => $errorMessage])
            ->withInput();
    }

    // Пытаемся авторизовать пользователя
    $credentials = [
        $fieldType => $request->signin,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->route('main');
    }

    return back()
        ->withErrors(['password' => 'Неверный пароль'])
        ->withInput();
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main');
    }
}
