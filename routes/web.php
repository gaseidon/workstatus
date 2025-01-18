<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Freelance\OrderController;
use App\Http\Controllers\Freelance\FreelancerController;
use App\Http\Controllers\Freelance\VacancyController;
use App\Http\Controllers\Freelance\PortfolioController;
use App\Http\Controllers\Freelance\BlogController;
use App\Http\Controllers\Freelance\MainController;
use App\Http\Controllers\Freelance\AuthController;
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
Route::get('/register', [AuthController::class, 'registerIndex'])->name('registerIndex');
Route::get('/login', [AuthController::class, 'loginIndex'])->name('loginIndex');
Route::post('/login/event', [AuthController::class, 'loginEvent'])->name('loginEvent');
Route::get('/register/event', [AuthController::class, 'registerEvent'])->name('registerEvent');
