<?php

namespace App\Http\Controllers\Freelance\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Controllers\Freelance\BaseController;

class LoginController extends BaseController
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(StoreLoginRequest $request)
    {

        $fieldType = filter_var($request->signin, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'login';

        $credentials = [
            $fieldType => $request->signin,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return back()
            ->withErrors(['password' => 'Неверный логин или пароль'])
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
