<?php

use App\Http\Controllers\Auth\Dashboard\AvatarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\Dashboard\ProfileController;
use App\Http\Controllers\Auth\Dashboard\DashboardController;
use App\Http\Controllers\Auth\PasswordController;

Route::get('/', HomeController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::group([
    'middleware' => ['web', 'auth', 'verified'],
    'prefix' => '/dashboard',
    'as' => 'profile.'
], function () {
    Route::put('/profile', [ProfileController::class, 'update'])->name('update');
    Route::put('/profile/avatar', [AvatarController::class, 'update'])->name('avatar.update');
    Route::put('/profile/password', [PasswordController::class, 'update'])->name('password.update');
});

require __DIR__ . '/auth.php';

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
