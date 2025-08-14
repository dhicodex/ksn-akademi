<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.blogs.index');
        });
        Route::resource('blogs', BlogController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    });
});
