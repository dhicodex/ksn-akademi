<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\PlanFeatureController;

use App\Http\Middleware\IsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blogs/{blog}', [HomeController::class, 'blog'])->name('blogs.show');

// Authentication Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Google OAuth Routes
Route::get('auth/google', [RegisterController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [RegisterController::class, 'handleGoogleCallback'])->name('google.callback');

// Client Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Client Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');
    Route::get('/dashboard', [\App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth', IsAdmin::class])->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.blogs.index');
        });
        Route::resource('blogs', BlogController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('plans', \App\Http\Controllers\Admin\PlanController::class);
        Route::resource('plan-features', PlanFeatureController::class);
        Route::resource('client-plans', \App\Http\Controllers\Admin\ClientPlanController::class);
    });
});


Route::get('/check-session', function () {
    return session()->all();   // tampilkan semua session
});