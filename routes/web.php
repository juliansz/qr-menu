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

Route::get('/{landing}', [App\Http\Controllers\Admin\LandingController::class, 'landing'])->name('landing');

Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');
    Route::prefix('/landings')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\LandingController::class, 'index'])->name('admin.landings.index');
        Route::get('/create', [App\Http\Controllers\Admin\LandingController::class, 'create'])->name('admin.landings.create');
        Route::post('/create', [App\Http\Controllers\Admin\LandingController::class, 'store']);
        Route::get('/{landing}/edit', [App\Http\Controllers\Admin\LandingController::class, 'edit'])->name('admin.landings.edit');
        Route::post('/{landing}/edit', [App\Http\Controllers\Admin\LandingController::class, 'update']);
        Route::get('/{landing}/delete', [App\Http\Controllers\Admin\LandingController::class, 'delete'])->name('admin.landings.delete');
        Route::get('/{landing}/qr', [App\Http\Controllers\Admin\LandingController::class, 'qr'])->name('admin.landings.qr');

        Route::prefix('/{landing}/contents')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('admin.contents.index');
            Route::get('/create', [App\Http\Controllers\Admin\ContentController::class, 'create'])->name('admin.contents.create');
            Route::post('/create', [App\Http\Controllers\Admin\ContentController::class, 'store']);
            Route::get('/{content}/edit', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('admin.contents.edit');
            Route::post('/{content}/edit', [App\Http\Controllers\Admin\ContentController::class, 'update']);
            Route::get('/{content}/delete', [App\Http\Controllers\Admin\ContentController::class, 'delete'])->name('admin.contents.delete');
        });
    });
});
