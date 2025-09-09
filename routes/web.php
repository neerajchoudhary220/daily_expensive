<?php

use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\web\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');

    // Category
    Route::controller(ExpenseCategoryController::class)->prefix('category')->group(function () {
        Route::get('/', 'index')->name('category');
    });

    Route::get('logout', function () {
        Auth::logout();
        request()->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});
