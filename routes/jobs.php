<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\JobController;

Route::group([
    // 'middleware' => ['web'],
    'prefix' => '/job',
    'as' => 'job.'
], function () {
    Route::get('/', [JobController::class, 'index'])->name('index');
});
