<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Freelance\OrderController;
use App\Http\Controllers\Freelance\FreelancerController;
use App\Http\Controllers\Freelance\VacancyController;
use App\Http\Controllers\Freelance\PortfolioController;
use App\Http\Controllers\Freelance\BlogController;
use App\Http\Controllers\Freelance\MainController;
use App\Http\Controllers\Freelance\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[MainController::class, 'index'])->name('main');
Route::get('/orders',[OrderController::class, 'index'])->name('orders');
Route::get('/freelancers',[FreelancerController::class, 'index'])->name('freelancers');
Route::get('/blog',[BlogController::class, 'index'])->name('blog');
Route::get('/vacancy',[VacancyController::class, 'index'])->name('vacancy');
Route::get('/portfolio',[PortfolioController::class, 'index'])->name('portfolio');
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
require_once 'groups/auth.php';

?>

