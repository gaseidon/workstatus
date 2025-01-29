<?
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Freelance\Auth\RegisterController;
use App\Http\Controllers\Freelance\Auth\LoginController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/register/check-email', [RegisterController::class, 'checkEmail'])->name('register.check-email');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
