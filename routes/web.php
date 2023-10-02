<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::get('/edit-profile', [UserController::class, 'index'])->name('profile.index');
    Route::post('/edit-profile', [UserController::class, 'store'])->name('profile.store');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::post('/crop-image', [PostController::class, 'cropImage']);
    Route::get('/{user:username}', [PostController::class, 'index'])->name('post');
});

