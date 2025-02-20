<?php

namespace App\Http\Controllers\Freelance\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckEmailRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Controllers\Freelance\BaseController;

class RegisterController extends BaseController
{
    // Показ формы для ввода email
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Проверка email
    public function checkEmail(CheckEmailRequest $request, UserRepository $userRepository)
    {
        $user = $userRepository->emailExists($request->email);

        if ($user) {
            return redirect()->route('login')->with('email', $request->email);
        } else {
            return view('auth.register-details', ['email' => $request->email]);
        }
    }

    // Регистрация нового пользователя
    public function register(StoreRegisterRequest $request, User $user)
    {
        $user = $user->create([
            'email' => $request->email,
            'login' => $request->login,
            'password' => bcrypt($request->password),
        ]);


        // // Автоматически авторизуем пользователя после регистрации
        auth()->login($user);

        return redirect()->route('main'); // Редирект на главную страницу
    }


}
