<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\JobController;

/**
 * All the routes for jobs.
 */
Route::group([
    'middleware' => ['web'],
    'prefix' => '/job',
    'as' => 'jobs.'
], function () {
    Route::get('/', [JobController::class, 'index'])->name('index');

    // With user
    Route::middleware('auth')->group(function () {
        Route::get('/create', [JobController::class, 'create'])->name('create');
        Route::post('/create', [JobController::class, 'store'])->name('create.store');
    });
});
