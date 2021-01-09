<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/qr', [App\Http\Controllers\QrController::class, 'test']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::prefix('/landings')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\LandingController::class, 'index']);
        Route::get('/create', [App\Http\Controllers\Admin\LandingController::class, 'create']);
        Route::post('/store', [App\Http\Controllers\Admin\LandingController::class, 'store']);
        Route::get('/{landing}/edit', [App\Http\Controllers\Admin\LandingController::class, 'edit']);
        Route::post('/{landing}/update', [App\Http\Controllers\Admin\LandingController::class, 'post']);
        Route::get('/{landing}/delete', [App\Http\Controllers\Admin\LandingController::class, 'delete']);

        Route::prefix('/{landing}/contents')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ContentController::class, 'index']);
            Route::get('/create', [App\Http\Controllers\Admin\ContentController::class, 'create']);
            Route::post('/store', [App\Http\Controllers\Admin\ContentController::class, 'store']);
            Route::get('/{landing}/edit', [App\Http\Controllers\Admin\ContentController::class, 'edit']);
            Route::post('/{landing}/update', [App\Http\Controllers\Admin\ContentController::class, 'post']);
            Route::get('/{landing}/delete', [App\Http\Controllers\Admin\ContentController::class, 'delete']);
        });
    });
});
