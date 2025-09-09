<?php

use App\Http\Controllers\web\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('dashboard');
});

Route::get('logout', function () {
    Auth::logout();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');
