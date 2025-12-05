<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Маршруты аутентификации
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin/')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin', function () {
        return 'admin';
    });
});

Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('user', function () {
        return 'user';
    });
});
