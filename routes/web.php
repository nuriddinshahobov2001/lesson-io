<?php

use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\ProjectUserController;
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

Route::prefix('admin/')->middleware(['auth', 'role:admin'])->group(callback: function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class)->only(['store']);
    Route::resource('boards', BoardController::class)->only('store', 'update', 'destroy');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/tasks/change-status', [TaskController::class, 'changeStatus']);
    Route::post('/board/change-status', [BoardController::class, 'changeStatus']);
});
Route::prefix('user/')->middleware(['auth', 'role:user'])->group(callback: function () {
    Route::resource('dashboard-user', \App\Http\Controllers\User\DashboardController::class);
    Route::resource('projects-user', ProjectUserController::class);
});
