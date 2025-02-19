<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\ApplicantController;

/**
 * All the routes for jobs.
 */
Route::group([
    'prefix' => '/job',
    'as' => 'job.',
    'middleware' => ['auth']
], function () {
    Route::get('/create', [JobController::class, 'create'])->name('create');
    Route::post('/create', [JobController::class, 'store'])->name('create.store');
    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('/bookmarks/{work}', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/bookmarks/{work}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::post('/{work}/apply', [ApplicantController::class, 'store'])->name('applicant.store');
    Route::delete('/{work}/apply', [ApplicantController::class, 'destroy'])->name('applicant.destroy');
});

/**
 * All the routes for jobs.
 */
Route::group([
    'prefix' => '/jobs',
    'as' => 'jobs.',
], function () {
    Route::get('/search', SearchController::class)->name('search');
});

/**
 * All the routes for jobs.
 */
Route::group([
    'prefix' => '/job',
    'as' => 'jobs.'
], function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
    Route::get('/{work:slug}', [JobController::class, 'show'])->name('show');

    // With user
    Route::middleware('auth')->group(function () {
        Route::get('/edit/{work:slug}', [JobController::class, 'edit'])->name('edit');
        Route::put('/edit/{work:slug}', [JobController::class, 'update'])->name('edit.update');
        Route::delete('/delete/{work}', [JobController::class, 'destroy'])->name('destroy');
    });
});
